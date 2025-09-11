<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use App\Repository\MediaRepository;
use App\Service\MediaManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/media', name: 'admin_media_')]
#[IsGranted('ROLE_AUTHOR')]
class MediaController extends AbstractController
{
    public function __construct(
        private readonly MediaRepository $mediaRepository,
        private readonly MediaManager $mediaManager,
        private readonly EntityManagerInterface $entityManager
    ) {}

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $type = $request->query->get('type', 'all');
        $search = $request->query->get('search', '');
        $page = max(1, (int) $request->query->get('page', 1));
        $limit = 24; // Grille 6x4
        
        $queryBuilder = $this->mediaRepository->createQueryBuilder('m')
            ->leftJoin('m.uploadedBy', 'u')
            ->orderBy('m.createdAt', 'DESC');

        // Filtrage par type
        switch ($type) {
            case 'images':
                $queryBuilder->andWhere('m.mimeType LIKE :imageType')
                           ->setParameter('imageType', 'image/%');
                break;
            case 'documents':
                $queryBuilder->andWhere('m.mimeType NOT LIKE :imageType AND m.mimeType NOT LIKE :videoType AND m.mimeType NOT LIKE :audioType')
                           ->setParameter('imageType', 'image/%')
                           ->setParameter('videoType', 'video/%')
                           ->setParameter('audioType', 'audio/%');
                break;
            case 'videos':
                $queryBuilder->andWhere('m.mimeType LIKE :videoType')
                           ->setParameter('videoType', 'video/%');
                break;
            case 'audio':
                $queryBuilder->andWhere('m.mimeType LIKE :audioType')
                           ->setParameter('audioType', 'audio/%');
                break;
        }

        // Recherche
        if (!empty($search)) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->orX(
                    'm.originalName LIKE :search',
                    'm.filename LIKE :search',
                    'm.alt LIKE :search',
                    'm.description LIKE :search'
                )
            )->setParameter('search', '%' . $search . '%');
        }

        $totalCount = (clone $queryBuilder)
            ->select('COUNT(m.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $medias = $queryBuilder
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        // Statistiques
        $stats = $this->mediaManager->getStorageStats();

        return $this->render('admin/media/index.html.twig', [
            'medias' => $medias,
            'currentType' => $type,
            'search' => $search,
            'stats' => $stats,
            'pagination' => [
                'page' => $page,
                'total' => $totalCount,
                'pages' => ceil($totalCount / $limit),
                'limit' => $limit
            ],
            'maxFileSize' => $this->mediaManager->getMaxFileSize()
        ]);
    }

    #[Route('/upload', name: 'upload', methods: ['POST'])]
    public function upload(Request $request): JsonResponse
    {
        $files = $request->files->get('files', []);
        
        if (empty($files)) {
            return new JsonResponse(['error' => 'Aucun fichier sélectionné'], 400);
        }
        
        $uploadedFiles = [];
        $errors = [];
        
        foreach ($files as $file) {
            if (!$file instanceof UploadedFile) {
                continue;
            }
            
            if (!$file->isValid()) {
                $errors[] = sprintf('Fichier %s: %s', $file->getClientOriginalName(), $file->getErrorMessage());
                continue;
            }
            
            if (!$this->mediaManager->isValidFileType($file)) {
                $errors[] = sprintf('Type de fichier non autorisé: %s', $file->getClientOriginalName());
                continue;
            }
            
            if ($file->getSize() > $this->mediaManager->getMaxFileSize()) {
                $errors[] = sprintf('Fichier trop volumineux: %s', $file->getClientOriginalName());
                continue;
            }
            
            try {
                $media = $this->mediaManager->uploadFile($file, $this->getUser());
                $uploadedFiles[] = [
                    'id' => $media->getId(),
                    'name' => $media->getOriginalName(),
                    'filename' => $media->getFilename(),
                    'url' => $media->getUrl(),
                    'type' => $media->getMimeType(),
                    'size' => $media->getFormattedFileSize(),
                    'isImage' => $media->isImage(),
                    'thumbnail' => $media->isImage() ? $this->mediaManager->generateThumbnail($media, 150, 150) : null
                ];
            } catch (\Exception $e) {
                $errors[] = sprintf('Erreur upload %s: %s', $file->getClientOriginalName(), $e->getMessage());
            }
        }
        
        return new JsonResponse([
            'success' => !empty($uploadedFiles),
            'files' => $uploadedFiles,
            'errors' => $errors,
            'uploaded_count' => count($uploadedFiles),
            'error_count' => count($errors)
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\\d+'])]
    public function show(Media $media): Response
    {
        // Générer une miniature si c'est une image
        $thumbnail = null;
        if ($media->isImage()) {
            $thumbnail = $this->mediaManager->generateThumbnail($media, 300, 300);
        }
        
        return $this->render('admin/media/show.html.twig', [
            'media' => $media,
            'thumbnail' => $thumbnail
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => '\\d+'])]
    public function edit(Media $media, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $data = [
                'alt' => $request->request->get('alt'),
                'description' => $request->request->get('description'),
                'caption' => $request->request->get('caption')
            ];
            
            $this->mediaManager->updateMedia($media, $data);
            
            $this->addFlash('success', 'Média mis à jour avec succès.');
            
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => true]);
            }
            
            return $this->redirectToRoute('admin_media_show', ['id' => $media->getId()]);
        }
        
        return $this->render('admin/media/edit.html.twig', [
            'media' => $media
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'], requirements: ['id' => '\\d+'])]
    public function delete(Media $media, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('delete_media_' . $media->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }
        
        $filename = $media->getOriginalName();
        
        if ($this->mediaManager->deleteMedia($media)) {
            $this->addFlash('success', sprintf('Média "%s" supprimé avec succès.', $filename));
        } else {
            $this->addFlash('error', sprintf('Erreur lors de la suppression du média "%s".', $filename));
        }
        
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true]);
        }
        
        return $this->redirectToRoute('admin_media_index');
    }

    #[Route('/bulk-delete', name: 'bulk_delete', methods: ['POST'])]
    public function bulkDelete(Request $request): Response
    {
        $mediaIds = $request->request->all('selected_media');
        
        if (empty($mediaIds)) {
            $this->addFlash('error', 'Aucun média sélectionné.');
            return $this->redirectToRoute('admin_media_index');
        }
        
        $medias = $this->mediaRepository->findBy(['id' => $mediaIds]);
        $deletedCount = 0;
        
        foreach ($medias as $media) {
            if ($this->mediaManager->deleteMedia($media)) {
                $deletedCount++;
            }
        }
        
        $this->addFlash('success', sprintf('%d média(s) supprimé(s) avec succès.', $deletedCount));
        
        return $this->redirectToRoute('admin_media_index');
    }

    #[Route('/selector', name: 'selector', methods: ['GET'])]
    public function selector(Request $request): Response
    {
        $type = $request->query->get('type', 'all');
        $multiple = $request->query->getBoolean('multiple', false);
        
        $queryBuilder = $this->mediaRepository->createQueryBuilder('m')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults(50);
        
        if ($type === 'images') {
            $queryBuilder->andWhere('m.mimeType LIKE :imageType')
                       ->setParameter('imageType', 'image/%');
        }
        
        $medias = $queryBuilder->getQuery()->getResult();
        
        return $this->render('admin/media/selector.html.twig', [
            'medias' => $medias,
            'type' => $type,
            'multiple' => $multiple
        ]);
    }

    #[Route('/thumbnail/{id}', name: 'thumbnail', methods: ['GET'], requirements: ['id' => '\\d+'])]
    public function thumbnail(Media $media, Request $request): Response
    {
        $width = (int) $request->query->get('w', 150);
        $height = (int) $request->query->get('h', 150);
        
        $thumbnailUrl = $this->mediaManager->generateThumbnail($media, $width, $height);
        
        if (!$thumbnailUrl) {
            throw $this->createNotFoundException('Impossible de générer la miniature.');
        }
        
        return $this->redirect($thumbnailUrl);
    }

    #[Route('/library', name: 'library', methods: ['GET'])]
    public function library(): JsonResponse
    {
        $medias = $this->mediaRepository->findBy([], ['createdAt' => 'DESC'], 50);
        
        $mediaData = array_map(function(Media $media) {
            return [
                'id' => $media->getId(),
                'originalName' => $media->getOriginalName(),
                'filename' => $media->getFilename(),
                'url' => $media->getUrl(),
                'thumbnailUrl' => $media->isImage() ? $this->mediaManager->generateThumbnail($media, 150, 150) : null,
                'mimeType' => $media->getMimeType(),
                'fileSize' => $media->getFormattedFileSize(),
                'isImage' => $media->isImage(),
                'alt' => $media->getAlt(),
                'description' => $media->getDescription(),
                'createdAt' => $media->getCreatedAt()->format('d/m/Y H:i')
            ];
        }, $medias);
        
        return new JsonResponse($mediaData);
    }
    
    #[Route('/{id}/info', name: 'info', methods: ['GET'], requirements: ['id' => '\\d+'])]
    public function info(Media $media): JsonResponse
    {
        return new JsonResponse([
            'id' => $media->getId(),
            'originalName' => $media->getOriginalName(),
            'filename' => $media->getFilename(),
            'url' => $media->getUrl(),
            'thumbnailUrl' => $media->isImage() ? $this->mediaManager->generateThumbnail($media, 150, 150) : null,
            'mimeType' => $media->getMimeType(),
            'fileSize' => $media->getFormattedFileSize(),
            'isImage' => $media->isImage(),
            'alt' => $media->getAlt(),
            'description' => $media->getDescription(),
            'createdAt' => $media->getCreatedAt()->format('d/m/Y H:i')
        ]);
    }

    #[Route('/stats', name: 'stats', methods: ['GET'])]
    public function stats(): JsonResponse
    {
        $stats = $this->mediaManager->getStorageStats();
        
        return new JsonResponse([
            'total_files' => $stats['total_files'],
            'total_size' => $stats['total_size'],
            'formatted_size' => $this->formatBytes($stats['total_size']),
            'by_type' => $stats['by_type'],
            'recent_files' => array_map(function(Media $media) {
                return [
                    'id' => $media->getId(),
                    'name' => $media->getOriginalName(),
                    'type' => $media->getMimeType(),
                    'size' => $media->getFormattedFileSize(),
                    'date' => $media->getCreatedAt()->format('d/m/Y H:i')
                ];
            }, $stats['recent_files'])
        ]);
    }
    
    private function formatBytes(int $size): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $unitIndex = 0;
        
        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }
        
        return round($size, 2) . ' ' . $units[$unitIndex];
    }
}
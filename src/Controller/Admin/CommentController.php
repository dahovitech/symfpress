<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/comments', name: 'admin_comments_')]
class CommentController extends AbstractController
{
    public function __construct(
        private readonly CommentRepository $commentRepository,
        private readonly EntityManagerInterface $entityManager
    ) {}

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $status = $request->query->get('status', 'all');
        $search = $request->query->get('search', '');
        $page = max(1, (int) $request->query->get('page', 1));
        $limit = 20;
        
        $queryBuilder = $this->commentRepository->createQueryBuilder('c')
            ->leftJoin('c.author', 'a')
            ->leftJoin('c.post', 'p')
            ->leftJoin('c.page', 'pg')
            ->leftJoin('p.translations', 'pt')
            ->leftJoin('pg.translations', 'pgt')
            ->orderBy('c.createdAt', 'DESC');

        // Filtrage par statut
        if ($status !== 'all') {
            $queryBuilder->andWhere('c.status = :status')
                        ->setParameter('status', $status);
        }

        // Recherche
        if (!empty($search)) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->orX(
                    'c.content LIKE :search',
                    'c.authorName LIKE :search',
                    'c.authorEmail LIKE :search',
                    'pt.title LIKE :search',
                    'pgt.title LIKE :search'
                )
            )->setParameter('search', '%' . $search . '%');
        }

        $totalCount = (clone $queryBuilder)
            ->select('COUNT(c.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $comments = $queryBuilder
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $statusCounts = $this->commentRepository->countByStatus();
        $statusData = [];
        foreach ($statusCounts as $item) {
            $statusData[$item['status']] = $item['count'];
        }
        $statusData['all'] = array_sum($statusData);

        return $this->render('admin/comments/index.html.twig', [
            'comments' => $comments,
            'currentStatus' => $status,
            'search' => $search,
            'statusCounts' => $statusData,
            'pagination' => [
                'page' => $page,
                'total' => $totalCount,
                'pages' => ceil($totalCount / $limit),
                'limit' => $limit
            ]
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\\d+'])]
    public function show(Comment $comment): Response
    {
        return $this->render('admin/comments/show.html.twig', [
            'comment' => $comment
        ]);
    }

    #[Route('/{id}/approve', name: 'approve', methods: ['POST'], requirements: ['id' => '\\d+'])]
    public function approve(Comment $comment, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('approve_comment_' . $comment->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $comment->setStatus(Comment::STATUS_APPROVED);
        $comment->setUpdatedAt(new \DateTime());
        
        $this->entityManager->flush();
        
        $this->addFlash('success', 'Commentaire approuvé avec succès.');
        
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true, 'status' => 'approved']);
        }
        
        return $this->redirectToRoute('admin_comments_index');
    }

    #[Route('/{id}/reject', name: 'reject', methods: ['POST'], requirements: ['id' => '\\d+'])]
    public function reject(Comment $comment, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('reject_comment_' . $comment->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $comment->setStatus(Comment::STATUS_TRASH);
        $comment->setUpdatedAt(new \DateTime());
        
        $this->entityManager->flush();
        
        $this->addFlash('success', 'Commentaire rejeté.');
        
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true, 'status' => 'trash']);
        }
        
        return $this->redirectToRoute('admin_comments_index');
    }

    #[Route('/{id}/spam', name: 'spam', methods: ['POST'], requirements: ['id' => '\\d+'])]
    public function markAsSpam(Comment $comment, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('spam_comment_' . $comment->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $comment->setStatus(Comment::STATUS_SPAM);
        $comment->setUpdatedAt(new \DateTime());
        
        $this->entityManager->flush();
        
        $this->addFlash('success', 'Commentaire marqué comme spam.');
        
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true, 'status' => 'spam']);
        }
        
        return $this->redirectToRoute('admin_comments_index');
    }

    #[Route('/{id}/restore', name: 'restore', methods: ['POST'], requirements: ['id' => '\\d+'])]
    public function restore(Comment $comment, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('restore_comment_' . $comment->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $comment->setStatus(Comment::STATUS_PENDING);
        $comment->setUpdatedAt(new \DateTime());
        
        $this->entityManager->flush();
        
        $this->addFlash('success', 'Commentaire restauré.');
        
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true, 'status' => 'pending']);
        }
        
        return $this->redirectToRoute('admin_comments_index');
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'], requirements: ['id' => '\\d+'])]
    public function delete(Comment $comment, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('delete_comment_' . $comment->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $this->entityManager->remove($comment);
        $this->entityManager->flush();
        
        $this->addFlash('success', 'Commentaire supprimé définitivement.');
        
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true, 'deleted' => true]);
        }
        
        return $this->redirectToRoute('admin_comments_index');
    }

    #[Route('/reply/{id}', name: 'reply', methods: ['GET', 'POST'], requirements: ['id' => '\\d+'])]
    public function reply(Comment $parentComment, Request $request): Response
    {
        $reply = new Comment();
        $reply->setParent($parentComment);
        $reply->setPost($parentComment->getPost());
        $reply->setPage($parentComment->getPage());
        $reply->setStatus(Comment::STATUS_APPROVED); // Les réponses d'admin sont auto-approuvées
        $reply->setAuthor($this->getUser());
        
        if ($request->isMethod('POST')) {
            $content = $request->request->get('content');
            
            if (!empty($content)) {
                $reply->setContent($content);
                $reply->setCreatedAt(new \DateTime());
                
                $this->entityManager->persist($reply);
                $this->entityManager->flush();
                
                $this->addFlash('success', 'Réponse ajoutée avec succès.');
                
                return $this->redirectToRoute('admin_comments_show', ['id' => $parentComment->getId()]);
            }
            
            $this->addFlash('error', 'Le contenu de la réponse est requis.');
        }
        
        return $this->render('admin/comments/reply.html.twig', [
            'parentComment' => $parentComment,
            'reply' => $reply
        ]);
    }

    #[Route('/bulk-actions', name: 'bulk_actions', methods: ['POST'])]
    public function bulkActions(Request $request): Response
    {
        $action = $request->request->get('action');
        $commentIds = $request->request->all('selected_comments');
        
        if (empty($commentIds)) {
            $this->addFlash('error', 'Aucun commentaire sélectionné.');
            return $this->redirectToRoute('admin_comments_index');
        }
        
        $comments = $this->commentRepository->findBy(['id' => $commentIds]);
        $count = 0;
        
        foreach ($comments as $comment) {
            switch ($action) {
                case 'approve':
                    $comment->setStatus(Comment::STATUS_APPROVED);
                    break;
                case 'reject':
                    $comment->setStatus(Comment::STATUS_TRASH);
                    break;
                case 'spam':
                    $comment->setStatus(Comment::STATUS_SPAM);
                    break;
                case 'restore':
                    $comment->setStatus(Comment::STATUS_PENDING);
                    break;
                case 'delete':
                    $this->entityManager->remove($comment);
                    break;
                default:
                    continue 2;
            }
            
            if ($action !== 'delete') {
                $comment->setUpdatedAt(new \DateTime());
            }
            $count++;
        }
        
        $this->entityManager->flush();
        
        $actionLabels = [
            'approve' => 'approuvés',
            'reject' => 'rejetés',
            'spam' => 'marqués comme spam',
            'restore' => 'restaurés',
            'delete' => 'supprimés'
        ];
        
        $this->addFlash('success', sprintf('%d commentaire(s) %s.', $count, $actionLabels[$action] ?? 'traités'));
        
        return $this->redirectToRoute('admin_comments_index');
    }
}
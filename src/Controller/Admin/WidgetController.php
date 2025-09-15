<?php

namespace App\Controller\Admin;

use App\Entity\Widget;
use App\Entity\WidgetZone;
use App\Service\WidgetManager;
use App\Repository\WidgetRepository;
use App\Repository\WidgetZoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/widgets')]
#[IsGranted('ROLE_ADMIN')]
class WidgetController extends AbstractController
{
    private WidgetManager $widgetManager;
    private WidgetRepository $widgetRepository;
    private WidgetZoneRepository $widgetZoneRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        WidgetManager $widgetManager,
        WidgetRepository $widgetRepository,
        WidgetZoneRepository $widgetZoneRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->widgetManager = $widgetManager;
        $this->widgetRepository = $widgetRepository;
        $this->widgetZoneRepository = $widgetZoneRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * Page principale de gestion des widgets
     */
    #[Route('', name: 'admin_widgets_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $search = $request->query->get('search', '');
        $zone = $request->query->get('zone', '');
        
        // Récupération des widgets
        if ($search) {
            $widgets = $this->widgetManager->searchWidgets($search);
        } else {
            $widgets = $this->widgetRepository->findBy([], ['name' => 'ASC']);
        }
        
        // Filtrage par zone si spécifié
        if ($zone) {
            $zoneEntity = $this->widgetZoneRepository->findByName($zone);
            if ($zoneEntity) {
                $widgets = array_filter($widgets, fn(Widget $w) => $w->getZone() === $zoneEntity);
            }
        }

        // Récupération des zones
        $zones = $this->widgetZoneRepository->findActive();
        
        // Statistiques
        $stats = $this->widgetManager->getWidgetStats();
        
        return $this->render('admin/widgets/index.html.twig', [
            'widgets' => $widgets,
            'zones' => $zones,
            'stats' => $stats,
            'search' => $search,
            'selected_zone' => $zone,
            'widget_types' => $this->widgetManager->getAvailableWidgetTypes()
        ]);
    }

    /**
     * Afficher un widget spécifique
     */
    #[Route('/{id}', name: 'admin_widgets_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Widget $widget): Response
    {
        return $this->render('admin/widgets/show.html.twig', [
            'widget' => $widget
        ]);
    }

    /**
     * Créer un nouveau widget
     */
    #[Route('/create', name: 'admin_widgets_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            
            try {
                $zone = $this->widgetZoneRepository->find($data['zone_id']);
                if (!$zone) {
                    throw new \InvalidArgumentException('Zone invalide');
                }
                
                $widget = $this->widgetManager->createWidget(
                    $data['name'],
                    $data['type'],
                    $zone,
                    $data['content'] ?? null,
                    json_decode($data['settings'] ?? '{}', true),
                    $data['theme'] ?? null
                );
                
                $this->addFlash('success', 'Widget créé avec succès.');
                
                return $this->redirectToRoute('admin_widgets_show', ['id' => $widget->getId()]);
                
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de la création : ' . $e->getMessage());
            }
        }
        
        $zones = $this->widgetZoneRepository->findActive();
        $widgetTypes = $this->widgetManager->getAvailableWidgetTypes();
        
        return $this->render('admin/widgets/create.html.twig', [
            'zones' => $zones,
            'widget_types' => $widgetTypes
        ]);
    }

    /**
     * Éditer un widget
     */
    #[Route('/{id}/edit', name: 'admin_widgets_edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Request $request, Widget $widget): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            
            try {
                $this->widgetManager->updateWidget(
                    $widget,
                    $data['name'] ?? null,
                    $data['content'] ?? null,
                    isset($data['settings']) ? json_decode($data['settings'], true) : null,
                    isset($data['is_active']) ? (bool)$data['is_active'] : null
                );
                
                $this->addFlash('success', 'Widget mis à jour avec succès.');
                
                return $this->redirectToRoute('admin_widgets_show', ['id' => $widget->getId()]);
                
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
            }
        }
        
        return $this->render('admin/widgets/edit.html.twig', [
            'widget' => $widget
        ]);
    }

    /**
     * Supprimer un widget
     */
    #[Route('/{id}/delete', name: 'admin_widgets_delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Widget $widget): Response
    {
        if ($this->isCsrfTokenValid('delete' . $widget->getId(), $request->request->get('_token'))) {
            try {
                $this->widgetManager->deleteWidget($widget);
                $this->addFlash('success', 'Widget supprimé avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de la suppression : ' . $e->getMessage());
            }
        } else {
            $this->addFlash('error', 'Token de sécurité invalide.');
        }
        
        return $this->redirectToRoute('admin_widgets_index');
    }

    /**
     * Activer/désactiver un widget
     */
    #[Route('/{id}/toggle', name: 'admin_widgets_toggle', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function toggle(Widget $widget): JsonResponse
    {
        try {
            $this->widgetManager->toggleWidget($widget);
            
            return new JsonResponse([
                'success' => true,
                'is_active' => $widget->isActive(),
                'message' => 'Statut du widget mis à jour.'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur : ' . $e->getMessage()
            ], 400);
        }
    }

    /**
     * Déplacer un widget vers le haut
     */
    #[Route('/{id}/move-up', name: 'admin_widgets_move_up', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function moveUp(Widget $widget): JsonResponse
    {
        try {
            $moved = $this->widgetManager->moveWidgetUp($widget);
            
            return new JsonResponse([
                'success' => $moved,
                'message' => $moved ? 'Widget déplacé vers le haut.' : 'Impossible de déplacer le widget.'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur : ' . $e->getMessage()
            ], 400);
        }
    }

    /**
     * Déplacer un widget vers le bas
     */
    #[Route('/{id}/move-down', name: 'admin_widgets_move_down', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function moveDown(Widget $widget): JsonResponse
    {
        try {
            $moved = $this->widgetManager->moveWidgetDown($widget);
            
            return new JsonResponse([
                'success' => $moved,
                'message' => $moved ? 'Widget déplacé vers le bas.' : 'Impossible de déplacer le widget.'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur : ' . $e->getMessage()
            ], 400);
        }
    }

    /**
     * Cloner un widget
     */
    #[Route('/{id}/clone', name: 'admin_widgets_clone', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function clone(Request $request, Widget $widget): Response
    {
        try {
            $targetZoneId = $request->request->get('target_zone_id');
            $newName = $request->request->get('new_name');
            
            $targetZone = $targetZoneId ? 
                $this->widgetZoneRepository->find($targetZoneId) : 
                $widget->getZone();
            
            if (!$targetZone) {
                throw new \InvalidArgumentException('Zone cible invalide.');
            }
            
            $clonedWidget = $this->widgetManager->cloneWidget($widget, $targetZone, $newName);
            
            $this->addFlash('success', 'Widget cloné avec succès.');
            
            return $this->redirectToRoute('admin_widgets_show', ['id' => $clonedWidget->getId()]);
            
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors du clonage : ' . $e->getMessage());
            return $this->redirectToRoute('admin_widgets_show', ['id' => $widget->getId()]);
        }
    }

    /**
     * Gestion des zones de widgets
     */
    #[Route('/zones', name: 'admin_widget_zones_index', methods: ['GET'])]
    public function zones(Request $request): Response
    {
        $search = $request->query->get('search', '');
        
        if ($search) {
            $zones = $this->widgetManager->searchZones($search);
        } else {
            $zones = $this->widgetZoneRepository->findAllWithWidgetCount();
        }
        
        return $this->render('admin/widgets/zones.html.twig', [
            'zones' => $zones,
            'search' => $search
        ]);
    }

    /**
     * Créer une zone de widgets
     */
    #[Route('/zones/create', name: 'admin_widget_zones_create', methods: ['GET', 'POST'])]
    public function createZone(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            
            try {
                $zone = $this->widgetManager->createWidgetZone(
                    $data['name'],
                    $data['title'],
                    $data['description'] ?? null,
                    $data['theme'] ?? null,
                    json_decode($data['settings'] ?? '{}', true)
                );
                
                $this->addFlash('success', 'Zone créée avec succès.');
                
                return $this->redirectToRoute('admin_widget_zones_index');
                
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de la création : ' . $e->getMessage());
            }
        }
        
        return $this->render('admin/widgets/create_zone.html.twig');
    }

    /**
     * Initialiser les zones par défaut
     */
    #[Route('/zones/initialize', name: 'admin_widget_zones_initialize', methods: ['POST'])]
    public function initializeZones(): Response
    {
        try {
            $this->widgetManager->initializeDefaultZones();
            $this->addFlash('success', 'Zones par défaut initialisées avec succès.');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de l\'initialisation : ' . $e->getMessage());
        }
        
        return $this->redirectToRoute('admin_widget_zones_index');
    }
}

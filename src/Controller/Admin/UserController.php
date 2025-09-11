<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin/users')]
#[IsGranted('ROLE_ADMIN')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly ValidatorInterface $validator
    ) {
    }

    #[Route('/', name: 'admin_users_index')]
    public function index(Request $request): Response
    {
        $role = $request->query->get('role');
        $search = $request->query->get('search');
        $status = $request->query->get('status');
        
        $queryBuilder = $this->userRepository->createQueryBuilder('u')
            ->orderBy('u.createdAt', 'DESC');
        
        if ($role) {
            $queryBuilder->andWhere('u.roles LIKE :role')
                         ->setParameter('role', '%"' . $role . '"%');
        }
        
        if ($search) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->orX(
                    'u.email LIKE :search',
                    'u.firstName LIKE :search',
                    'u.lastName LIKE :search',
                    'u.username LIKE :search'
                )
            )->setParameter('search', '%' . $search . '%');
        }
        
        if ($status === 'active') {
            $queryBuilder->andWhere('u.isActive = true');
        } elseif ($status === 'inactive') {
            $queryBuilder->andWhere('u.isActive = false');
        }
        
        $users = $queryBuilder->getQuery()->getResult();
        
        // Statistiques
        $stats = [
            'total' => $this->userRepository->count([]),
            'active' => $this->userRepository->count(['isActive' => true]),
            'inactive' => $this->userRepository->count(['isActive' => false]),
            'by_role' => $this->getUserStatsByRole()
        ];
        
        return $this->render('admin/users/index.html.twig', [
            'users' => $users,
            'stats' => $stats,
            'currentRole' => $role,
            'currentSearch' => $search,
            'currentStatus' => $status,
            'availableRoles' => $this->getAvailableRoles()
        ]);
    }

    #[Route('/new', name: 'admin_users_new')]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request): Response
    {
        return $this->createOrEdit($request);
    }

    #[Route('/{id}/edit', name: 'admin_users_edit')]
    public function edit(Request $request, User $user): Response
    {
        // Vérifier que l'utilisateur peut modifier cet utilisateur
        if (!$this->canEditUser($user)) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas modifier cet utilisateur.');
        }
        
        return $this->createOrEdit($request, $user);
    }

    #[Route('/{id}/show', name: 'admin_users_show')]
    public function show(User $user): Response
    {
        return $this->render('admin/users/show.html.twig', [
            'user' => $user,
            'canEdit' => $this->canEditUser($user)
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_users_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, User $user): Response
    {
        if (!$this->canDeleteUser($user)) {
            $this->addFlash('error', 'Vous ne pouvez pas supprimer cet utilisateur.');
            return $this->redirectToRoute('admin_users_index');
        }
        
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $this->userRepository->remove($user, true);
            $this->addFlash('success', 'Utilisateur supprimé avec succès.');
        }
        
        return $this->redirectToRoute('admin_users_index');
    }

    #[Route('/{id}/toggle-status', name: 'admin_users_toggle_status', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function toggleStatus(Request $request, User $user): Response
    {
        if (!$this->canEditUser($user)) {
            throw $this->createAccessDeniedException();
        }
        
        if ($this->isCsrfTokenValid('toggle'.$user->getId(), $request->request->get('_token'))) {
            $user->setIsActive(!$user->getIsActive());
            $user->setUpdatedAt(new \DateTime());
            
            $this->userRepository->save($user, true);
            
            $status = $user->getIsActive() ? 'activé' : 'désactivé';
            $this->addFlash('success', sprintf('Utilisateur %s avec succès.', $status));
        }
        
        return $this->redirectToRoute('admin_users_index');
    }

    private function createOrEdit(Request $request, ?User $user = null): Response
    {
        $isEdit = $user !== null;
        
        if (!$isEdit) {
            $user = new User();
        }
        
        if ($request->isMethod('POST')) {
            return $this->handleFormSubmission($request, $user, $isEdit);
        }
        
        return $this->render('admin/users/form.html.twig', [
            'user' => $user,
            'isEdit' => $isEdit,
            'availableRoles' => $this->getAvailableRoles(),
            'canEditRoles' => $this->canEditUserRoles($user)
        ]);
    }

    private function handleFormSubmission(Request $request, User $user, bool $isEdit): Response
    {
        $data = $request->request->all();
        
        // Mettre à jour les propriétés de base
        $user->setEmail($data['email'] ?? '');
        $user->setFirstName($data['first_name'] ?? '');
        $user->setLastName($data['last_name'] ?? '');
        $user->setUsername($data['username'] ?? '');
        $user->setBio($data['bio'] ?? null);
        $user->setWebsite($data['website'] ?? null);
        $user->setIsActive($data['is_active'] ?? true);
        
        // Gestion du mot de passe
        if (!empty($data['password'])) {
            if (strlen($data['password']) < 6) {
                $this->addFlash('error', 'Le mot de passe doit contenir au moins 6 caractères.');
                return $this->createOrEdit($request, $user);
            }
            
            if ($data['password'] !== $data['password_confirm']) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
                return $this->createOrEdit($request, $user);
            }
            
            $hashedPassword = $this->passwordHasher->hashPassword($user, $data['password']);
            $user->setPassword($hashedPassword);
        } elseif (!$isEdit) {
            $this->addFlash('error', 'Le mot de passe est obligatoire pour un nouvel utilisateur.');
            return $this->createOrEdit($request, $user);
        }
        
        // Gestion des rôles
        if ($this->canEditUserRoles($user) && isset($data['roles'])) {
            $roles = is_array($data['roles']) ? $data['roles'] : [$data['roles']];
            $user->setRoles($roles);
        }
        
        if (!$isEdit) {
            $user->setCreatedAt(new \DateTime());
        } else {
            $user->setUpdatedAt(new \DateTime());
        }
        
        // Validation
        $errors = $this->validator->validate($user);
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $this->addFlash('error', $error->getMessage());
            }
            return $this->createOrEdit($request, $user);
        }
        
        try {
            $this->userRepository->save($user, true);
            $this->addFlash('success', $isEdit ? 'Utilisateur modifié avec succès.' : 'Utilisateur créé avec succès.');
            
            return $this->redirectToRoute('admin_users_edit', ['id' => $user->getId()]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la sauvegarde : ' . $e->getMessage());
            return $this->createOrEdit($request, $user);
        }
    }
    
    private function getAvailableRoles(): array
    {
        return [
            User::ROLE_SUBSCRIBER => 'Abonné',
            User::ROLE_CONTRIBUTOR => 'Contributeur',
            User::ROLE_AUTHOR => 'Auteur',
            User::ROLE_EDITOR => 'Éditeur',
            User::ROLE_ADMIN => 'Administrateur'
        ];
    }
    
    private function getUserStatsByRole(): array
    {
        $stats = [];
        foreach ($this->getAvailableRoles() as $role => $label) {
            $count = $this->userRepository->createQueryBuilder('u')
                ->select('COUNT(u.id)')
                ->where('u.roles LIKE :role')
                ->setParameter('role', '%"' . $role . '"%')
                ->getQuery()
                ->getSingleScalarResult();
            $stats[$role] = $count;
        }
        return $stats;
    }
    
    private function canEditUser(User $user): bool
    {
        $currentUser = $this->getUser();
        
        // Un super admin peut tout faire
        if ($currentUser->hasRole(User::ROLE_SUPER_ADMIN)) {
            return true;
        }
        
        // Un admin ne peut pas modifier un super admin
        if ($user->hasRole(User::ROLE_SUPER_ADMIN)) {
            return false;
        }
        
        // Un utilisateur peut se modifier lui-même (sauf les rôles)
        if ($currentUser === $user) {
            return true;
        }
        
        return $currentUser->hasRole(User::ROLE_ADMIN);
    }
    
    private function canEditUserRoles(User $user): bool
    {
        $currentUser = $this->getUser();
        
        // Un utilisateur ne peut pas modifier ses propres rôles
        if ($currentUser === $user) {
            return false;
        }
        
        return $this->canEditUser($user);
    }
    
    private function canDeleteUser(User $user): bool
    {
        $currentUser = $this->getUser();
        
        // Un utilisateur ne peut pas se supprimer lui-même
        if ($currentUser === $user) {
            return false;
        }
        
        return $this->canEditUser($user);
    }
}

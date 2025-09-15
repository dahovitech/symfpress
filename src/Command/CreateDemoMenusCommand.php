<?php

namespace App\Command;

use App\Entity\Menu;
use App\Entity\MenuTranslation;
use App\Repository\MenuRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-demo-menus',
    description: 'Crée des menus de démonstration pour tester l\'intégration'
)]
class CreateDemoMenusCommand extends Command
{
    public function __construct(
        private readonly MenuRepository $menuRepository,
        private readonly LanguageRepository $languageRepository,
        private readonly PageRepository $pageRepository,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            // Récupérer la langue par défaut
            $defaultLanguage = $this->languageRepository->findOneBy(['code' => 'fr']) ?? 
                              $this->languageRepository->findAll()[0] ?? null;

            if (!$defaultLanguage) {
                $io->error('Aucune langue trouvée dans le système');
                return Command::FAILURE;
            }

            $io->info('Création des menus de démonstration...');

            // Supprimer les menus existants (pour éviter les doublons en test)
            $existingMenus = $this->menuRepository->findAll();
            foreach ($existingMenus as $menu) {
                $this->entityManager->remove($menu);
            }
            $this->entityManager->flush();

            // 1. Menu principal (primary)
            $io->section('Création du menu principal');

            // Menu Accueil
            $homeMenu = new Menu();
            $homeMenu->setType(Menu::TYPE_HOME);
            $homeMenu->setLocation('primary');
            $homeMenu->setMenuOrder(0);
            $homeMenu->setIsActive(true);
            $homeMenu->setUrl('/');
            $homeMenu->setCreatedAt(new \DateTime());

            $homeTranslation = new MenuTranslation();
            $homeTranslation->setMenu($homeMenu);
            $homeTranslation->setLanguage($defaultLanguage);
            $homeTranslation->setTitle('Accueil');
            $homeTranslation->setDescription('Page d\'accueil du site');
            $homeMenu->addTranslation($homeTranslation);

            $this->entityManager->persist($homeMenu);

            // Menu Articles
            $articlesMenu = new Menu();
            $articlesMenu->setType(Menu::TYPE_CUSTOM);
            $articlesMenu->setLocation('primary');
            $articlesMenu->setMenuOrder(1);
            $articlesMenu->setIsActive(true);
            $articlesMenu->setUrl('/articles');
            $articlesMenu->setCreatedAt(new \DateTime());

            $articlesTranslation = new MenuTranslation();
            $articlesTranslation->setMenu($articlesMenu);
            $articlesTranslation->setLanguage($defaultLanguage);
            $articlesTranslation->setTitle('Articles');
            $articlesTranslation->setDescription('Liste des articles du blog');
            $articlesMenu->addTranslation($articlesTranslation);

            $this->entityManager->persist($articlesMenu);

            // Menu À propos
            $aboutMenu = new Menu();
            $aboutMenu->setType(Menu::TYPE_CUSTOM);
            $aboutMenu->setLocation('primary');
            $aboutMenu->setMenuOrder(2);
            $aboutMenu->setIsActive(true);
            $aboutMenu->setUrl('/about');
            $aboutMenu->setCreatedAt(new \DateTime());

            $aboutTranslation = new MenuTranslation();
            $aboutTranslation->setMenu($aboutMenu);
            $aboutTranslation->setLanguage($defaultLanguage);
            $aboutTranslation->setTitle('À propos');
            $aboutTranslation->setDescription('Page à propos du site');
            $aboutMenu->addTranslation($aboutTranslation);

            $this->entityManager->persist($aboutMenu);

            // Menu Contact
            $contactMenu = new Menu();
            $contactMenu->setType(Menu::TYPE_CUSTOM);
            $contactMenu->setLocation('primary');
            $contactMenu->setMenuOrder(3);
            $contactMenu->setIsActive(true);
            $contactMenu->setUrl('/contact');
            $contactMenu->setCreatedAt(new \DateTime());

            $contactTranslation = new MenuTranslation();
            $contactTranslation->setMenu($contactMenu);
            $contactTranslation->setLanguage($defaultLanguage);
            $contactTranslation->setTitle('Contact');
            $contactTranslation->setDescription('Page de contact');
            $contactMenu->addTranslation($contactTranslation);

            $this->entityManager->persist($contactMenu);

            // 2. Menu de pied de page (footer)
            $io->section('Création du menu de pied de page');

            // Mentions légales
            $legalMenu = new Menu();
            $legalMenu->setType(Menu::TYPE_CUSTOM);
            $legalMenu->setLocation('footer');
            $legalMenu->setMenuOrder(0);
            $legalMenu->setIsActive(true);
            $legalMenu->setUrl('/legal');
            $legalMenu->setCreatedAt(new \DateTime());

            $legalTranslation = new MenuTranslation();
            $legalTranslation->setMenu($legalMenu);
            $legalTranslation->setLanguage($defaultLanguage);
            $legalTranslation->setTitle('Mentions légales');
            $legalMenu->addTranslation($legalTranslation);

            $this->entityManager->persist($legalMenu);

            // Politique de confidentialité
            $privacyMenu = new Menu();
            $privacyMenu->setType(Menu::TYPE_CUSTOM);
            $privacyMenu->setLocation('footer');
            $privacyMenu->setMenuOrder(1);
            $privacyMenu->setIsActive(true);
            $privacyMenu->setUrl('/privacy');
            $privacyMenu->setCreatedAt(new \DateTime());

            $privacyTranslation = new MenuTranslation();
            $privacyTranslation->setMenu($privacyMenu);
            $privacyTranslation->setLanguage($defaultLanguage);
            $privacyTranslation->setTitle('Confidentialité');
            $privacyMenu->addTranslation($privacyTranslation);

            $this->entityManager->persist($privacyMenu);

            // Plan du site
            $sitemapMenu = new Menu();
            $sitemapMenu->setType(Menu::TYPE_CUSTOM);
            $sitemapMenu->setLocation('footer');
            $sitemapMenu->setMenuOrder(2);
            $sitemapMenu->setIsActive(true);
            $sitemapMenu->setUrl('/sitemap');
            $sitemapMenu->setCreatedAt(new \DateTime());

            $sitemapTranslation = new MenuTranslation();
            $sitemapTranslation->setMenu($sitemapMenu);
            $sitemapTranslation->setLanguage($defaultLanguage);
            $sitemapTranslation->setTitle('Plan du site');
            $sitemapMenu->addTranslation($sitemapTranslation);

            $this->entityManager->persist($sitemapMenu);

            // 3. Menu réseaux sociaux (social)
            $io->section('Création du menu réseaux sociaux');

            // Facebook
            $facebookMenu = new Menu();
            $facebookMenu->setType(Menu::TYPE_CUSTOM);
            $facebookMenu->setLocation('social');
            $facebookMenu->setMenuOrder(0);
            $facebookMenu->setIsActive(true);
            $facebookMenu->setUrl('https://facebook.com');
            $facebookMenu->setTarget('_blank');
            $facebookMenu->setCssClass('fab fa-facebook');
            $facebookMenu->setCreatedAt(new \DateTime());

            $facebookTranslation = new MenuTranslation();
            $facebookTranslation->setMenu($facebookMenu);
            $facebookTranslation->setLanguage($defaultLanguage);
            $facebookTranslation->setTitle('Facebook');
            $facebookMenu->addTranslation($facebookTranslation);

            $this->entityManager->persist($facebookMenu);

            // Twitter
            $twitterMenu = new Menu();
            $twitterMenu->setType(Menu::TYPE_CUSTOM);
            $twitterMenu->setLocation('social');
            $twitterMenu->setMenuOrder(1);
            $twitterMenu->setIsActive(true);
            $twitterMenu->setUrl('https://twitter.com');
            $twitterMenu->setTarget('_blank');
            $twitterMenu->setCssClass('fab fa-twitter');
            $twitterMenu->setCreatedAt(new \DateTime());

            $twitterTranslation = new MenuTranslation();
            $twitterTranslation->setMenu($twitterMenu);
            $twitterTranslation->setLanguage($defaultLanguage);
            $twitterTranslation->setTitle('Twitter');
            $twitterMenu->addTranslation($twitterTranslation);

            $this->entityManager->persist($twitterMenu);

            // LinkedIn
            $linkedinMenu = new Menu();
            $linkedinMenu->setType(Menu::TYPE_CUSTOM);
            $linkedinMenu->setLocation('social');
            $linkedinMenu->setMenuOrder(2);
            $linkedinMenu->setIsActive(true);
            $linkedinMenu->setUrl('https://linkedin.com');
            $linkedinMenu->setTarget('_blank');
            $linkedinMenu->setCssClass('fab fa-linkedin');
            $linkedinMenu->setCreatedAt(new \DateTime());

            $linkedinTranslation = new MenuTranslation();
            $linkedinTranslation->setMenu($linkedinMenu);
            $linkedinTranslation->setLanguage($defaultLanguage);
            $linkedinTranslation->setTitle('LinkedIn');
            $linkedinMenu->addTranslation($linkedinTranslation);

            $this->entityManager->persist($linkedinMenu);

            // Sauvegarder tous les menus
            $this->entityManager->flush();

            $io->success('Menus de démonstration créés avec succès !');
            $io->table(
                ['Emplacement', 'Nombre de menus', 'Titres'],
                [
                    ['primary', '4', 'Accueil, Articles, À propos, Contact'],
                    ['footer', '3', 'Mentions légales, Confidentialité, Plan du site'],
                    ['social', '3', 'Facebook, Twitter, LinkedIn']
                ]
            );

            $io->note([
                'Les menus sont maintenant disponibles dans les thèmes.',
                'Rendez-vous sur le frontend pour voir les menus en action.',
                'Vous pouvez gérer ces menus dans l\'administration : /admin/menus'
            ]);

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $io->error('Erreur lors de la création des menus : ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}

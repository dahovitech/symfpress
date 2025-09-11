<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Language;
use App\Entity\Page;
use App\Entity\PageTranslation;
use App\Entity\Tag;
use App\Entity\TagTranslation;
use App\Entity\Comment;
use App\Entity\Media;
use App\Repository\PostRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Récupérer les langues
        $frLanguage = $manager->getRepository(Language::class)->findOneBy(['code' => 'fr']);
        $enLanguage = $manager->getRepository(Language::class)->findOneBy(['code' => 'en']);

        // Si les langues n'existent pas, les créer
        if (!$frLanguage) {
            $frLanguage = new Language();
            $frLanguage->setCode('fr');
            $frLanguage->setName('Français');
            $frLanguage->setIsDefault(true);
            $frLanguage->setIsActive(true);
            $manager->persist($frLanguage);
        }

        if (!$enLanguage) {
            $enLanguage = new Language();
            $enLanguage->setCode('en');
            $enLanguage->setName('English');
            $enLanguage->setIsDefault(false);
            $enLanguage->setIsActive(true);
            $manager->persist($enLanguage);
        }

        // Créer un utilisateur administrateur
        $admin = new User();
        $admin->setEmail('admin@symfpress.local');
        $admin->setUsername('admin');
        $admin->setFirstName('Admin');
        $admin->setLastName('SymfPress');
        $admin->setRoles([User::ROLE_ADMIN]);
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'admin123')
        );
        $admin->setIsActive(true);
        $admin->setBio('Administrateur du CMS SymfPress');
        $admin->setWebsite('https://symfpress.local');
        $manager->persist($admin);

        // Créer un utilisateur auteur
        $author = new User();
        $author->setEmail('author@symfpress.local');
        $author->setUsername('author');
        $author->setFirstName('John');
        $author->setLastName('Doe');
        $author->setRoles([User::ROLE_AUTHOR]);
        $author->setPassword(
            $this->passwordHasher->hashPassword($author, 'author123')
        );
        $author->setIsActive(true);
        $author->setBio('Auteur de contenu pour SymfPress');
        $manager->persist($author);

        $manager->flush();

        // Créer quelques pages d'exemple
        $this->createSamplePages($manager, $admin, $frLanguage, $enLanguage);
        
        // Créer quelques tags d'exemple
        $this->createSampleTags($manager, $frLanguage, $enLanguage);
        
        // Créer des commentaires de test
        $this->createSampleComments($manager, $admin, $author);
        
        // Créer des médias de test
        $this->createSampleMedias($manager, $admin, $author);

        $manager->flush();
    }

    private function createSamplePages(ObjectManager $manager, User $author, Language $frLanguage, Language $enLanguage): void
    {
        // Page d'accueil
        $homePage = new Page();
        $homePage->setSlug('accueil');
        $homePage->setStatus(Page::STATUS_PUBLISHED);
        $homePage->setAuthor($author);
        $homePage->setCommentStatus(false);
        $homePage->setMenuOrder(1);
        $homePage->setTemplate('landing');
        $homePage->setPublishedAt(new \DateTime());

        $homeTranslationFr = new PageTranslation();
        $homeTranslationFr->setPage($homePage);
        $homeTranslationFr->setLanguage($frLanguage);
        $homeTranslationFr->setTitle('Accueil');
        $homeTranslationFr->setContent('<h1>Bienvenue sur SymfPress</h1><p>SymfPress est un CMS moderne conçu avec Symfony. Cette page d\'accueil présente les fonctionnalités principales du système de gestion de contenu multilingue.</p>');
        $homeTranslationFr->setExcerpt('Page d\'accueil de SymfPress - CMS multilingue avec Symfony');
        $homeTranslationFr->setMetaTitle('Accueil - SymfPress CMS');
        $homeTranslationFr->setMetaDescription('SymfPress est un CMS moderne et multilingue développé avec Symfony');
        $homeTranslationFr->setMetaKeywords('CMS, Symfony, multilingue, gestion contenu');
        $homePage->addTranslation($homeTranslationFr);

        $homeTranslationEn = new PageTranslation();
        $homeTranslationEn->setPage($homePage);
        $homeTranslationEn->setLanguage($enLanguage);
        $homeTranslationEn->setTitle('Home');
        $homeTranslationEn->setContent('<h1>Welcome to SymfPress</h1><p>SymfPress is a modern CMS built with Symfony. This homepage showcases the main features of the multilingual content management system.</p>');
        $homeTranslationEn->setExcerpt('SymfPress homepage - Multilingual CMS with Symfony');
        $homeTranslationEn->setMetaTitle('Home - SymfPress CMS');
        $homeTranslationEn->setMetaDescription('SymfPress is a modern multilingual CMS developed with Symfony');
        $homeTranslationEn->setMetaKeywords('CMS, Symfony, multilingual, content management');
        $homePage->addTranslation($homeTranslationEn);

        $manager->persist($homePage);

        // Page À propos
        $aboutPage = new Page();
        $aboutPage->setSlug('a-propos');
        $aboutPage->setStatus(Page::STATUS_PUBLISHED);
        $aboutPage->setAuthor($author);
        $aboutPage->setCommentStatus(false);
        $aboutPage->setMenuOrder(2);
        $aboutPage->setTemplate('default');
        $aboutPage->setPublishedAt(new \DateTime());

        $aboutTranslationFr = new PageTranslation();
        $aboutTranslationFr->setPage($aboutPage);
        $aboutTranslationFr->setLanguage($frLanguage);
        $aboutTranslationFr->setTitle('À propos');
        $aboutTranslationFr->setContent('<h1>À propos de SymfPress</h1><p>SymfPress est un système de gestion de contenu (CMS) moderne développé avec le framework Symfony. Il offre des fonctionnalités avancées de multilinguisme et une interface d\'administration intuitive.</p><h2>Fonctionnalités principales</h2><ul><li>Gestion multilingue native</li><li>Interface d\'administration moderne</li><li>Gestion des médias</li><li>Système de commentaires</li><li>SEO optimisé</li></ul>');
        $aboutTranslationFr->setExcerpt('Découvrez SymfPress, un CMS moderne avec Symfony');
        $aboutTranslationFr->setMetaTitle('À propos - SymfPress CMS');
        $aboutTranslationFr->setMetaDescription('Découvrez SymfPress, un CMS multilingue moderne développé avec Symfony');
        $aboutTranslationFr->setMetaKeywords('CMS, Symfony, à propos, fonctionnalités');
        $aboutPage->addTranslation($aboutTranslationFr);

        $aboutTranslationEn = new PageTranslation();
        $aboutTranslationEn->setPage($aboutPage);
        $aboutTranslationEn->setLanguage($enLanguage);
        $aboutTranslationEn->setTitle('About');
        $aboutTranslationEn->setContent('<h1>About SymfPress</h1><p>SymfPress is a modern Content Management System (CMS) developed with the Symfony framework. It offers advanced multilingual features and an intuitive administration interface.</p><h2>Key Features</h2><ul><li>Native multilingual management</li><li>Modern administration interface</li><li>Media management</li><li>Comment system</li><li>SEO optimized</li></ul>');
        $aboutTranslationEn->setExcerpt('Discover SymfPress, a modern CMS with Symfony');
        $aboutTranslationEn->setMetaTitle('About - SymfPress CMS');
        $aboutTranslationEn->setMetaDescription('Discover SymfPress, a modern multilingual CMS developed with Symfony');
        $aboutTranslationEn->setMetaKeywords('CMS, Symfony, about, features');
        $aboutPage->addTranslation($aboutTranslationEn);

        $manager->persist($aboutPage);

        // Page Contact
        $contactPage = new Page();
        $contactPage->setSlug('contact');
        $contactPage->setStatus(Page::STATUS_PUBLISHED);
        $contactPage->setAuthor($author);
        $contactPage->setCommentStatus(false);
        $contactPage->setMenuOrder(3);
        $contactPage->setTemplate('contact');
        $contactPage->setPublishedAt(new \DateTime());

        $contactTranslationFr = new PageTranslation();
        $contactTranslationFr->setPage($contactPage);
        $contactTranslationFr->setLanguage($frLanguage);
        $contactTranslationFr->setTitle('Contact');
        $contactTranslationFr->setContent('<h1>Contactez-nous</h1><p>N\'hésitez pas à nous contacter pour toute question concernant SymfPress.</p><div class="contact-info"><h3>Informations de contact</h3><p><strong>Email:</strong> contact@symfpress.local</p><p><strong>Téléphone:</strong> +33 1 23 45 67 89</p><p><strong>Adresse:</strong> 123 Rue de Symfony, 75001 Paris, France</p></div>');
        $contactTranslationFr->setExcerpt('Contactez l\'équipe SymfPress');
        $contactTranslationFr->setMetaTitle('Contact - SymfPress CMS');
        $contactTranslationFr->setMetaDescription('Contactez l\'équipe SymfPress pour toute question ou support');
        $contactTranslationFr->setMetaKeywords('contact, support, SymfPress, aide');
        $contactPage->addTranslation($contactTranslationFr);

        $contactTranslationEn = new PageTranslation();
        $contactTranslationEn->setPage($contactPage);
        $contactTranslationEn->setLanguage($enLanguage);
        $contactTranslationEn->setTitle('Contact');
        $contactTranslationEn->setContent('<h1>Contact Us</h1><p>Please feel free to contact us for any questions about SymfPress.</p><div class="contact-info"><h3>Contact Information</h3><p><strong>Email:</strong> contact@symfpress.local</p><p><strong>Phone:</strong> +33 1 23 45 67 89</p><p><strong>Address:</strong> 123 Symfony Street, 75001 Paris, France</p></div>');
        $contactTranslationEn->setExcerpt('Contact the SymfPress team');
        $contactTranslationEn->setMetaTitle('Contact - SymfPress CMS');
        $contactTranslationEn->setMetaDescription('Contact the SymfPress team for any questions or support');
        $contactTranslationEn->setMetaKeywords('contact, support, SymfPress, help');
        $contactPage->addTranslation($contactTranslationEn);

        $manager->persist($contactPage);

        // Page brouillon
        $draftPage = new Page();
        $draftPage->setSlug('page-brouillon');
        $draftPage->setStatus(Page::STATUS_DRAFT);
        $draftPage->setAuthor($author);
        $draftPage->setCommentStatus(false);
        $draftPage->setMenuOrder(0);
        $draftPage->setTemplate('default');

        $draftTranslationFr = new PageTranslation();
        $draftTranslationFr->setPage($draftPage);
        $draftTranslationFr->setLanguage($frLanguage);
        $draftTranslationFr->setTitle('Page en cours de rédaction');
        $draftTranslationFr->setContent('<h1>Page en cours de rédaction</h1><p>Cette page est encore en cours de rédaction. Elle sera publiée prochainement.</p>');
        $draftTranslationFr->setExcerpt('Page en cours de rédaction');
        $draftPage->addTranslation($draftTranslationFr);

        $manager->persist($draftPage);
    }
    
    private function createSampleTags(ObjectManager $manager, Language $frLanguage, Language $enLanguage): void
    {
        $tagsData = [
            [
                'slug' => 'symfony',
                'color' => '#000000',
                'translations' => [
                    'fr' => [
                        'name' => 'Symfony',
                        'description' => 'Framework PHP moderne pour développer des applications web',
                        'metaTitle' => 'Articles sur Symfony',
                        'metaDescription' => 'Découvrez nos articles sur le framework PHP Symfony'
                    ],
                    'en' => [
                        'name' => 'Symfony',
                        'description' => 'Modern PHP framework for web application development',
                        'metaTitle' => 'Symfony Articles',
                        'metaDescription' => 'Discover our articles about the Symfony PHP framework'
                    ]
                ]
            ],
            [
                'slug' => 'php',
                'color' => '#777BB4',
                'translations' => [
                    'fr' => [
                        'name' => 'PHP',
                        'description' => 'Langage de programmation pour le développement web',
                        'metaTitle' => 'Articles PHP',
                        'metaDescription' => 'Tutoriels et articles sur le langage PHP'
                    ],
                    'en' => [
                        'name' => 'PHP',
                        'description' => 'Programming language for web development',
                        'metaTitle' => 'PHP Articles',
                        'metaDescription' => 'Tutorials and articles about PHP language'
                    ]
                ]
            ],
            [
                'slug' => 'web-development',
                'color' => '#28a745',
                'translations' => [
                    'fr' => [
                        'name' => 'Développement Web',
                        'description' => 'Techniques et bonnes pratiques pour créer des sites web',
                        'metaTitle' => 'Développement Web',
                        'metaDescription' => 'Apprenez les techniques de développement web moderne'
                    ],
                    'en' => [
                        'name' => 'Web Development',
                        'description' => 'Techniques and best practices for creating websites',
                        'metaTitle' => 'Web Development',
                        'metaDescription' => 'Learn modern web development techniques'
                    ]
                ]
            ],
            [
                'slug' => 'tutoriel',
                'color' => '#ffc107',
                'translations' => [
                    'fr' => [
                        'name' => 'Tutoriel',
                        'description' => 'Guides pas à pas pour apprendre',
                        'metaTitle' => 'Tutoriels',
                        'metaDescription' => 'Suivez nos tutoriels détaillés'
                    ],
                    'en' => [
                        'name' => 'Tutorial',
                        'description' => 'Step-by-step guides for learning',
                        'metaTitle' => 'Tutorials',
                        'metaDescription' => 'Follow our detailed tutorials'
                    ]
                ]
            ],
            [
                'slug' => 'cms',
                'color' => '#6f42c1',
                'translations' => [
                    'fr' => [
                        'name' => 'CMS',
                        'description' => 'Systèmes de gestion de contenu',
                        'metaTitle' => 'Articles CMS',
                        'metaDescription' => 'Tout sur les systèmes de gestion de contenu'
                    ],
                    'en' => [
                        'name' => 'CMS',
                        'description' => 'Content Management Systems',
                        'metaTitle' => 'CMS Articles',
                        'metaDescription' => 'Everything about Content Management Systems'
                    ]
                ]
            ]
        ];
        
        foreach ($tagsData as $tagData) {
            $tag = new Tag();
            $tag->setSlug($tagData['slug']);
            $tag->setColor($tagData['color']);
            $tag->setCreatedAt(new \DateTime());
            
            // Traduction française
            $frTranslation = new TagTranslation();
            $frTranslation->setTag($tag);
            $frTranslation->setLanguage($frLanguage);
            $frTranslation->setName($tagData['translations']['fr']['name']);
            $frTranslation->setDescription($tagData['translations']['fr']['description']);
            $frTranslation->setMetaTitle($tagData['translations']['fr']['metaTitle']);
            $frTranslation->setMetaDescription($tagData['translations']['fr']['metaDescription']);
            $tag->addTranslation($frTranslation);
            
            // Traduction anglaise
            $enTranslation = new TagTranslation();
            $enTranslation->setTag($tag);
            $enTranslation->setLanguage($enLanguage);
            $enTranslation->setName($tagData['translations']['en']['name']);
            $enTranslation->setDescription($tagData['translations']['en']['description']);
            $enTranslation->setMetaTitle($tagData['translations']['en']['metaTitle']);
            $enTranslation->setMetaDescription($tagData['translations']['en']['metaDescription']);
            $tag->addTranslation($enTranslation);
            
            $manager->persist($tag);
        }
    }
    
    private function createSampleComments(ObjectManager $manager, User $admin, User $author): void
    {
        // Récupérer une page et des articles pour associer les commentaires
        $homePage = $manager->getRepository(Page::class)->findOneBy(['slug' => 'accueil']);
        $aboutPage = $manager->getRepository(Page::class)->findOneBy(['slug' => 'a-propos']);
        
        // Essayer de récupérer des articles (si ils existent)
        $posts = $manager->getRepository('App\Entity\Post')->findBy([], ['id' => 'ASC'], 2);
        $firstPost = !empty($posts) ? $posts[0] : null;
        
        $commentsData = [
            // Commentaires sur la page d'accueil
            [
                'content' => 'Excellent site ! L\'interface d\'administration est très intuitive et moderne.',
                'status' => Comment::STATUS_APPROVED,
                'authorName' => 'Marie Dupont',
                'authorEmail' => 'marie.dupont@example.com',
                'authorWebsite' => 'https://marie-dupont.fr',
                'authorIp' => '192.168.1.10',
                'page' => $homePage,
                'createdAt' => new \DateTime('-2 days')
            ],
            [
                'content' => 'J\'adore ce CMS ! Beaucoup mieux que WordPress selon moi.',
                'status' => Comment::STATUS_APPROVED,
                'authorName' => 'Jean Martin',
                'authorEmail' => 'jean.martin@example.com',
                'authorIp' => '192.168.1.11',
                'page' => $homePage,
                'createdAt' => new \DateTime('-1 day')
            ],
            [
                'content' => 'Bonjour, j\'aurais une question sur l\'intégration de thèmes personnalisés. Est-ce que c\'est possible ?',
                'status' => Comment::STATUS_PENDING,
                'authorName' => 'Sophie Bernard',
                'authorEmail' => 'sophie.bernard@example.com',
                'authorIp' => '192.168.1.12',
                'page' => $homePage,
                'createdAt' => new \DateTime('-3 hours')
            ],
            
            // Commentaires sur la page à propos
            [
                'content' => 'Très bon travail sur ce CMS. Les fonctionnalités multilingues sont impressionnantes !',
                'status' => Comment::STATUS_APPROVED,
                'authorName' => 'Pierre Durand',
                'authorEmail' => 'pierre.durand@example.com',
                'authorIp' => '192.168.1.13',
                'page' => $aboutPage,
                'createdAt' => new \DateTime('-5 hours')
            ],
            [
                'content' => 'Quand est-ce que la version 2.0 sortira ? J\'ai hâte de voir les nouvelles fonctionnalités !',
                'status' => Comment::STATUS_PENDING,
                'authorName' => 'Anonyme',
                'authorEmail' => 'contact@example.com',
                'authorIp' => '192.168.1.14',
                'page' => $aboutPage,
                'createdAt' => new \DateTime('-1 hour')
            ],
            
            // Commentaires indésirables
            [
                'content' => 'Venez gagner de l\'argent facilement ! Cliquez sur ce lien : http://spam.example.com',
                'status' => Comment::STATUS_SPAM,
                'authorName' => 'SpamBot',
                'authorEmail' => 'spam@spammer.com',
                'authorIp' => '95.142.33.88',
                'page' => $homePage,
                'createdAt' => new \DateTime('-6 hours'),
                'userAgent' => 'SpamBot/1.0'
            ],
            [
                'content' => 'Votre site est nul et votre contenu est stupide. Je déteste tout !',
                'status' => Comment::STATUS_TRASH,
                'authorName' => 'Troll',
                'authorEmail' => 'troll@hater.com',
                'authorIp' => '85.123.45.67',
                'page' => $aboutPage,
                'createdAt' => new \DateTime('-4 hours')
            ]
        ];
        
        // Ajouter des commentaires sur un article si disponible
        if ($firstPost) {
            $commentsData = array_merge($commentsData, [
                [
                    'content' => 'Article très intéressant ! Merci pour ce partage.',
                    'status' => Comment::STATUS_APPROVED,
                    'authorName' => 'Claire Moreau',
                    'authorEmail' => 'claire.moreau@example.com',
                    'authorIp' => '192.168.1.15',
                    'post' => $firstPost,
                    'createdAt' => new \DateTime('-8 hours')
                ],
                [
                    'content' => 'J\'ai une question sur le code présenté dans l\'article. Pouvez-vous m\'aider ?',
                    'status' => Comment::STATUS_PENDING,
                    'authorName' => 'Développeur Junior',
                    'authorEmail' => 'junior@dev.com',
                    'authorIp' => '192.168.1.16',
                    'post' => $firstPost,
                    'createdAt' => new \DateTime('-2 hours')
                ]
            ]);
        }
        
        $createdComments = [];
        
        // Créer les commentaires
        foreach ($commentsData as $data) {
            $comment = new Comment();
            $comment->setContent($data['content']);
            $comment->setStatus($data['status']);
            $comment->setAuthorName($data['authorName']);
            $comment->setAuthorEmail($data['authorEmail']);
            $comment->setAuthorIp($data['authorIp']);
            $comment->setCreatedAt($data['createdAt']);
            
            if (isset($data['authorWebsite'])) {
                $comment->setAuthorWebsite($data['authorWebsite']);
            }
            
            if (isset($data['userAgent'])) {
                $comment->setUserAgent($data['userAgent']);
            }
            
            if (isset($data['page'])) {
                $comment->setPage($data['page']);
            }
            
            if (isset($data['post'])) {
                $comment->setPost($data['post']);
            }
            
            // Quelques commentaires sont faits par des utilisateurs connectés
            if (in_array($data['authorName'], ['Admin SymfPress', 'John Doe'])) {
                $comment->setAuthor($data['authorName'] === 'Admin SymfPress' ? $admin : $author);
                $comment->setAuthorName(null); // Utiliser le nom de l'utilisateur connecté
                $comment->setAuthorEmail(null);
            }
            
            $manager->persist($comment);
            $createdComments[] = $comment;
        }
        
        // Créer quelques réponses (commentaires hiérarchiques)
        if (!empty($createdComments)) {
            // Réponse d'admin au premier commentaire
            $adminReply1 = new Comment();
            $adminReply1->setContent('Merci beaucoup pour votre retour positif ! N\'hésitez pas si vous avez des questions.');
            $adminReply1->setStatus(Comment::STATUS_APPROVED);
            $adminReply1->setAuthor($admin);
            $adminReply1->setParent($createdComments[0]);
            $adminReply1->setPage($homePage);
            $adminReply1->setCreatedAt(new \DateTime('-1 day +2 hours'));
            $manager->persist($adminReply1);
            
            // Réponse d'admin à une question en attente
            $adminReply2 = new Comment();
            $adminReply2->setContent('Excellente question ! Oui, l\'intégration de thèmes personnalisés est tout à fait possible. Je vais préparer un tutoriel détaillé sur ce sujet.');
            $adminReply2->setStatus(Comment::STATUS_APPROVED);
            $adminReply2->setAuthor($admin);
            $adminReply2->setParent($createdComments[2]); // Réponse à Sophie
            $adminReply2->setPage($homePage);
            $adminReply2->setCreatedAt(new \DateTime('-2 hours'));
            $manager->persist($adminReply2);
            
            // Réponse d'utilisateur à une réponse d'admin (niveau 2)
            $userReply = new Comment();
            $userReply->setContent('Parfait ! Merci beaucoup pour votre réponse rapide. J\'attends ce tutoriel avec impatience.');
            $userReply->setStatus(Comment::STATUS_APPROVED);
            $userReply->setAuthorName('Sophie Bernard');
            $userReply->setAuthorEmail('sophie.bernard@example.com');
            $userReply->setAuthorIp('192.168.1.12');
            $userReply->setParent($adminReply2);
            $userReply->setPage($homePage);
            $userReply->setCreatedAt(new \DateTime('-1 hour'));
            $manager->persist($userReply);
        }
    }
    
    private function createSampleMedias(ObjectManager $manager, User $admin, User $author): void
    {
        $mediasData = [
            [
                'filename' => 'test-image-001.jpg',
                'originalName' => 'Photo de paysage.jpg',
                'mimeType' => 'image/jpeg',
                'fileSize' => 245760, // ~240KB
                'path' => '2024/09/test-image-001.jpg',
                'url' => '/uploads/2024/09/test-image-001.jpg',
                'alt' => 'Magnifique paysage de montagne au coucher du soleil',
                'description' => 'Photo prise lors d\'un voyage dans les Alpes, montrant un coucher de soleil spectaculaire sur les sommets enneigés.',
                'caption' => 'Coucher de soleil dans les Alpes',
                'width' => 1920,
                'height' => 1080,
                'uploadedBy' => $admin,
                'createdAt' => new \DateTime('-5 days')
            ],
            [
                'filename' => 'document-guide-001.pdf',
                'originalName' => 'Guide utilisateur SymfPress.pdf',
                'mimeType' => 'application/pdf',
                'fileSize' => 1048576, // 1MB
                'path' => '2024/09/document-guide-001.pdf',
                'url' => '/uploads/2024/09/document-guide-001.pdf',
                'alt' => 'Guide d\'utilisation SymfPress',
                'description' => 'Documentation complète pour l\'utilisation du CMS SymfPress, incluant les tutoriels pour débutants et les fonctionnalités avancées.',
                'uploadedBy' => $admin,
                'createdAt' => new \DateTime('-3 days')
            ],
            [
                'filename' => 'logo-entreprise-002.png',
                'originalName' => 'Logo_Entreprise_2024.png',
                'mimeType' => 'image/png',
                'fileSize' => 52480, // ~50KB
                'path' => '2024/09/logo-entreprise-002.png',
                'url' => '/uploads/2024/09/logo-entreprise-002.png',
                'alt' => 'Logo officiel de l\'entreprise',
                'description' => 'Logo vectoriel de l\'entreprise en haute résolution, déclinaison couleur principale.',
                'caption' => 'Logo officiel 2024',
                'width' => 500,
                'height' => 200,
                'uploadedBy' => $author,
                'createdAt' => new \DateTime('-2 days')
            ],
            [
                'filename' => 'infographie-stats-003.webp',
                'originalName' => 'Infographie_Statistiques_Q3.webp',
                'mimeType' => 'image/webp',
                'fileSize' => 128000, // ~125KB
                'path' => '2024/09/infographie-stats-003.webp',
                'url' => '/uploads/2024/09/infographie-stats-003.webp',
                'alt' => 'Infographie des statistiques du troisième trimestre',
                'description' => 'Représentation visuelle des performances et métriques clés du troisième trimestre 2024.',
                'caption' => 'Performance Q3 2024',
                'width' => 800,
                'height' => 1200,
                'uploadedBy' => $author,
                'createdAt' => new \DateTime('-1 day')
            ],
            [
                'filename' => 'presentation-projet-004.pptx',
                'originalName' => 'Présentation_Nouveau_Projet.pptx',
                'mimeType' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'fileSize' => 2097152, // 2MB
                'path' => '2024/09/presentation-projet-004.pptx',
                'url' => '/uploads/2024/09/presentation-projet-004.pptx',
                'alt' => 'Présentation du nouveau projet',
                'description' => 'Présentation PowerPoint détaillant les objectifs, la roadmap et les ressources nécessaires pour le nouveau projet.',
                'uploadedBy' => $admin,
                'createdAt' => new \DateTime('-6 hours')
            ],
            [
                'filename' => 'video-demo-005.mp4',
                'originalName' => 'Demo_Fonctionnalites_CMS.mp4',
                'mimeType' => 'video/mp4',
                'fileSize' => 15728640, // 15MB
                'path' => '2024/09/video-demo-005.mp4',
                'url' => '/uploads/2024/09/video-demo-005.mp4',
                'alt' => 'Vidéo de démonstration des fonctionnalités CMS',
                'description' => 'Vidéo tutoriel montrant l\'utilisation des principales fonctionnalités d\'administration du CMS SymfPress.',
                'caption' => 'Tutoriel vidéo - Administration CMS',
                'uploadedBy' => $author,
                'createdAt' => new \DateTime('-2 hours')
            ],
            [
                'filename' => 'audio-podcast-006.mp3',
                'originalName' => 'Podcast_Interview_CEO.mp3',
                'mimeType' => 'audio/mpeg',
                'fileSize' => 8388608, // 8MB
                'path' => '2024/09/audio-podcast-006.mp3',
                'url' => '/uploads/2024/09/audio-podcast-006.mp3',
                'alt' => 'Podcast - Interview du CEO',
                'description' => 'Entretien audio avec le CEO de l\'entreprise sur la vision stratégique et les perspectives d\'avenir.',
                'caption' => 'Interview exclusive - Vision 2025',
                'uploadedBy' => $admin,
                'createdAt' => new \DateTime('-3 hours')
            ]
        ];
        
        foreach ($mediasData as $data) {
            $media = new Media();
            $media->setFilename($data['filename']);
            $media->setOriginalName($data['originalName']);
            $media->setMimeType($data['mimeType']);
            $media->setFileSize($data['fileSize']);
            $media->setPath($data['path']);
            $media->setUrl($data['url']);
            $media->setAlt($data['alt']);
            $media->setDescription($data['description']);
            $media->setUploadedBy($data['uploadedBy']);
            $media->setCreatedAt($data['createdAt']);
            
            if (isset($data['caption'])) {
                $media->setCaption($data['caption']);
            }
            
            if (isset($data['width']) && isset($data['height'])) {
                $media->setWidth($data['width']);
                $media->setHeight($data['height']);
            }
            
            $manager->persist($media);
        }
    }
}

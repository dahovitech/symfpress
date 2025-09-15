<?php

namespace App\Form;

use App\Entity\Page;
use App\Entity\Media;
use App\Entity\Language;
use App\Service\LanguageService;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageType extends AbstractType
{
    public function __construct(
        private readonly LanguageService $languageService
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $currentLanguage = $this->languageService->getCurrentLanguage();
        $availableLanguages = $this->languageService->getAvailableLanguages();
        $isMultilingual = count($availableLanguages) > 1;

        // Champs de base (non traduits)
        $builder
            ->add('slug', TextType::class, [
                'label' => 'Slug',
                'required' => false,
                'help' => 'Le slug sera généré automatiquement si laissé vide.',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'Brouillon' => Page::STATUS_DRAFT,
                    'Publié' => Page::STATUS_PUBLISHED,
                    'Privé' => Page::STATUS_PRIVATE,
                    'Corbeille' => Page::STATUS_TRASH,
                ],
                'attr' => [
                    'class' => 'form-select'
                ]
            ])
            ->add('commentStatus', CheckboxType::class, [
                'label' => 'Autoriser les commentaires',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ])
            ->add('menuOrder', IntegerType::class, [
                'label' => 'Ordre dans le menu',
                'required' => false,
                'data' => 0,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('template', ChoiceType::class, [
                'label' => 'Modèle de page',
                'choices' => [
                    'Modèle par défaut' => 'default',
                    'Pleine largeur' => 'full-width',
                    'Barre latérale à gauche' => 'sidebar-left',
                    'Barre latérale à droite' => 'sidebar-right',
                    'Page d\'atterrissage' => 'landing',
                    'Contact' => 'contact'
                ],
                'attr' => [
                    'class' => 'form-select'
                ]
            ])
            ->add('publishedAt', DateTimeType::class, [
                'label' => 'Date de publication',
                'required' => false,
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('parent', EntityType::class, [
                'label' => 'Page parente',
                'class' => Page::class,
                'choice_label' => function (Page $page) use ($currentLanguage) {
                    $translation = $page->getTranslationForLanguage($currentLanguage);
                    return $translation ? $translation->getTitle() : 'Page #' . $page->getId();
                },
                'required' => false,
                'placeholder' => 'Aucune (page de niveau racine)',
                'attr' => [
                    'class' => 'form-select'
                ]
            ])
            ->add('featuredImage', EntityType::class, [
                'label' => 'Image mise en avant',
                'class' => Media::class,
                'choice_label' => 'originalName',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->where('m.mimeType LIKE :type')
                        ->setParameter('type', 'image/%')
                        ->orderBy('m.createdAt', 'DESC');
                },
                'required' => false,
                'placeholder' => 'Aucune image sélectionnée',
                'attr' => [
                    'class' => 'form-select media-selector',
                    'data-media-type' => 'images'
                ]
            ]);

        // Champs de traduction pour la langue courante
        $this->addTranslationFields($builder, $currentLanguage);

        // Si multilingue, ajouter des onglets pour les autres langues
        if ($isMultilingual) {
            $this->addMultilingualSupport($builder, $availableLanguages, $currentLanguage);
        }

        $builder->add('save', SubmitType::class, [
            'label' => 'Enregistrer',
            'attr' => [
                'class' => 'btn btn-primary'
            ]
        ]);

        // Event listener pour traiter les données avant soumission
        $builder->addEventListener(FormEvents::PRE_SUBMIT, [$this, 'onPreSubmit']);
    }

    private function addTranslationFields(FormBuilderInterface $builder, Language $language): void
    {
        $prefix = 'translation_' . $language->getCode();
        
        $builder
            ->add($prefix . '_title', TextType::class, [
                'label' => 'Titre (' . $language->getName() . ')',
                'required' => true,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    'data-language' => $language->getCode()
                ]
            ])
            ->add($prefix . '_content', TextareaType::class, [
                'label' => 'Contenu (' . $language->getName() . ')',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 10,
                    'data-language' => $language->getCode()
                ]
            ])
            ->add($prefix . '_excerpt', TextareaType::class, [
                'label' => 'Extrait (' . $language->getName() . ')',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 3,
                    'data-language' => $language->getCode()
                ]
            ])
            ->add($prefix . '_metaTitle', TextType::class, [
                'label' => 'Titre SEO (' . $language->getName() . ')',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    'data-language' => $language->getCode()
                ]
            ])
            ->add($prefix . '_metaDescription', TextareaType::class, [
                'label' => 'Description SEO (' . $language->getName() . ')',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 2,
                    'data-language' => $language->getCode()
                ]
            ])
            ->add($prefix . '_metaKeywords', TextType::class, [
                'label' => 'Mots-clés SEO (' . $language->getName() . ')',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    'data-language' => $language->getCode()
                ]
            ]);
    }

    private function addMultilingualSupport(FormBuilderInterface $builder, array $languages, Language $currentLanguage): void
    {
        foreach ($languages as $language) {
            if ($language === $currentLanguage) {
                continue; // Déjà ajouté
            }
            
            $this->addTranslationFields($builder, $language);
        }
    }

    public function onPreSubmit(FormEvent $event): void
    {
        $data = $event->getData();
        $form = $event->getForm();
        
        // Traiter les données de traduction et les restructurer
        // pour faciliter la persistance dans le contrôleur
        $translations = [];
        $availableLanguages = $this->languageService->getAvailableLanguages();
        
        foreach ($availableLanguages as $language) {
            $prefix = 'translation_' . $language->getCode();
            
            if (isset($data[$prefix . '_title']) || 
                isset($data[$prefix . '_content']) || 
                isset($data[$prefix . '_excerpt'])) {
                
                $translations[$language->getCode()] = [
                    'title' => $data[$prefix . '_title'] ?? '',
                    'content' => $data[$prefix . '_content'] ?? '',
                    'excerpt' => $data[$prefix . '_excerpt'] ?? '',
                    'metaTitle' => $data[$prefix . '_metaTitle'] ?? '',
                    'metaDescription' => $data[$prefix . '_metaDescription'] ?? '',
                    'metaKeywords' => $data[$prefix . '_metaKeywords'] ?? '',
                ];
                
                // Supprimer les champs individuels
                unset(
                    $data[$prefix . '_title'],
                    $data[$prefix . '_content'],
                    $data[$prefix . '_excerpt'],
                    $data[$prefix . '_metaTitle'],
                    $data[$prefix . '_metaDescription'],
                    $data[$prefix . '_metaKeywords']
                );
            }
        }
        
        // Ajouter les traductions restructurées
        $data['translations_data'] = $translations;
        
        $event->setData($data);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Page::class,
            'allow_extra_fields' => true,
        ]);
    }
}

<?php

namespace App\Command;

use App\Entity\Language;
use App\Repository\LanguageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-demo-languages',
    description: 'Créer des langues de démonstration'
)]
class CreateDemoLanguagesCommand extends Command
{
    public function __construct(
        private readonly LanguageRepository $languageRepository,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('force', null, InputOption::VALUE_NONE, 'Forcer la création même si des langues existent déjà')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Vérifier si des langues existent déjà
        $existingLanguages = $this->languageRepository->findAll();
        if (!empty($existingLanguages) && !$input->getOption('force')) {
            $io->warning('Des langues existent déjà dans la base de données.');
            $io->note('Utilisez --force pour forcer la création des langues de démonstration');
            $this->listExistingLanguages($io, $existingLanguages);
            return Command::SUCCESS;
        }

        $demoLanguages = [
            ['code' => 'fr', 'name' => 'Français', 'isDefault' => true],
            ['code' => 'en', 'name' => 'English', 'isDefault' => false],
            ['code' => 'es', 'name' => 'Español', 'isDefault' => false],
            ['code' => 'de', 'name' => 'Deutsch', 'isDefault' => false],
            ['code' => 'it', 'name' => 'Italiano', 'isDefault' => false],
        ];

        $created = 0;
        $skipped = 0;

        foreach ($demoLanguages as $langData) {
            $existing = $this->languageRepository->findOneBy(['code' => $langData['code']]);
            
            if ($existing) {
                $io->text("Langue '{$langData['name']}' ({$langData['code']}) existe déjà - ignorée");
                $skipped++;
                continue;
            }

            $language = new Language();
            $language->setCode($langData['code']);
            $language->setName($langData['name']);
            $language->setIsDefault($langData['isDefault']);
            $language->setIsActive(true);

            $this->entityManager->persist($language);
            $created++;
            
            $io->text("✅ Langue '{$langData['name']}' ({$langData['code']}) créée" . 
                     ($langData['isDefault'] ? ' [Par défaut]' : ''));
        }

        if ($created > 0) {
            $this->entityManager->flush();
            $io->success("$created langue(s) de démonstration créée(s) avec succès");
        }

        if ($skipped > 0) {
            $io->note("$skipped langue(s) ignorée(s) (déjà existante(s))");
        }

        // Afficher un résumé des langues
        $io->newLine();
        $io->section('Langues disponibles sur le site:');
        $allLanguages = $this->languageRepository->findBy([], ['isDefault' => 'DESC', 'name' => 'ASC']);
        $this->listExistingLanguages($io, $allLanguages);

        $io->newLine();
        $io->note([
            'Les sélecteurs de langue sont maintenant disponibles dans les thèmes.',
            'Utilisez les fonctions Twig suivantes:',
            '• {{ is_multilingual() }} - Vérifier si le site est multilingue',
            '• {{ get_current_language() }} - Obtenir la langue courante',
            '• {{ get_available_languages() }} - Obtenir toutes les langues',
            '• {{ include(\'partials/language-selector-dropdown.html.twig\') }} - Sélecteur dropdown',
            '',
            'Gestion des langues:',
            '• php bin/console app:language:manage list - Lister les langues',
            '• php bin/console app:language:manage create <code> --name="Name" - Créer une langue',
            '• php bin/console app:language:manage activate/deactivate <code> - Activer/désactiver'
        ]);

        return Command::SUCCESS;
    }

    private function listExistingLanguages(SymfonyStyle $io, array $languages): void
    {
        $rows = [];
        foreach ($languages as $language) {
            $status = [];
            if ($language->getIsDefault()) {
                $status[] = '⭐ Défaut';
            }
            if ($language->getIsActive()) {
                $status[] = '✅ Active';
            } else {
                $status[] = '❌ Inactive';
            }

            $rows[] = [
                $language->getCode(),
                $language->getName(),
                implode(' ', $status)
            ];
        }

        $io->table(['Code', 'Nom', 'Statut'], $rows);
    }
}

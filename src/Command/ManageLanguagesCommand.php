<?php

namespace App\Command;

use App\Entity\Language;
use App\Repository\LanguageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:language:manage',
    description: 'Gérer les langues du site (créer, activer, désactiver)'
)]
class ManageLanguagesCommand extends Command
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
            ->addArgument('action', InputArgument::REQUIRED, 'Action à effectuer (list, create, activate, deactivate, set-default)')
            ->addArgument('code', InputArgument::OPTIONAL, 'Code de la langue (ex: en, es, de)')
            ->addOption('name', null, InputOption::VALUE_OPTIONAL, 'Nom de la langue (ex: "English")')
            ->addOption('force', null, InputOption::VALUE_NONE, 'Forcer l\'action sans confirmation')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $action = $input->getArgument('action');

        switch ($action) {
            case 'list':
                return $this->listLanguages($io);
            
            case 'create':
                return $this->createLanguage($input, $io);
            
            case 'activate':
                return $this->activateLanguage($input, $io);
            
            case 'deactivate':
                return $this->deactivateLanguage($input, $io);
            
            case 'set-default':
                return $this->setDefaultLanguage($input, $io);
            
            default:
                $io->error("Action non reconnue. Actions disponibles: list, create, activate, deactivate, set-default");
                return Command::FAILURE;
        }
    }

    private function listLanguages(SymfonyStyle $io): int
    {
        $languages = $this->languageRepository->findBy([], ['isDefault' => 'DESC', 'name' => 'ASC']);

        if (empty($languages)) {
            $io->warning('Aucune langue trouvée dans la base de données');
            $io->note('Utilisez "php bin/console app:language:manage create <code> --name=<name>" pour créer une langue');
            return Command::SUCCESS;
        }

        $rows = [];
        foreach ($languages as $language) {
            $rows[] = [
                $language->getCode(),
                $language->getName(),
                $language->getIsActive() ? '✅ Oui' : '❌ Non',
                $language->getIsDefault() ? '⭐ Oui' : 'Non',
                count($language->getPostTranslations()) . ' articles',
                count($language->getMenuTranslations()) . ' menus'
            ];
        }

        $io->table(
            ['Code', 'Nom', 'Active', 'Par défaut', 'Articles', 'Menus'],
            $rows
        );

        return Command::SUCCESS;
    }

    private function createLanguage(InputInterface $input, SymfonyStyle $io): int
    {
        $code = $input->getArgument('code');
        $name = $input->getOption('name');

        if (!$code) {
            $io->error('Le code de la langue est obligatoire');
            return Command::FAILURE;
        }

        if (!$name) {
            $name = $io->ask('Nom de la langue', ucfirst($code));
        }

        // Valider le code de langue
        if (!preg_match('/^[a-z]{2}$/', $code)) {
            $io->error('Le code de langue doit être composé de 2 lettres minuscules (ex: fr, en, es)');
            return Command::FAILURE;
        }

        // Vérifier si la langue existe déjà
        $existingLanguage = $this->languageRepository->findOneBy(['code' => $code]);
        if ($existingLanguage) {
            $io->error("Une langue avec le code '$code' existe déjà");
            return Command::FAILURE;
        }

        $language = new Language();
        $language->setCode($code);
        $language->setName($name);
        $language->setIsActive(true);
        
        // Si c'est la première langue, elle devient par défaut
        $existingLanguages = $this->languageRepository->findAll();
        if (empty($existingLanguages)) {
            $language->setIsDefault(true);
            $io->note('Cette langue sera définie comme langue par défaut (première langue du site)');
        }

        $this->entityManager->persist($language);
        $this->entityManager->flush();

        $io->success("Langue '$name' ($code) créée avec succès");

        return Command::SUCCESS;
    }

    private function activateLanguage(InputInterface $input, SymfonyStyle $io): int
    {
        $code = $input->getArgument('code');
        if (!$code) {
            $io->error('Le code de la langue est obligatoire');
            return Command::FAILURE;
        }

        $language = $this->languageRepository->findOneBy(['code' => $code]);
        if (!$language) {
            $io->error("Aucune langue trouvée avec le code '$code'");
            return Command::FAILURE;
        }

        if ($language->getIsActive()) {
            $io->warning("La langue '{$language->getName()}' est déjà active");
            return Command::SUCCESS;
        }

        $language->setIsActive(true);
        $this->entityManager->flush();

        $io->success("Langue '{$language->getName()}' ($code) activée");

        return Command::SUCCESS;
    }

    private function deactivateLanguage(InputInterface $input, SymfonyStyle $io): int
    {
        $code = $input->getArgument('code');
        if (!$code) {
            $io->error('Le code de la langue est obligatoire');
            return Command::FAILURE;
        }

        $language = $this->languageRepository->findOneBy(['code' => $code]);
        if (!$language) {
            $io->error("Aucune langue trouvée avec le code '$code'");
            return Command::FAILURE;
        }

        // Empêcher la désactivation de la langue par défaut
        if ($language->getIsDefault()) {
            $io->error('Impossible de désactiver la langue par défaut. Définissez d\'abord une autre langue comme défaut.');
            return Command::FAILURE;
        }

        if (!$language->getIsActive()) {
            $io->warning("La langue '{$language->getName()}' est déjà inactive");
            return Command::SUCCESS;
        }

        // Demander confirmation si la langue a du contenu
        $hasContent = count($language->getPostTranslations()) > 0 || count($language->getMenuTranslations()) > 0;
        if ($hasContent && !$input->getOption('force')) {
            $confirmed = $io->confirm(
                "La langue '{$language->getName()}' contient du contenu. Êtes-vous sûr de vouloir la désactiver ?",
                false
            );
            if (!$confirmed) {
                $io->info('Opération annulée');
                return Command::SUCCESS;
            }
        }

        $language->setIsActive(false);
        $this->entityManager->flush();

        $io->success("Langue '{$language->getName()}' ($code) désactivée");

        return Command::SUCCESS;
    }

    private function setDefaultLanguage(InputInterface $input, SymfonyStyle $io): int
    {
        $code = $input->getArgument('code');
        if (!$code) {
            $io->error('Le code de la langue est obligatoire');
            return Command::FAILURE;
        }

        $language = $this->languageRepository->findOneBy(['code' => $code]);
        if (!$language) {
            $io->error("Aucune langue trouvée avec le code '$code'");
            return Command::FAILURE;
        }

        if (!$language->getIsActive()) {
            $io->error("Impossible de définir une langue inactive comme défaut. Activez-la d'abord.");
            return Command::FAILURE;
        }

        if ($language->getIsDefault()) {
            $io->warning("La langue '{$language->getName()}' est déjà la langue par défaut");
            return Command::SUCCESS;
        }

        // Retirer le statut par défaut de l'ancienne langue
        $currentDefault = $this->languageRepository->findDefault();
        if ($currentDefault) {
            $currentDefault->setIsDefault(false);
        }

        // Définir la nouvelle langue par défaut
        $language->setIsDefault(true);
        $this->entityManager->flush();

        $io->success("Langue '{$language->getName()}' ($code) définie comme langue par défaut");

        return Command::SUCCESS;
    }
}

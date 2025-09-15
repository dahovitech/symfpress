<?php

namespace App\Command;

use App\Extension\ThemeManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'theme:activate',
    description: 'Active un thème'
)]
class ThemeActivateCommand extends Command
{
    public function __construct(
        private readonly ThemeManager $themeManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('theme', InputArgument::REQUIRED, 'Nom du thème à activer');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $themeName = $input->getArgument('theme');

        $io->title('Activation du thème');

        // Découvrir les thèmes disponibles
        $this->themeManager->discoverThemes();

        // Lister les thèmes disponibles
        $availableThemes = $this->themeManager->getAvailableThemes();
        $io->note(sprintf('Thèmes disponibles: %s', implode(', ', array_keys($availableThemes))));

        // Essayer d'activer le thème
        $success = $this->themeManager->activateTheme($themeName);

        if ($success) {
            $io->success(sprintf('Le thème "%s" a été activé avec succès.', $themeName));
            return Command::SUCCESS;
        } else {
            $io->error(sprintf('Erreur lors de l\'activation du thème "%s".', $themeName));
            return Command::FAILURE;
        }
    }
}

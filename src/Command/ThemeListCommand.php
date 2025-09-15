<?php

namespace App\Command;

use App\Extension\ThemeManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'theme:list',
    description: 'Liste tous les thèmes disponibles'
)]
class ThemeListCommand extends Command
{
    public function __construct(
        private readonly ThemeManager $themeManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Liste des thèmes');

        // Découvrir les thèmes disponibles
        $this->themeManager->discoverThemes();

        $availableThemes = $this->themeManager->getAvailableThemes();
        $activeTheme = $this->themeManager->getActiveTheme();

        if (empty($availableThemes)) {
            $io->warning('Aucun thème trouvé.');
            return Command::SUCCESS;
        }

        $rows = [];
        foreach ($availableThemes as $name => $path) {
            $metadata = $this->themeManager->getThemeMetadata($name);
            $isActive = $name === $activeTheme ? '✅ Actif' : '';
            
            $rows[] = [
                $name,
                $metadata['name'] ?? $name,
                $metadata['version'] ?? 'N/A',
                $metadata['author'] ?? 'Inconnu',
                $isActive
            ];
        }

        $io->table(
            ['ID', 'Nom', 'Version', 'Auteur', 'Statut'],
            $rows
        );

        if ($activeTheme) {
            $io->note(sprintf('Thème actif: %s', $activeTheme));
        } else {
            $io->note('Aucun thème actif');
        }

        return Command::SUCCESS;
    }
}

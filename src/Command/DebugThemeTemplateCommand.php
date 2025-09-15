<?php

namespace App\Command;

use App\Service\TemplateResolver;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Twig\Environment;

#[AsCommand(
    name: 'debug:theme-template',
    description: 'Debug theme template resolution'
)]
class DebugThemeTemplateCommand extends Command
{
    public function __construct(
        private TemplateResolver $templateResolver,
        private Environment $twig,
        private LoggerInterface $logger
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Debug Template Resolution');

        try {
            // 1. Vérifier le thème actif
            $activeTheme = $this->templateResolver->getActiveTheme();
            $io->success("Thème actif: {$activeTheme}");

            // 2. Vérifier les chemins configurés
            $templatePaths = $this->templateResolver->getTemplatePaths();
            $io->section('Chemins de templates configurés:');
            foreach ($templatePaths as $type => $path) {
                $exists = is_dir($path) ? '✅' : '❌';
                $io->text("  {$exists} {$type}: {$path}");
            }

            // 3. Configurer les chemins (comme le ferait ThemeSubscriber)
            $this->templateResolver->setupTemplatePaths();
            $io->success("Chemins de templates configurés");

            // 4. Afficher les namespaces Twig configurés
            $io->section('Namespaces Twig configurés:');
            $loader = $this->twig->getLoader();
            
            if (method_exists($loader, 'getPaths')) {
                $namespaces = $loader->getNamespaces();
                foreach ($namespaces as $namespace) {
                    $paths = $loader->getPaths($namespace);
                    $namespaceDisplay = $namespace ?: '[default]';
                    $io->text("  🔍 Namespace: {$namespaceDisplay}");
                    foreach ($paths as $path) {
                        $io->text("      📂 {$path}");
                    }
                }
            }

            // 5. Tester la résolution de templates
            $io->section('Test de résolution de templates:');
            $testTemplates = [
                'frontend/home.html.twig',
                '__theme__/frontend/home.html.twig',
                'base.html.twig',
                '__theme__/base.html.twig'
            ];

            foreach ($testTemplates as $template) {
                try {
                    $source = $this->twig->getLoader()->getSourceContext($template);
                    $io->text("  ✅ {$template} - TROUVÉ");
                    
                    // Vérifier le contenu pour identifier le thème
                    $content = $source->getCode();
                    if (strpos($content, 'Modern Blog') !== false || strpos($content, 'hero-section') !== false) {
                        $io->text("     🎨 Contient des éléments du thème Modern Blog");
                    }
                    
                    if (preg_match('/{% extends [\'"]([^\'"]+)[\'"] %}/', $content, $matches)) {
                        $io->text("     📋 Template parent: {$matches[1]}");
                    }
                    
                } catch (\Exception $e) {
                    $io->text("  ❌ {$template} - NON TROUVÉ");
                }
            }

            // 6. Test spécifique des fichiers physiques
            $io->section('Vérification physique des fichiers:');
            $themeHomeFile = '/workspace/symfpress/themes/modern-blog/templates/frontend/home.html.twig';
            $baseHomeFile = '/workspace/symfpress/templates/frontend/home.html.twig';
            
            $io->text("  📄 Thème home: " . (file_exists($themeHomeFile) ? '✅ EXISTE' : '❌ N\'EXISTE PAS'));
            $io->text("     Chemin: {$themeHomeFile}");
            
            if (file_exists($themeHomeFile)) {
                $content = file_get_contents($themeHomeFile);
                $firstLine = explode("\n", $content)[0];
                $io->text("     Première ligne: {$firstLine}");
                
                if (strpos($content, 'Modern Blog') !== false || strpos($content, 'hero-section') !== false) {
                    $io->text("     🎨 Contient des éléments du thème Modern Blog");
                }
            }
            
            $io->text("  📄 Base home: " . (file_exists($baseHomeFile) ? '✅ EXISTE' : '❌ N\'EXISTE PAS'));
            $io->text("     Chemin: {$baseHomeFile}");

            // 7. Test de résolution avec resolveTemplate()
            $io->section('Test avec resolveTemplate():');
            $templateToResolve = 'frontend/home.html.twig';
            $resolvedTemplate = $this->templateResolver->resolveTemplate($templateToResolve);
            $io->text("  Template demandé: {$templateToResolve}");
            $io->text("  Template résolu: {$resolvedTemplate}");

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $io->error("Erreur: " . $e->getMessage());
            $io->text("Trace: " . $e->getTraceAsString());
            return Command::FAILURE;
        }
    }
}

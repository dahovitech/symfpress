<?php

/**
 * Script de test pour vérifier le fonctionnement du rate limiting
 * 
 * Usage: php bin/console app:test-rate-limiting
 */

namespace App\Command;

use App\Service\RateLimitService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

#[AsCommand(
    name: 'app:test-rate-limiting',
    description: 'Teste le fonctionnement du rate limiting'
)]
class TestRateLimitingCommand extends Command
{
    public function __construct(
        private RateLimitService $rateLimitService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('limiter-type', InputArgument::OPTIONAL, 'Type de limiteur à tester', 'api')
            ->addArgument('requests', InputArgument::OPTIONAL, 'Nombre de requêtes à simuler', 10);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $limiterType = $input->getArgument('limiter-type');
        $requestCount = (int) $input->getArgument('requests');

        $io->title('Test du Rate Limiting');
        $io->info(sprintf('Test du limiteur "%s" avec %d requêtes simulees', $limiterType, $requestCount));

        // Crée une requête factice
        $testRequest = Request::create('/test', 'GET', [], [], [], ['REMOTE_ADDR' => '127.0.0.1']);

        $io->section('Informations initiales');
        $initialInfo = $this->rateLimitService->getLimitInfo($limiterType, $testRequest);
        $io->table(
            ['Propriété', 'Valeur'],
            [
                ['Limite', $initialInfo['limit'] ?? 'N/A'],
                ['Restantes', $initialInfo['remaining'] ?? 'N/A'],
                ['Fenêtre', $initialInfo['window'] ?? 'N/A']
            ]
        );

        $io->section('Simulation des requêtes');
        $successCount = 0;
        $blockedCount = 0;

        for ($i = 1; $i <= $requestCount; $i++) {
            try {
                $this->rateLimitService->checkLimit($limiterType, $testRequest);
                $successCount++;
                $io->writeln(sprintf('<info>Requête %d: ACCEPTÉE</info>', $i));
            } catch (TooManyRequestsHttpException $e) {
                $blockedCount++;
                $io->writeln(sprintf('<error>Requête %d: BLOQUÉE - %s</error>', $i, $e->getMessage()));
            } catch (\Exception $e) {
                $io->writeln(sprintf('<error>Requête %d: ERREUR - %s</error>', $i, $e->getMessage()));
            }
        }

        $io->section('Résultat du test');
        $io->table(
            ['Métrique', 'Valeur'],
            [
                ['Requêtes acceptées', $successCount],
                ['Requêtes bloquées', $blockedCount],
                ['Total simulé', $requestCount]
            ]
        );

        // Informations finales
        $finalInfo = $this->rateLimitService->getLimitInfo($limiterType, $testRequest);
        $io->section('Informations finales');
        $io->table(
            ['Propriété', 'Valeur'],
            [
                ['Limite', $finalInfo['limit'] ?? 'N/A'],
                ['Restantes', $finalInfo['remaining'] ?? 'N/A'],
                ['Réinitialisation', $finalInfo['reset_time'] ? date('H:i:s', $finalInfo['reset_time']) : 'N/A']
            ]
        );

        // Test proximité limite
        $isNearLimit = $this->rateLimitService->isNearLimit($limiterType, $testRequest, null, 80);
        if ($isNearLimit) {
            $io->warning('Attention: Proche de la limite (>80%)');
        } else {
            $io->success('Niveau de limite acceptable (<80%)');
        }

        $io->success('Test du rate limiting terminé');
        
        return Command::SUCCESS;
    }
}
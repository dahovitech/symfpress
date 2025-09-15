<?php

namespace App\Tests\Service;

use App\Entity\Setting;
use App\Repository\SettingRepository;
use App\Service\ThemeManager;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Filesystem\Filesystem;

class ThemeManagerTest extends TestCase
{
    private ThemeManager $themeManager;
    private MockObject|EntityManagerInterface $entityManager;
    private MockObject|SettingRepository $settingRepository;
    private MockObject|LoggerInterface $logger;
    private ArrayAdapter $cache;
    private string $testDir;
    private Filesystem $filesystem;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->settingRepository = $this->createMock(SettingRepository::class);
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->cache = new ArrayAdapter();
        
        // Créer un répertoire temporaire pour les tests
        $this->testDir = sys_get_temp_dir() . '/symfpress_test_' . uniqid();
        $this->filesystem = new Filesystem();
        $this->filesystem->mkdir($this->testDir);
        
        $this->themeManager = new ThemeManager(
            $this->entityManager,
            $this->settingRepository,
            $this->logger,
            $this->cache,
            $this->testDir
        );
    }

    protected function tearDown(): void
    {
        // Nettoyer le répertoire de test
        if ($this->filesystem->exists($this->testDir)) {
            $this->filesystem->remove($this->testDir);
        }
    }

    public function testGetActiveThemeWithNoSetting(): void
    {
        // Préparer le thème par défaut
        $this->createMockTheme('modern-blog');
        
        $this->settingRepository
            ->expects($this->once())
            ->method('getValue')
            ->with(ThemeManager::ACTIVE_THEME_KEY)
            ->willReturn(null);
            
        $this->settingRepository
            ->expects($this->once())
            ->method('setValue')
            ->with(
                ThemeManager::ACTIVE_THEME_KEY,
                'modern-blog',
                'Thème actif du site (défaut)'
            );

        $activeTheme = $this->themeManager->getActiveTheme();
        
        $this->assertEquals('modern-blog', $activeTheme);
    }

    public function testGetActiveThemeWithExistingSetting(): void
    {
        // Préparer le thème de test
        $this->createMockTheme('test-theme');
        
        $this->settingRepository
            ->expects($this->once())
            ->method('getValue')
            ->with(ThemeManager::ACTIVE_THEME_KEY)
            ->willReturn('test-theme');

        $activeTheme = $this->themeManager->getActiveTheme();
        
        $this->assertEquals('test-theme', $activeTheme);
    }

    public function testActivateThemeSuccess(): void
    {
        // Préparer le thème
        $this->createMockTheme('test-theme');

        $this->settingRepository
            ->expects($this->once())
            ->method('setValue')
            ->with(
                ThemeManager::ACTIVE_THEME_KEY,
                'test-theme',
                'Thème actif du site'
            );

        $result = $this->themeManager->activateTheme('test-theme');
        
        $this->assertTrue($result);
    }

    public function testActivateThemeWithInvalidTheme(): void
    {
        $this->settingRepository
            ->expects($this->never())
            ->method('setValue');

        $result = $this->themeManager->activateTheme('nonexistent-theme');
        
        $this->assertFalse($result);
    }

    public function testValidateThemeValid(): void
    {
        $this->createMockTheme('valid-theme');
        
        $isValid = $this->themeManager->validateTheme('valid-theme');
        
        $this->assertTrue($isValid);
    }

    public function testValidateThemeInvalid(): void
    {
        $isValid = $this->themeManager->validateTheme('nonexistent-theme');
        
        $this->assertFalse($isValid);
    }

    public function testGetAvailableThemes(): void
    {
        $this->createMockTheme('theme1');
        $this->createMockTheme('theme2');
        
        $themes = $this->themeManager->getAvailableThemes();
        
        $this->assertArrayHasKey('theme1', $themes);
        $this->assertArrayHasKey('theme2', $themes);
        $this->assertCount(2, $themes);
    }

    public function testGetThemeInfo(): void
    {
        $this->createMockTheme('test-theme', [
            'name' => 'Test Theme',
            'description' => 'Un thème de test',
            'version' => '2.0.0',
            'author' => 'Test Author'
        ]);
        
        $themeInfo = $this->themeManager->getThemeInfo('test-theme');
        
        $this->assertIsArray($themeInfo);
        $this->assertEquals('Test Theme', $themeInfo['name']);
        $this->assertEquals('Un thème de test', $themeInfo['description']);
        $this->assertEquals('2.0.0', $themeInfo['version']);
        $this->assertEquals('Test Author', $themeInfo['author']);
    }

    public function testGetThemeInfoNonexistent(): void
    {
        $themeInfo = $this->themeManager->getThemeInfo('nonexistent-theme');
        
        $this->assertNull($themeInfo);
    }

    public function testThemeExists(): void
    {
        $this->createMockTheme('existing-theme');
        
        $this->assertTrue($this->themeManager->themeExists('existing-theme'));
        $this->assertFalse($this->themeManager->themeExists('nonexistent-theme'));
    }

    public function testGetThemePath(): void
    {
        $this->createMockTheme('test-theme');
        
        $path = $this->themeManager->getThemePath('test-theme');
        
        $this->assertStringEndsWith('/themes/test-theme', $path);
        $this->assertTrue(is_dir($path));
    }

    public function testGetThemeStats(): void
    {
        $this->createMockTheme('theme1');
        $this->createMockTheme('theme2');
        
        // Mock pour getActiveTheme
        $this->settingRepository
            ->method('getValue')
            ->willReturn('theme1');
        
        $stats = $this->themeManager->getThemeStats();
        
        $this->assertArrayHasKey('total_themes', $stats);
        $this->assertArrayHasKey('active_theme', $stats);
        $this->assertArrayHasKey('themes_list', $stats);
        $this->assertArrayHasKey('themes_path', $stats);
        
        $this->assertEquals(2, $stats['total_themes']);
        $this->assertEquals('theme1', $stats['active_theme']);
        $this->assertContains('theme1', $stats['themes_list']);
        $this->assertContains('theme2', $stats['themes_list']);
    }

    /**
     * Crée un thème fictif pour les tests
     */
    private function createMockTheme(string $themeName, array $config = []): void
    {
        $themePath = $this->testDir . '/themes/' . $themeName;
        $templatesPath = $themePath . '/templates';
        
        // Créer la structure de répertoires
        $this->filesystem->mkdir([$themePath, $templatesPath]);
        
        // Créer le fichier base.html.twig obligatoire
        $this->filesystem->touch($templatesPath . '/base.html.twig');
        
        // Créer le fichier de configuration theme.yaml si des données sont fournies
        if (!empty($config)) {
            $yamlContent = '';
            foreach ($config as $key => $value) {
                $yamlContent .= "{$key}: \"{$value}\"\n";
            }
            file_put_contents($themePath . '/theme.yaml', $yamlContent);
        }
    }
}

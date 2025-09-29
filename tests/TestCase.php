<?php declare(strict_types=1);

namespace Codedive\LaravelNcloudSdk\Tests;

use Dotenv\Dotenv;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * TestCase 기본 설정
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * Define environment setup
     *
     * @param Application $app
     * @return void
     */
    protected function defineEnvironment($app): void
    {
        $dotenvPath = dirname(__DIR__.'/tests');

        if (file_exists($dotenvPath . '/.env')) {
            Dotenv::createImmutable($dotenvPath)->load();
        }
    }
}

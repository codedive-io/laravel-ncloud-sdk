<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk;

use Codedive\LaravelNcloudSdk\Core\ApiClient;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\CloudOutboundMailerService;
use Illuminate\Support\ServiceProvider;

/**
 * Service Provider
 */
class LaravelNcloudSdkServiceProvider extends ServiceProvider
{
    /**
     * Register
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ncloud_sdk.php', 'ncloud_sdk');

        $this->app->singleton(CloudOutboundMailerService::class, function ($app) {
            return new CloudOutboundMailerService(new ApiClient($app['config']['ncloud_sdk']));
        });
    }

    /**
     * Boot
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/ncloud_sdk.php' => config_path('ncloud_sdk.php'),
        ], 'laravel_ncloud_sdk_config');
    }
}

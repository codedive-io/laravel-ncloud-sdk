<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk;

use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\CloudOutboundMailerService;
use Illuminate\Support\Facades\Facade;

/**
 * Outbound Mailer Facade
 * @mixin CloudOutboundMailerService
 */
class CloudOutboundMailer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CloudOutboundMailerService::class;
    }
}

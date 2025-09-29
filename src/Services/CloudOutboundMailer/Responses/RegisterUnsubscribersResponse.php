<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * 광고 메일을 수신 거부할 메일 주소를 등록
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-registerunsubscribers
 */
class RegisterUnsubscribersResponse extends ApiResponse
{
    /**
     * @return int 등록 요청받은 이메일 주소
     */
    public function getCount(): int
    {
        return (int)$this->parsed['count'];
    }

    /**
     * @return int 등록 요청받은 이메일 개수
     */
    public function getRequestCount(): int
    {
        return (int)$this->parsed['requestCount'];
    }

    /**
     * @return int 등록 요청받은 이메일 주소 중 등록되지 않은 메일 주소 개수
     */
    public function getIgnoreCount(): int
    {
        return (int)$this->parsed['ignoreCount'];
    }
}

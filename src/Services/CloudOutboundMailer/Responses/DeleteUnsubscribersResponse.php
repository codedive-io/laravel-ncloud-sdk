<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * 수신 거부 목록에 등록된 이메일 주소를 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteunsubscribers
 */
class DeleteUnsubscribersResponse extends ApiResponse
{
    /**
     * @return int 삭제 요청받은 메일 주소 중 수신 거부 목록에서 삭제된 메일 주소 개수
     */
    public function getCount() : int
    {
        return (int)$this->parsed['count'];
    }

    /**
     * @return int 삭제 요청받은 메일 주소 개수
     */
    public function getRequestCount() : int
    {
        return (int)$this->parsed['requestCount'];
    }

    /**
     * @return int 삭제 요청받은 메일 주소 중 삭제되지 않은 메일 주소 개수
     */
    public function getIgnoreCount() : int
    {
        return (int)$this->parsed['ignoreCount'];
    }
}

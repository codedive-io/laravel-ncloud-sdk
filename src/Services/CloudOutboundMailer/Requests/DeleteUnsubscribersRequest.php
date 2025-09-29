<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 수신 거부 목록에 등록된 이메일 주소를 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteunsubscribers
 */
class DeleteUnsubscribersRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
        $this->resourcePath('/unsubscribers');
        $this->formAsJson = true;
    }

    /**
     * @param array $blockedReceivers 삭제할 수신자의 이메일 주소 목록
     * @return DeleteUnsubscribersRequest
     */
    public function blockedReceivers(array $blockedReceivers): DeleteUnsubscribersRequest
    {
        return $this->formParam('blockedReceivers', $blockedReceivers);
    }
}

<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 광고 메일을 수신 거부할 메일 주소를 등록
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-registerunsubscribers
 */
class RegisterUnsubscribersRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'POST';
        $this->resourcePath('/unsubscribers');
        $this->formAsJson = true;
    }

    /**
     * @param array $blockedReceivers 등록할 수신자의 이메일 주소 목록
     * @return RegisterUnsubscribersRequest
     */
    public function blockedReceivers(array $blockedReceivers): RegisterUnsubscribersRequest
    {
        return $this->formParam('blockedReceivers', $blockedReceivers);
    }
}

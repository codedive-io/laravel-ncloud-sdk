<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

class GetMailRequestStatusRequest extends GetMailRequest
{
    /**
     * @param string $requestId 각 요청을 구분하기 위한 이메일 발송 요청 ID
     * @return GetMailRequestStatusRequest
     */
    public function requestId(string $requestId): GetMailRequestStatusRequest
    {
        return $this->resourcePath('/mails/requests/'.$requestId.'/status');
    }
}


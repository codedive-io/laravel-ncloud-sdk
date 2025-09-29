<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 발송 요청한 이메일 목록을 조회합니다.
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmail
 */
class GetMailRequest extends ApiRequest
{
    /**
     * mail id 설정
     * @param string $mailId 각 이메일을 식별하기 위한 고유 ID
     * @return GetMailRequest
     */
    public function mailId(string $mailId): GetMailRequest
    {
        return $this->resourcePath('/mails/'.$mailId);
    }

}

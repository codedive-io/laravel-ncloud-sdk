<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * CreateMailRequest 응답
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createmailrequest
 */
class CreateMailRequestResponse extends ApiResponse
{
    /**
     * 각 요청을 구분하기 위한 이메일 발송 요청 ID
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->parsed['requestId'];
    }

    /**
     * 이메일 발송 요청 건 수
     * @return int
     */
    public function getCount(): int
    {
        return $this->parsed['count'];
    }
}

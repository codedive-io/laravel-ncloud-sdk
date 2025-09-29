<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 사용자가 요청하여 삭제 처리된 이메일 템플릿을 복구
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-restoretemplate
 */
class RestoreTemplateRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'PUT';
    }

    /**
     * @param int $templateSid 복구할 템플릿의 SID
     * @return RestoreTemplateRequest
     */
    public function templateSid(int $templateSid): RestoreTemplateRequest
    {
        return $this->resourcePath('/template/'.$templateSid.'/restoration');
    }
}


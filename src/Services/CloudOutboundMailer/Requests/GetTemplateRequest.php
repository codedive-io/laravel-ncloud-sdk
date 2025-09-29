<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 저장된 메일 템플릿 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplate
 */
class GetTemplateRequest extends ApiRequest
{
    /**
     * @param int $templateSid 조회할 템플릿의 SID
     * @return GetTemplateRequest
     */
    public function templateSid(int $templateSid): GetTemplateRequest
    {
        return $this->resourcePath('/template/'.$templateSid);
    }
}

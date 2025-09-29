<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 사용하지 않는 이메일 템플릿을 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletetemplate
 */
class DeleteTemplateRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
    }

    /**
     * @param int $templateSid 삭제할 템플릿의 SID
     * @return DeleteTemplateRequest
     */
    public function templateSid(int $templateSid): DeleteTemplateRequest
    {
        return $this->resourcePath('/template/'.$templateSid);
    }
}

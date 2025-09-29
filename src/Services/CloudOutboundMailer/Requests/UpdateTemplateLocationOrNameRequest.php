<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 사용자가 생성한 메일 템플릿의 위치와 이름을 수정
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatetemplatelocationorname
 */
class UpdateTemplateLocationOrNameRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'PUT';
        $this->formAsJson = true;
    }

    /**
     * @param int $templateSid 수정할 템플릿의 SID
     * @return UpdateTemplateLocationOrNameRequest
     */
    public function templateSid(int $templateSid): UpdateTemplateLocationOrNameRequest
    {
        return $this->resourcePath('/template/'.$templateSid.'/name-location');
    }

    /**
     * @param string $templateName 수정할 템플릿의 이름
     * @return UpdateTemplateLocationOrNameRequest
     */
    public function templateName(string $templateName): UpdateTemplateLocationOrNameRequest
    {
        return $this->formParam('templateName', $templateName);
    }

    /**
     * @param int|null $parentSid 부모 카테고리의 SID
     * @return UpdateTemplateLocationOrNameRequest
     */
    public function parentSid(?int $parentSid): UpdateTemplateLocationOrNameRequest
    {
        return $this->formParam('parentSid', $parentSid);
    }

    /**
     * @param int|null $lowerSid 하위에 배치할 템플릿 또는 카테고리의 SID
     * @return UpdateTemplateLocationOrNameRequest
     */
    public function lowerSid(?int $lowerSid): UpdateTemplateLocationOrNameRequest
    {
        return $this->formParam('lowerSid', $lowerSid);
    }
}

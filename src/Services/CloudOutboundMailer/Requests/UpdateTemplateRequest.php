<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 생성한 이메일 템플릿의 이름, 내용 등의 속성을 수정
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatetemplate
 */
class UpdateTemplateRequest extends ApiRequest
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
     * 수정할 템플릿의 SID
     * @param int $templateSid
     * @return UpdateTemplateRequest
     */
    public function templateSid(int $templateSid): UpdateTemplateRequest
    {
        return $this->resourcePath('/template/'.$templateSid);
    }

    /**
     * @param string $templateName 수정할 템플릿 이름
     * @return UpdateTemplateRequest
     */
    public function templateName(string $templateName): UpdateTemplateRequest
    {
        return $this->formParam('templateName', $templateName);
    }

    /**
     * @param string|null $description 템플릿 설명
     * @return UpdateTemplateRequest
     */
    public function description(?string $description): UpdateTemplateRequest
    {
        return $this->formParam('description', $description);
    }

    /**
     * @param string $title 이메일 제목
     * @return UpdateTemplateRequest
     */
    public function title(string $title): UpdateTemplateRequest
    {
        return $this->formParam('title', $title);
    }

    /**
     * @param string|null $body 이메일 본문
     * @return UpdateTemplateRequest
     */
    public function body(?string $body): UpdateTemplateRequest
    {
        return $this->formParam('body', $body);
    }

    /**
     * @param string $senderAddress 발송자 이메일 주소
     * @return UpdateTemplateRequest
     */
    public function senderAddress(string $senderAddress): UpdateTemplateRequest
    {
        return $this->formParam('senderAddress', $senderAddress);
    }

    /**
     * @param string|null $senderName 발송자 이름
     * @return UpdateTemplateRequest
     */
    public function senderName(?string $senderName): UpdateTemplateRequest
    {
        return $this->formParam('senderName', $senderName);
    }

    /**
     * @param bool|null $isUse 수정한 템플릿의 사용 여부 (true: 템플릿 사용, false: 템플릿 사용하지 않음)
     * @return UpdateTemplateRequest
     */
    public function isUse(?bool $isUse): UpdateTemplateRequest
    {
        return $this->formParam('isUse', $isUse);
    }
}

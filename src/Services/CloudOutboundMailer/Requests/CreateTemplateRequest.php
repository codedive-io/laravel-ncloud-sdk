<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 발송할 이메일의 제목과 본문 등을 설정하여 새로운 메일 템플릿을 생성합니다.
 */
class CreateTemplateRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/template');
        $this->method = 'POST';
        $this->formAsJson = true;
    }

    /**
     * @param string|null $categorySid 템플릿이 소속될 카테고리의 SID (기본값 : -1)
     * @return CreateTemplateRequest
     */
    public function categorySid(?string $categorySid): CreateTemplateRequest
    {
        return $this->formParam('categorySid', $categorySid);
    }

    /**
     * @param string $templateName 생성할 템플릿 이름
     * @return CreateTemplateRequest
     */
    public function templateName(string $templateName): CreateTemplateRequest
    {
        return $this->formParam('templateName', $templateName);
    }

    /**
     * @param string|null $description 템플릿에 대한 설명 (Byte)
     * @return CreateTemplateRequest
     */
    public function description(?string $description): CreateTemplateRequest
    {
        return $this->formParam('description', $description);
    }

    /**
     * @param string $title 이메일 제목 (Byte)
     * @return CreateTemplateRequest
     */
    public function title(string $title): CreateTemplateRequest
    {
        return $this->formParam('title', $title);
    }

    /**
     * @param string $body 이메일 본문
     * @return CreateTemplateRequest
     */
    public function body(string $body): CreateTemplateRequest
    {
        return $this->formParam('body', $body);
    }

    /**
     * @param string $senderAddress 발송자 이메일 주소
     * @return CreateTemplateRequest
     */
    public function senderAddress(string $senderAddress): CreateTemplateRequest
    {
        return $this->formParam('senderAddress', $senderAddress);
    }

    /**
     * @param string|null $senderName 발송자 이름(Byte)
     * @return CreateTemplateRequest
     */
    public function senderName(?string $senderName): CreateTemplateRequest
    {
        return $this->formParam('senderName', $senderName);
    }

    /**
     * @param bool|null $isUse 생성한 템플릿의 사용 여부 (true: 템플릿 사용, false: 사용하지 않음)
     * @return CreateTemplateRequest
     */
    public function isUse(?bool $isUse): CreateTemplateRequest
    {
        return $this->formParam('isUse', $isUse);
    }
}

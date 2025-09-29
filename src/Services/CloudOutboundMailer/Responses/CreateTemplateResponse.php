<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Category;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;

/**
 * 발송할 이메일의 제목과 본문 등을 설정하여 새로운 메일 템플릿 생성
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createtemplate
 */
class CreateTemplateResponse extends ApiResponse
{
    /**
     * @return int 생성한 템플릿의 ID
     */
    public function getSid(): int
    {
        return $this->parsed['sid'];
    }

    /**
     * @return NesDateTime 생성 일시
     */
    public function getCreateDate(): NesDateTime
    {
        return NesDateTime::fromArray($this->parsed['createDate']);
    }

    /**
     * @return string 생성한 템플릿의 이름
     */
    public function getName(): string
    {
        return $this->parsed['name'];
    }

    /**
     * @return string|null 생성한 템플릿에 대한 설명
     */
    public function getDescription(): ?string
    {
        return $this->parsed['description'];
    }

    /**
     * @return string 이메일 제목
     */
    public function getTitle(): string
    {
        return $this->parsed['title'];
    }

    /**
     * @return string 발송자의 이메일 주소
     */
    public function getSenderAddress(): string
    {
        return $this->parsed['senderAddress'];
    }

    /**
     * @return string 발송자 이름
     */
    public function getSenderName(): string
    {
        return $this->parsed['senderName'];
    }

    /**
     * @return string 이메일 본문
     */
    public function getBody(): string
    {
        return $this->parsed['body'];
    }

    /**
     * @return bool 템플릿 사용 여부
     */
    public function getIsUse(): bool
    {
        return $this->parsed['isUse'];
    }

    /**
     * @return Category|null 부모 카테고리의 정보
     */
    public function getCategory(): ?Category
    {
        return !empty($this->parsed['category']) ? Category::fromArray($this->parsed['category']) : null;
    }
}

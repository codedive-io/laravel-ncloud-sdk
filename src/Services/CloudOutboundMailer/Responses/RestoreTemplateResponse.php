<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Category;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;

/**
 * 사용자가 요청하여 삭제 처리된 이메일 템플릿을 복구
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-restoretemplate
 */
class RestoreTemplateResponse extends ApiResponse
{
    /**
     * @return int 복구한 템플릿의 SID
     */
    public function getSid(): int
    {
        return (int)$this->parsed['sid'];
    }

    /**
     * @return NesDateTime 생성 일시
     */
    public function getCreateDate(): NesDateTime
    {
        return NesDatetime::fromArray($this->parsed['createDate']);
    }

    /**
     * @return string 템플릿의 이름
     */
    public function getName(): string
    {
        return $this->parsed['name'];
    }

    /**
     * @return string|null 템플릿에 대한 설명
     */
    public function getDescription(): ?string
    {
        return !empty($this->parsed['description']) ? $this->parsed['description'] : null;
    }

    /**
     * @return string 이메일 제목
     */
    public function getTitle(): string
    {
        return $this->parsed['title'];
    }

    /**
     * @return string 발송자 이메일 주소
     */
    public function getSenderAddress(): string
    {
        return $this->parsed['senderAddress'];
    }

    /**
     * @return string|null 발송자 이름
     */
    public function getSenderName(): ?string
    {
        return !empty($this->parsed['senderName']) ? $this->parsed['senderName'] : null;
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
        return (bool)$this->parsed['isUse'];
    }

    /**
     * @return Category|null 부모 카테고리의 정보
     */
    public function getCategory(): ?Category
    {
        return !empty($this->parsed['category']) ? Category::fromArray($this->parsed['category']) : null;
    }
}

<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Category;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;

class DeleteTemplateResponse extends ApiResponse
{
    /**
     * @return int 삭제한 템플릿의 SID
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
        return NesDateTime::fromArray($this->parsed['createDate']);
    }

    /**
     * @return string 삭제한 템플릿의 이름
     */
    public function getName(): string
    {
        return $this->parsed['name'];
    }

    /**
     * @return string|null 삭제한 템플릿에 대한 설명
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

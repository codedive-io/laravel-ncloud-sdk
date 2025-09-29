<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * 이메일 발송 프로젝트별 설정 항목을 생성
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createconfig
 */
class CreateConfigResponse extends ApiResponse
{
    /**
     * @return string 생성되거나 변경된 설정 항목
     */
    public function getType(): string
    {
        return $this->parsed['type'];
    }

    /**
     * @return string|null 해당 설정의 서브 타입
     */
    public function getSubType(): ?string
    {
        return !empty($this->parsed['type']) ? $this->parsed['type'] : null;
    }

    /**
     * @return string 반영된 설정 값
     */
    public function getValue(): string
    {
        return $this->parsed['value'];
    }
}

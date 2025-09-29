<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\EmailStatus;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;

/**
 * 발송 요청한 이메일 목록을 조회
 */
class GetMailResponse extends apiResponse
{
    /**
     * 각 요청을 구분하기 위한 이메일 발송 요청 ID 정보 반환
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->parsed['requestId'];
    }

    /**
     * 이메일 발송 요청자 IP
     * @return string
     */
    public function getRequesterIp(): string
    {
        return $this->parsed['requesterIp'];
    }

    /**
     * 요청 일시 정보
     * @return NesDateTime
     */
    public function getRequestDate(): NesDateTime
    {
        return new NesDateTime($this->parsed['requestDate']['utc'], $this->parsed['requestDate']['formattedDate'], $this->parsed['requestDate']['formattedDateTime']);
    }

    /**
     * 각 이메일을 식별하기 위한 고유 ID
     * @return string
     */
    public function getMailId(): string
    {
        return $this->parsed['mailId'];
    }

    /**
     * 이메일 제목
     * @return string
     */
    public function getTitle(): string
    {
        return $this->parsed['title'];
    }

    /**
     * 조회한 템플릿의 Sid
     * @return int
     */
    public function getTemplateSid(): int
    {
        return (int)$this->parsed['templateSid'];
    }

    /**
     * 조회한 템플릿의 이름
     * @return string
     */
    public function getTemplateName(): string
    {
        return $this->parsed['templateName'];
    }

    /**
     * 발송 상태 정보 반환
     * @return EmailStatus
     */
    public function getEmailStatus(): EmailStatus
    {
        return new EmailStatus($this->parsed['emailStatus']['label'], $this->parsed['emailStatus']['code']);
    }

    /**
     * 발송자 이메일 주소 반환
     * @return string
     */
    public function getSenderAddress(): string
    {
        return $this->parsed['senderAddress'];
    }

    /**
     * 발송자 이름 반환
     * @return string
     */
    public function getSenderName(): string
    {
        return $this->parsed['senderName'];
    }

    /**
     * 발송 완료 일시
     * @return NesDateTime|null
     */
    public function getSendDate(): ?NesDateTime
    {
        return !empty($this->parsed['sendDate']) ? NesDateTime::fromArray($this->parsed['sendDate']) : null;
    }

    /**
     * 예약 일시 반환
     * @return NesDateTime|null
     */
    public function getReservationDate(): ?NesDateTime
    {
        return !empty($this->parsed['reservationDate']) ? NesDateTime::fromArray($this->parsed['reservationDate']) : null;
    }

    /**
     * 이메일 본문 반환
     * @return string
     */
    public function getBody(): string
    {
        return $this->parsed['body'];
    }

    /**
     * Reference 헤더 반환
     * @return string|null
     */
    public function getReferencesHeader(): ?string
    {
        return !empty($this->parsed['referencesHeader']) ? $this->parsed['referencesHeader'] : null;
    }

    /**
     * 첨부 파일 목록 반환
     * @return array|null
     */
    public function getAttachFiles(): ?array
    {
        return !empty($this->parsed['attachFiles']) ? $this->parsed['attachFiles'] : null;
    }

    /**
     * 수신자 목록 반환
     * @return array
     */
    public function getRecipients(): array
    {
        return $this->parsed['recipients'];
    }

    /**
     * 광고 메일 여부 반환
     * @return bool
     */
    public function getAdvertising(): bool
    {
        return $this->parsed['advertising'];
    }
}

<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\CountByStatus;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;

class GetMailRequestStatusResponse extends ApiResponse
{
    /**
     * @return string 각 요청을 구분하기 위한 이메일 발송 요청 ID
     */
    public function getRequestId(): string
    {
        return $this->parsed['requestId'];
    }

    /**
     * @return bool 요청 건수가 모두 DB 에 입력되어 발송 준비가 완료되었는지 여부
     */
    public function getReadyCompleted(): bool
    {
        return $this->parsed['readyCompleted'];
    }

    /**
     * @return bool 요청된 모든 메일의 발송 성공 여부
     */
    public function getAllSentSuccess(): bool
    {
        return $this->parsed['allSentSuccess'];
    }

    /**
     * @return int 발송 요청 건 수
     */
    public function getRequestCount(): int
    {
        return $this->parsed['requestCount'];
    }

    /**
     * @return int 성공적으로 발송된 건 수
     */
    public function getSentCount(): int
    {
        return $this->parsed['sentCount'];
    }

    /**
     * @return int 처리된 건 수
     */
    public function getFinishCount(): int
    {
        return $this->parsed['finishCount'];
    }

    /**
     * @return int 준비 완료 또는 발송된 건 수
     */
    public function getReadyCount(): int
    {
        return $this->parsed['readyCount'];
    }

    /**
     * @return NesDateTime|null 예약 일시
     */
    public function getReservationDate(): ?NesDateTime
    {
        return !empty($this->parsed['reservationDate']) ? NesDateTime::fromArray($this->parsed['reservationDate']) : null;
    }

    /**
     * @return array<CountByStatus> 상태별 메일 개수
     */
    public function getCountsByStatus(): array
    {
        $parsedCountByStatus = $this->parsed['countsByStatus'];

        $countByStatus = [];

        foreach($parsedCountByStatus as $parsedCountByStatusItem) {
            $countByStatus[] = CountByStatus::fromArray($parsedCountByStatusItem);
        }

        return $countByStatus;
    }
}

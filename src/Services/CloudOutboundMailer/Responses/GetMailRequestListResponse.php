<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\EmailStatus;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\RequestListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Sort;

/**
 * 이메일 발송을 요청한 내역 목록을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmailrequestlist
 */
class GetMailRequestListResponse extends ApiResponse
{
    /**
     * @return array<RequestListResponse>|null 요청 내역 목록에 대한 상세 내용
     */
    public function getContent(): ?array
    {
        $content = $this->parsed['content'];

        $contentData = [];

        foreach($content as $contentItem) {
            $contentData[] = new RequestListResponse(
                $contentItem['requestId'],
                $contentItem['integer'] ?? null,
                $contentItem['templateName'] ?? null,
                $contentItem['senderAddress'] ?? null,
                $contentItem['senderName'] ?? null,
                $contentItem['dispatchType'] ?? null,
                EmailStatus::fromArray($contentItem['emailStatus']),
                NesDateTime::fromArray($contentItem['requestDate']),
                ($contentItem['sendDate']) ? NesDateTime::fromArray($contentItem['sendDate']) : null,
                ($contentItem['reservationDate']) ? NesDateTime::fromArray($contentItem['reservationDate']) : null,
                $contentItem['requestCount'],
                $contentItem['recipientCount']
            );
        }

        return $contentData;
    }

    /**
     * @return bool 마지막 페이지인지 여부
     */
    public function getLast(): bool
    {
        return $this->parsed['last'];
    }

    /**
     * @return int 총 레코드 개수
     */
    public function getTotalElements(): int
    {
        return $this->parsed['totalElements'];
    }

    /**
     * @return int 총 페이지 수
     */
    public function getTotalPages(): int
    {
        return $this->parsed['totalPages'];
    }

    /**
     * @return bool 첫번째 페이지 여부
     */
    public function getFirst(): bool
    {
        return $this->parsed['first'];
    }

    /**
     * @return int 현재 페이지의 레코드 개수
     */
    public function getNumberOfElements(): int
    {
        return $this->parsed['numberOfElements'];
    }

    /**
     * @return int 페이지 당 레코드 개수
     */
    public function getSize(): int
    {
        return $this->parsed['size'];
    }

    /**
     * @return int 현재 페이지의 인덱스 (0 부터 시작)
     */
    public function getNumber(): int
    {
        return $this->parsed['number'];
    }

    /**
     * @return array 정렬 기준
     */
    public function getSort(): array
    {
        $parsedSort = $this->parsed['sort'];
        $sort = [];

        foreach($parsedSort as $parsedSortItem) {
            $sort[] = Sort::fromArray($parsedSortItem);
        }

        return $sort;
    }
}

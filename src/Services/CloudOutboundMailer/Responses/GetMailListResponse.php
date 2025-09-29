<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Sort;

/**
 * GetMailList Response
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmaillist
 */
class GetMailListResponse extends ApiResponse
{
    /**
     * 메일 발송 요청에 대한 상세 내용
     * @return array
     */
    public function getContent(): array
    {
        return $this->parsed['content'];
    }

    /**
     * 마지막 페이지 여부
     * @return bool
     */
    public function getLast(): bool
    {
        return $this->parsed['last'];
    }

    /**
     * 총 레코드 개수
     * @return int
     */
    public function getTotalElements(): int
    {
        return $this->parsed['totalElements'];
    }

    /**
     * 총 페이지 수
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->parsed['totalPages'];
    }

    /**
     * 첫번째 페이지 여부
     * @return bool
     */
    public function getFirst(): bool
    {
        return $this->parsed['first'];
    }

    /**
     * 현재 페이지의 레코드 개수
     * @return int
     */
    public function getNumberOfElements(): int
    {
        return $this->parsed['numberOfElements'];
    }

    /**
     * 정렬 기준
     * @return array
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

    /**
     * 페이지 당 레코드 개수
     * @return int
     */
    public function getSize(): int
    {
        return $this->parsed['size'];
    }

    /**
     * 현재 페이지의 인덱스
     * @return int
     */
    public function getNumber(): int
    {
        return $this->parsed['number'];
    }
}

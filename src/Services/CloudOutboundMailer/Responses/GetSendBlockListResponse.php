<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\SendBlockHistoryResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Sort;

class GetSendBlockListResponse extends ApiResponse
{
    /**
     * @return array<SendBlockHistoryResponse>|null 발송 차단 목록에 대한 상세 내용
     */
    public function getContent(): ?array
    {
        $parsedContent = $this->parsed['content'];

        $content = null;

        if (!empty($parsedContent)) {
            foreach($parsedContent as $parsedContentItem) {
                $content[] = SendBlockHistoryResponse::fromArray($parsedContentItem);
            }
        }

        return $content;
    }

    /**
     * @return string 해당 메일의 현재 발송 차단 여부
     */
    public function getRegisterStatus(): string
    {
        return $this->parsed['registerStatus'];
    }

    /**
     * @return NesDateTime|null 차단 해제가 예정된 일시
     */
    public function getExpectedDeleteDate(): ?NesDateTime
    {
        return !empty($this->parsed['expectedDeleteDate']) ? NesDateTime::fromArray($this->parsed['expectedDeleteDate']) : null;
    }

    /**
     * @return bool 마지막 페이지 여부
     */
    public function getLast(): bool
    {
        return (bool)$this->parsed['last'];
    }

    /**
     * @return int 총 레코드 개수
     */
    public function getTotalElements(): int
    {
        return (int)$this->parsed['totalElements'];
    }

    /**
     * @return int 총 페이지 수
     */
    public function getTotalPages(): int
    {
        return (int)$this->parsed['totalPages'];
    }

    /**
     * @return bool 첫 페이지 여부
     */
    public function getFirst(): bool
    {
        return (bool)$this->parsed['first'];
    }

    /**
     * @return int 현재 페이지의 레코드 개수
     */
    public function getNumberOfElements(): int
    {
        return (int)$this->parsed['numberOfElements'];
    }

    /**
     * @return int 페이지 당 레코드 개수
     */
    public function getSize(): int
    {
        return (int)$this->parsed['size'];
    }

    /**
     * @return int 현재 페이지의 인덱
     */
    public function getNumber(): int
    {
        return (int)$this->parsed['number'];
    }

    /**
     * @return array<Sort> 정렬 기준
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

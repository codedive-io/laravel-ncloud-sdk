<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Sort;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\UnsubscribersListResponse;

/**
 * 수신 거부 목록에 포함된 이메일 주소를 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getunsubscriberslist
 */
class GetUnsubscribersListResponse extends ApiResponse
{
    /**
     * @return array|null 수신 거부 목록에 대한 상세 내용
     */
    public function getContent(): ?array
    {
        $parsedContent = $this->parsed['content'];

        $content = null;

        if (!empty($parsedContent)) {
            foreach($parsedContent as $parsedContentItem) {
                $content[] = UnsubscribersListResponse::fromArray($parsedContentItem);
            }
        }

        return $content;
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
     * @return bool 마지막 페이지 여부
     */
    public function getLast(): bool
    {
        return (bool)$this->parsed['last'];
    }

    /**
     * @return int 현재 페이지의 레코드 개수
     */
    public function getNumberOfElements(): int
    {
        return (int)$this->parsed['numberOfElements'];
    }

    /**
     * @return bool 첫 번째 페이지 여부
     */
    public function getFirst(): bool
    {
        return (bool)$this->parsed['first'];
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

    /**
     * @return int 페이지 당 레코드 개수
     */
    public function getSize(): int
    {
        return (int)$this->parsed['size'];
    }

    /**
     * @return int 현재 페이지의 인덱스
     */
    public function getNumber(): int
    {
        return (int)$this->parsed['number'];
    }
}

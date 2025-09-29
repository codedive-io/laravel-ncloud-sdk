<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Sort;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\TemplateExportRequestResponse;

/**
 * 이메일 템플릿의 백업 파일 생성을 요청한 내역 목록을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplateexportrequestlist
 */
class GetTemplateExportRequestListResponse extends ApiResponse
{
    /**
     * @return array<TemplateExportRequestResponse> 요청 내역 목록에 대한 상세 내용
     */
    public function getContent(): array
    {
        $parsedContent = $this->parsed['content'];

        $content = [];

        foreach($parsedContent as $contentItem) {
            $content[] = TemplateExportRequestResponse::fromArray($contentItem);
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
     * @return bool 마지막 페이지 여부
     */
    public function getLast(): bool
    {
        return (bool)$this->parsed['last'];
    }

    /**
     * @return int 총 페이지 수
     */
    public function getTotalPages(): int
    {
        return (int)$this->parsed['totalPages'];
    }

    /**
     * @return int 페이지당 레코드 개수
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

    /**
     * @return array 정렬 기준
     */
    public function getSort(): array
    {
        $parsedSort = $this->parsed['sort'];

        $sort = [];

        foreach($parsedSort as $sortItem) {
            $sort[] = Sort::fromArray($sortItem);
        }

        return $sort;
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
}

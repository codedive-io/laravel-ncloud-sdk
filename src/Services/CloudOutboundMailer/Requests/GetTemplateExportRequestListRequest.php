<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

/**
 * 이메일 템플릿의 백업 파일 생성을 요청한 내역 목록을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplateexportrequestlist
 */
class GetTemplateExportRequestListRequest extends GetTemplateRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/template/export');
    }

    /**
     * @param int|null $size 페이지당 레코드 개수
     * @return GetTemplateExportRequestListRequest
     */
    public function size(?int $size): GetTemplateExportRequestListRequest
    {
        return $this->queryParam('size', $size);
    }

    /**
     * @param int|null $page 조회할 페이지 인덱스
     * @return GetTemplateExportRequestListRequest
     */
    public function page(?int $page): GetTemplateExportRequestListRequest
    {
        return $this->queryParam('page', $page);
    }

    /**
     * @param string|null $sort 정렬 기준 (createUtc: 요청 생성일시, sid: 요청 SID, statusCode: 요청 상태) property(,asc|desc)
     * @return GetTemplateExportRequestListRequest
     */
    public function sort(?string $sort): GetTemplateExportRequestListRequest
    {
        return $this->queryParam('sort', $sort);
    }
}

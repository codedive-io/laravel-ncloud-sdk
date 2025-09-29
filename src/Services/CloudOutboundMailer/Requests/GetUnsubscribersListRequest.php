<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 수신 거부 목록에 포함된 이메일 주소를 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getunsubscriberslist
 */
class GetUnsubscribersListRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/unsubscribers');
    }

    /**
     * @param int|null $startUtc 수신 거부 등록 일시의 시작점
     * @return GetUnsubscribersListRequest
     */
    public function startUtc(?int $startUtc): GetUnsubscribersListRequest
    {
        return $this->queryParam('startUtc', $startUtc);
    }

    /**
     * @param string|null $startDateTime 수신 거부 등록 일시의 시작점(UTC+09:00) YYYY-mm-dd HH:ii:ss
     * @return GetUnsubscribersListRequest
     */
    public function startDateTime(?string $startDateTime): GetUnsubscribersListRequest
    {
        return $this->queryParam('startDateTime', $startDateTime);
    }

    /**
     * @param int|null $endUtc 수신 거부 등록 일시의 종료점
     * @return GetUnsubscribersListRequest
     */
    public function endUtc(?int $endUtc): GetUnsubscribersListRequest
    {
        return $this->queryParam('endUtc', $endUtc);
    }

    /**
     * @param string|null $endDateTime 수신 거부 등록 일시의 종료점(UTC+09:00) YYYY-mm-dd HH:ii:ss
     * @return GetUnsubscribersListRequest
     */
    public function endDateTime(?string $endDateTime): GetUnsubscribersListRequest
    {
        return $this->queryParam('endDateTime', $endDateTime);
    }

    /**
     * @param string|null $emailAddress 검색할 특정 이메일 주소
     * @return GetUnsubscribersListRequest
     */
    public function emailAddress(?string $emailAddress): GetUnsubscribersListRequest
    {
        return $this->queryParam('emailAddress', $emailAddress);
    }

    /**
     * @param bool|null $isRegByManager 관리자에 의한 등록 여부(true: 관리자 등록, false: 관리자 등록 아님)
     * @return GetUnsubscribersListRequest
     */
    public function isRegByManager(?bool $isRegByManager): GetUnsubscribersListRequest
    {
        return $this->queryParam('isRegByManager', $isRegByManager);
    }

    /**
     * @param int|null $size 페이지당 레코드 개수
     * @return GetUnsubscribersListRequest
     */
    public function size(?int $size): GetUnsubscribersListRequest
    {
        return $this->queryParam('size', $size);
    }

    /**
     * @param int|null $page 조회할 페이지 인덱스
     * @return GetUnsubscribersListRequest
     */
    public function page(?int $page): GetUnsubscribersListRequest
    {
        return $this->queryParam('page', $page);
    }

    /**
     * @param string|null $sort 정렬 기준
     * @return GetUnsubscribersListRequest
     */
    public function sort(?string $sort): GetUnsubscribersListRequest
    {
        return $this->queryParam('sort', $sort);
    }
}

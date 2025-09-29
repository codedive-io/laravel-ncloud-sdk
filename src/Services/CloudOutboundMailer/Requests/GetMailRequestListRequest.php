<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 이메일 발송을 요청한 내역 목록을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmailrequestlist
 */
class GetMailRequestListRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/mails/requests');
    }

    /**
     * 조회할 요청 내역의 시작 일시 설정
     * @param int|null $startUtc UTC+9
     * @return GetMailRequestListRequest
     */
    public function startUtc(?int $startUtc): GetMailRequestListRequest
    {
        return $this->queryParam('startUtc', $startUtc);
    }

    /**
     * 조회할 요청 내역의 시작 일시 설정
     * @param string|null $startDateTime YYYY-mm-dd HH:ii:ss:SSSS
     * @return GetMailRequestListRequest
     */
    public function startDateTime(?string $startDateTime): GetMailRequestListRequest
    {
        return $this->queryParam('startDateTime', $startDateTime);
    }

    /**
     * 조회할 요청 내역의 종료 일시 설정
     * @param int|null $endUtc UTC+9
     * @return GetMailRequestListRequest
     */
    public function endUtc(?int $endUtc): GetMailRequestListRequest
    {
        return $this->queryParam('endUtc', $endUtc);
    }

    /**
     * 조회할 요청 내역의 종료 일시 Datetime 설정
     * @param string|null $endDateTime YYYY-mm-dd HH:ii:ss:SSSS
     * @return GetMailRequestListRequest
     */
    public function endDateTime(?string $endDateTime): GetMailRequestListRequest
    {
        return $this->queryParam('endDateTime', $endDateTime);
    }

    /**
     * 각 요청을 구분하기 위한 이메일 발송 요청 ID
     * @param string|null $requestId 이메일 발송 요청 ID
     * @return GetMailRequestListRequest
     */
    public function requestId(?string $requestId): GetMailRequestListRequest
    {
        return $this->queryParam('requestId', $requestId);
    }

    /**
     * 각 이메일을 식별하기 위한 고유 ID
     * @param string|null $mailId 각 이메일을 식별하기 위한 고유 ID
     * @return GetMailRequestListRequest
     */
    public function mailId(?string $mailId): GetMailRequestListRequest
    {
        return $this->queryParam('mailId', $mailId);
    }

    /**
     * 이메일 발송을 요청할 때 사용된 도구
     * @param string|null $dispatchType CONSOLE, API 중 하나
     * @return GetMailRequestListRequest
     */
    public function dispatchType(?string $dispatchType): GetMailRequestListRequest
    {
        return $this->queryParam('dispatchType', $dispatchType);
    }

    /**
     * 이메일 제목, like 검색 지원
     * @param string|null $title 이메일 제목
     * @return GetMailRequestListRequest
     */
    public function title(?string $title): GetMailRequestListRequest
    {
        return $this->queryParam('title', $title);
    }

    /**
     * 이메일 작성에 사용된 템필릿의 SID
     * @param int|null $templateSid
     * @return GetMailRequestListRequest
     */
    public function templateSid(?int $templateSid): GetMailRequestListRequest
    {
        return $this->queryParam('templateSid', $templateSid);
    }

    /**
     * 발송자 이메일 주소
     * @param string|null $senderAddress
     * @return GetMailRequestListRequest
     */
    public function senderAddress(?string $senderAddress): GetMailRequestListRequest
    {
        return $this->queryParam('senderAddress', $senderAddress);
    }

    /**
     * 수신자 이메일 주소
     * @param string|null $recipientAddress
     * @return GetMailRequestListRequest
     */
    public function recipientAddress(?string $recipientAddress): GetMailRequestListRequest
    {
        return $this->queryParam('recipientAddress', $recipientAddress);
    }

    /**
     * 이메일 발송 상태
     * @param array|null $sendStatus 이메일 발송 상태 (P: 발송 준비 중, R: 발송 준비, I: 발송 중, S: 발송 성공, F: 발송 실패, U: 수신 거부, C: 발송 취소, PF: 일부 실패)
     * @return GetMailRequestListRequest
     */
    public function sendStatus(?array $sendStatus): GetMailRequestListRequest
    {
        return $this->queryParam('sendStatus', $sendStatus);
    }

    /**
     * 페이지 당 레코드 개수 설정
     * @param int|null $size
     * @return GetMailRequestListRequest
     */
    public function size(?int $size): GetMailRequestListRequest
    {
        return $this->queryParam('size', $size);
    }

    /**
     * 조회할 페이지 인덱스 설정
     * @param int|null $page
     * @return GetMailRequestListRequest
     */
    public function page(?int $page): GetMailRequestListRequest
    {
        return $this->queryParam('page', $page);
    }

    /**
     * 정렬 기준 설정
     * @param string $sort 정렬 기준 (createUtc: 생성 일시, recipientCount: 수신자 수, reservationUtc: 발송 예약 일시, sendUtc: 발송 완료 일시, statusCode: 발송 상태) property(,aas|desc)
     * @return GetMailRequestListRequest
     */
    public function sort(string $sort): GetMailRequestListRequest
    {
        return $this->queryParam('sort', $sort);
    }
}


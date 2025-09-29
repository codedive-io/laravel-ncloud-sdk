<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\RecipientForRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\RecipientGroupFilter;

/**
 * 수신자, 발신자, 메일 내용 등을 지정하여 이메일 발송을 요청
 * 발송 작업은 비동기로 처리
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createmailrequest
 */
class CreateMailRequestRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath = '/mails';
        $this->method = 'POST';
        $this->formAsJson = true;
    }

    /**
     * 발송자 이메일 주소
     * @param string|null $senderAddress
     * @return CreateMailRequestRequest
     */
    public function senderAddress(?string $senderAddress): CreateMailRequestRequest
    {
        return $this->formParam('senderAddress', $senderAddress);
    }

    /**
     * 발송자 이름 (0~69 Byte)
     * @param string|null $senderName
     * @return CreateMailRequestRequest
     */
    public function senderName(?string $senderName): CreateMailRequestRequest
    {
        return $this->formParam('senderName', $senderName);
    }

    /**
     * 이메일 작성에 사용할 템플릿 SID
     * @param string|null $templateSid
     * @return CreateMailRequestRequest
     */
    public function templateSid(?string $templateSid): CreateMailRequestRequest
    {
        return $this->formParam('templateSid', $templateSid);
    }

    /**
     * 이메일 제목(0~500 Byte)
     * @param string|null $title
     * @return CreateMailRequestRequest
     */
    public function title(?string $title): CreateMailRequestRequest
    {
        return $this->formParam('title', $title);
    }

    /**
     * 이메일 본문 (0~500 KB)
     * @param string|null $body
     * @return CreateMailRequestRequest
     */
    public function body(?string $body): CreateMailRequestRequest
    {
        return $this->formParam('body', $body);
    }

    /**
     * 일반 또는 개인별 발송 여부 (true: 개인별 발송, false: 일반 발송)
     * @param bool|null $individual
     * @return CreateMailRequestRequest
     */
    public function individual(?bool $individual): CreateMailRequestRequest
    {
        return $this->formParam('individual', $individual);
    }

    /**
     * 확인 후 발송 여부 (true: 확인 후 발송, false: 확인 없이 바로 발송)
     * @param bool|null $confirmAndSend
     * @return CreateMailRequestRequest
     */
    public function confirmAndSend(?bool $confirmAndSend): CreateMailRequestRequest
    {
        return $this->formParam('confirmAndSend', $confirmAndSend);
    }

    /**
     * 광고 메일 여부 (true: 광고 메일, false: 일반 메일)
     * @param bool|null $advertising
     * @return CreateMailRequestRequest
     */
    public function advertising(?bool $advertising): CreateMailRequestRequest
    {
        return $this->formParam('advertising', $advertising);
    }

    /**
     * 치환 파라미터
     * @param array|null $parameters
     * @return CreateMailRequestRequest
     * @see https://guide.ncloud-docs.com/docs/cloudoutboundmailer-use-mail#%EC%B9%98%ED%99%98-%ED%83%9C%EA%B7%B8-%EC%82%AC%EC%9A%A9
     */
    public function parameters(?array $parameters): CreateMailRequestRequest
    {
        return $this->formParam('parameters', $parameters);
    }

    /**
     * References 헤더
     * @param string|null $referencesHeader
     * @return CreateMailRequestRequest
     */
    public function referencesHeader(?string $referencesHeader): CreateMailRequestRequest
    {
        return $this->formParam('referencesHeader', $referencesHeader);
    }

    /**
     * 예약 발송 일시를 1/1000 초로 환산한 정수
     * @param int|null $reservationUtc
     * @return CreateMailRequestRequest
     */
    public function reservationUtc(?int $reservationUtc): CreateMailRequestRequest
    {
        return $this->formParam('reservationUtc', $reservationUtc);
    }

    /**
     * 예약 발송 일시 YYYY-mm-dd HH:mm 형태의 문자열
     * @param string|null $reservationDateTime
     * @return CreateMailRequestRequest
     */
    public function reservationDateTime(?string $reservationDateTime): CreateMailRequestRequest
    {
        return $this->formParam('reservationDateTime', $reservationDateTime);
    }

    /**
     * 첨부 파일의 ID 목록
     * @param array|null $attachFileIds
     * @return CreateMailRequestRequest
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createfile
     */
    public function attachFileIds(?array $attachFileIds): CreateMailRequestRequest
    {
        return $this->formParam('attachFileIds', $attachFileIds);
    }

    /**
     * 수신자 목록
     * @param array<RecipientForRequest>|null $recipients
     * @return CreateMailRequestRequest
     */
    public function recipients(?array $recipients): CreateMailRequestRequest
    {
        return $this->formParam('recipients', $recipients);
    }

    /**
     * 수신자 그룹 조합 필터
     * @param array<RecipientGroupFilter>|null $recipientGroupFilter
     * @return CreateMailRequestRequest
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createmailrequest
     */
    public function recipientGroupFilter(?array $recipientGroupFilter): CreateMailRequestRequest
    {
        return $this->formParam('recipientGroupFilter', $recipientGroupFilter);
    }

    /**
     * 광고 메일에서 수신 거부 메시지 사용 여부 (true: 기본 수신 거부 메시지 사용, false: 사용자 정의 수신 거부 메시지 사용, 기본값은 true)
     * @param bool|null $useBasicUnsubscribeMsg
     * @return CreateMailRequestRequest
     */
    public function useBasicUnsubscribeMsg(?bool $useBasicUnsubscribeMsg): CreateMailRequestRequest
    {
        return $this->formParam('useBasicUnsubscribeMsg', $useBasicUnsubscribeMsg);
    }

    /**
     * 사용자 정의 수신 거부 메시지 문구
     * @param string|null $unsubscribeMessage
     * @return CreateMailRequestRequest
     */
    public function unsubscribeMessage(?string $unsubscribeMessage): CreateMailRequestRequest
    {
        return $this->formParam('unsubscribeMessage', $unsubscribeMessage);
    }
}

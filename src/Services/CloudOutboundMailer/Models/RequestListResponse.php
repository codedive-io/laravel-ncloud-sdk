<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 요청 목록 조회 내용
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nesrequestlistcontent
 */
class RequestListResponse
{
    /**
     * @var string|null 이메일 발송 요청 ID
     */
    private ?string $requestId = null;

    /**
     * @var int|null 템플릿 ID
     */
    private ?int $templateSid = null;

    /**
     * @var string|null 템플릿 이름
     */
    private ?string $templateName = null;

    /**
     * @var string|null 발송자 이메일 주소
     */
    private ?string $senderAddress = null;

    /**
     * @var string|null 발송자 이름
     */
    private ?string $senderName = null;

    /**
     * @var string|null 이메일 발송 요청 도구 (CONSOLE | API)
     */
    private ?string $dispatchType = null;

    /**
     * @var EmailStatus 발송 상태
     */
    private EmailStatus $emailStatus;

    /**
     * @var NesDateTime 요청 일시
     */
    private NesDateTime $requestDate;

    /**
     * @var NesDateTime|null 발송 완료 일시
     */
    private ?NesDateTime $sendDate;

    /**
     * @var NesDateTime|null 예약 일시
     */
    private ?NesDateTime $reservationDate;

    /**
     * @var int 발송 메일 건 수
     */
    private int $requestCount;

    /**
     * @var int 발송 수신자/참조/숨은 참조자 수 총 합
     */
    private int $recipientCount;

    /**
     * 생성자
     * @param string $requestId 이메일 발송 요청 ID
     * @param int|null $templateSid 템플릿 ID
     * @param string|null $templateName 템플릿 이름
     * @param string|null $senderAddress 발송자 이메일 주소
     * @param string|null $senderName 발송자 이름
     * @param string|null $dispatchType 이메일 발송 요청 도구 (CONSOLE|API)
     * @param EmailStatus $emailStatus 발송 상태
     * @param NesDateTime $requestDate 요청 일시
     * @param NesDateTime|null $sendDate 발송 완료 일시
     * @param NesDateTime|null $reservationDate 예약 일시
     * @param int $requestCount 발송 메일 건 수
     * @param int $recipientCount 발송 수신자/참조/숨은 참조자 수 총합
     * @SuppressWarnings("php:S107")
 */
    public function __construct(string $requestId, ?int $templateSid, ?string $templateName, ?string $senderAddress, ?string $senderName, ?string $dispatchType, EmailStatus $emailStatus, NesDateTime $requestDate, ?NesDateTime $sendDate, ?NesDateTime $reservationDate, int $requestCount, int $recipientCount)
    {
        $this->requestId = $requestId;
        $this->templateSid = $templateSid;
        $this->templateName = $templateName;
        $this->senderAddress = $senderAddress;
        $this->senderName = $senderName;
        $this->dispatchType = $dispatchType;
        $this->emailStatus = $emailStatus;
        $this->requestDate = $requestDate;
        $this->sendDate = $sendDate;
        $this->reservationDate = $reservationDate;
        $this->requestCount = $requestCount;
        $this->recipientCount = $recipientCount;
    }

    /**
     * @return string|null 이메일 발송 요청 ID
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @return int|null 템플릿 ID
     */
    public function getTemplateSid(): ?int
    {
        return $this->templateSid;
    }

    /**
     * @return string|null 템플릿 이름
     */
    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    /**
     * @return string|null 발송자 이메일 주소
     */
    public function getSenderAddress(): ?string
    {
        return $this->senderAddress;
    }

    /**
     * @return string|null 발송자 이름
     */
    public function getSenderName(): ?string
    {
        return $this->senderName;
    }

    /**
     * @return string|null 이메일 발송 요청 도구 (CONSOLE | API)
     */
    public function getDispatchType(): ?string
    {
        return $this->dispatchType;
    }

    /**
     * @return EmailStatus 발송 상태
     */
    public function getEmailStatus(): EmailStatus
    {
        return $this->emailStatus;
    }

    /**
     * @return NesDateTime 요청 일시
     */
    public function getRequestDate(): NesDateTime
    {
        return $this->requestDate;
    }

    /**
     * @return NesDateTime|null 발송 완료 일시
     */
    public function getSendDate(): ?NesDateTime
    {
        return $this->sendDate;
    }

    /**
     * @return NesDateTime|null 예약 일시
     */
    public function getReservationDate(): ?NesDateTime
    {
        return $this->reservationDate;
    }

    /**
     * @return int|null 발송 메일 건 수
     */
    public function getRequestCount(): ?int
    {
        return $this->requestCount;
    }

    /**
     * @return int|null 발송 수신자/참조/숨은 참조자 수 총 합
     */
    public function getRecipientCount(): ?int
    {
        return $this->recipientCount;
    }
}

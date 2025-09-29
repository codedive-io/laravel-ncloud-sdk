<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 발송 차단 조회 목록 내용
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nessendblockcontent
 */
class SendBlockHistoryResponse
{
    /**
     * @var string 조회한 메일 주
     */
    private string $targetAddress;

    /**
     * @var HistoryActionType 동작 유형
     */
    private HistoryActionType $actionType;

    /**
     * @var RequestType 동작 요청자
     */
    private RequestType $actionRequestType;

    /**
     * @var NesDateTime 등록 일시
     */
    private NesDateTime $requestDate;

    /**
     * @var string 발송 차단 코드
     */
    private string $sendResultCode;

    /**
     * @var string 발송 차단 사유
     */
    private string $sendResultMessage;

    /**
     * @var string 조회할 발송 차단 이력 ID
     */
    private string $historySid;

    /**
     * 생성자
     * @param string $targetAddress 조회한 메일 주소
     * @param HistoryActionType $actionType 동작 유형
     * @param RequestType $actionRequestType 동작 요청자
     * @param NesDateTime $requestDate 등록 일시
     * @param string $sendResultCode 발송 차단 코드
     * @param string $sendResultMessage 발송 차단 사유
     * @param string $historySid 조회할 발송 차단 이력 ID
     */
    public function __construct(string $targetAddress, HistoryActionType $actionType, RequestType $actionRequestType, NesDateTime $requestDate, string $sendResultCode, string $sendResultMessage, string $historySid)
    {
        $this->targetAddress = $targetAddress;
        $this->actionType = $actionType;
        $this->actionRequestType = $actionRequestType;
        $this->requestDate = $requestDate;
        $this->sendResultCode = $sendResultCode;
        $this->sendResultMessage = $sendResultMessage;
        $this->historySid = $historySid;
    }

    /**
     * @return string 조회할 메일 주소
     */
    public function getTargetAddress(): string
    {
        return $this->targetAddress;
    }

    /**
     * @return HistoryActionType 동작 유형
     */
    public function getActionType(): HistoryActionType
    {
        return $this->actionType;
    }

    /**
     * @return RequestType 동작 요청자
     */
    public function getActionRequestType(): RequestType
    {
        return $this->actionRequestType;
    }

    /**
     * @return NesDateTime 등록 일시
     */
    public function getRequestDate(): NesDateTime
    {
        return $this->requestDate;
    }

    /**
     * @return string 발송 차단 코드
     */
    public function getSendResultCode(): string
    {
        return $this->sendResultCode;
    }

    /**
     * @return string 발송 차단 사유
     */
    public function getSendResultMessage(): string
    {
        return $this->sendResultMessage;
    }

    /**
     * @return string 조회할 발송 차단 이력 ID
     */
    public function getHistorySid(): string
    {
        return $this->historySid;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['targetAddress'],
            is_array($data['actionType']) ? HistoryActionType::fromArray($data['actionType']) : $data['actionType'],
            is_array($data['actionRequestType']) ? RequestType::fromArray($data['actionRequestType']) : $data['actionRequestType'],
            is_array($data['requestDate']) ? NesDateTime::fromArray($data['requestDate']) : $data['requestDate'],
            $data['sendResultCode'],
            $data['sendResultMessage'],
            $data['historySid']
        );
    }
}

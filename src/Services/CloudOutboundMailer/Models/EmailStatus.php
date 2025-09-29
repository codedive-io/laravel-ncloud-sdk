<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 이메일 발송 상태
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nesstatus
 */
class EmailStatus
{
    /**
     * @var string 상태 라벨 (발송 준비 중, 발송 준비, 발송 중, 발송 성공, 발송 실패, 수신 거부, 발송 취소, 일부 실패)
     */
    private string $label;

    /**
     * @var string 상태 코드 (P, R, I, S, F, U, C, PF)
     */
    private string $code;

    /**
     * 생성자
     * @param string $label 상태 라벨
     * @param string $code 상태 코드
     */
    public function __construct(string $label, string $code)
    {
        $this->label = $label;
        $this->code = $code;
    }

    /**
     * 상태 라벨 정보 반환
     * @return string (발송 준비 중, 발송 준비, 발송 중, 발송 성공, 발송 실패, 수신 거부, 발송 취소, 일부 실패)
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * 상태 코드 정보 반환
     * @return string (P, R, I, S, F, U, C, PF)
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return EmailStatus
     */
    public static function fromArray(array $data): EmailStatus
    {
        return new EmailStatus($data['label'], $data['code']);
    }
}

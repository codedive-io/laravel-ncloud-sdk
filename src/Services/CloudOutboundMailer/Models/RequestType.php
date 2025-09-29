<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 요청자 유형
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nesrequestertype
 */
class RequestType
{
    /**
     * @var string 요청자 유형 라벨 (고객, 타 고객, 시스템, 관리자)
     */
    private string $label;

    /**
     * @var string 요청자 유형 코드 (CUSTOMER, OTHER_CUSTOMER, SYSTEM, ADMIN)
     */
    private string $code;

    /**
     * 생성자
     * @param string $label 요청자 유형 라벨
     * @param string $code 요청자 유형 코드
     */
    public function __construct(string $label, string $code)
    {
        $this->label = $label;
        $this->code = $code;
    }

    /**
     * @return string 요청자 유형 라벨
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string 요청자 유형 코드
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return RequestType
     */
    public static function fromArray(array $data): RequestType
    {
        return new self($data['label'], $data['code']);
    }
}

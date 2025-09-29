<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 템플릿 백업 요청 상태
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nestemplatebackupstatus
 */
class TemplateBackupStatus
{
    /**
     * @var string 상태 라벨 (완료, 만료, 생성 중, 대기)
     */
    private string $label;

    /**
     * @var string 상태 코드 (C, E, I, R)
     */
    private string $code;

    /**
     * 생성자
     * @param string $label 상태 라벨(완료, 만료, 생성 중, 대기)
     * @param string $code 상태 코드(C, E, I, R)
     */
    public function __construct(string $label, string $code)
    {
        $this->label = $label;
        $this->code = $code;
    }

    /**
     * @return string 상태 라벨 (완료, 만료, 생성 중, 대기)
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string 상태 코드 (C, E, I, R)
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['label'], $data['code']);
    }
}

<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

class HistoryActionType
{
    /**
     * @var string 행동에 대한 라벨 (생성, 삭제)
     */
    private string $label;

    /**
     * @var string 행동에 대한 코드 (C, D)
     */
    private string $code;

    /**
     * 생성자
     * @param string $label 행동에 대한 라벨 (생성, 삭제)
     * @param string $code 행동에 대한 코드 (C, D)
     */
    public function __construct(string $label, string $code)
    {
        $this->label = $label;
        $this->code = $code;
    }

    /**
     * @return string 행동에 대한 라벨 (생성, 삭제)
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string 행동에 대한 코드 (C, D)
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

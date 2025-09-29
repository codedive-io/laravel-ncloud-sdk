<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

class NesDateTime
{
    /**
     * @var int UTC 정보
     */
    private int $utc;

    /**
     * @var string UTC+9 형태의 날짜 YYYY-mm-dd
     */
    private string $formattedDate;

    /**
     * @var string UTC+9 형태의 일시 YYYY-mm-dd HH:mm:ss:SSSS
     */
    private string $formattedDateTime;

    public function __construct(int $utc, string $formattedDate, string $formattedDateTime)
    {
        $this->utc = $utc;
        $this->formattedDate = $formattedDate;
        $this->formattedDateTime = $formattedDateTime;
    }

    /**
     * UTC 정보 반환
     * @return int
     */
    public function getUtc(): int
    {
        return $this->utc;
    }

    /**
     * formatted date 정보 반환
     * @return string UTC+9 형태의 날짜 YYYY-mm-dd
     */
    public function getFormattedDate(): string
    {
        return $this->formattedDate;
    }

    /**
     * formatted datetime 정보 반환
     * @return string UTC+9 형태의 일시 YYYY-mm-dd HH:mm:ss:SSSS
     */
    public function getFormattedDateTime(): string
    {
        return $this->formattedDateTime;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): NesDateTime
    {
        return new NesDateTime($data['utc'], $data['formattedDate'], $data['formattedDateTime']);
    }
}

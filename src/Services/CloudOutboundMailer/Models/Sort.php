<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

class Sort
{
    /**
     * @var string 정렬 방향 (ASC, DESC)
     */
    private string $direction;

    /**
     * @var string 정렬 기준 필드명
     */
    private string $property;

    /**
     * @var bool 정렬 시 대소문자 구문 여부 (true, false)
     */
    private bool $ignoreCase;

    /**
     * @var string Null 처리 방식 (NATIVE, NULL_FIRST, NULLS_LAST)
     */
    private string $nullHandling;

    /**
     * @var bool 정렬 방향 ASC 여부 (true, false)
     */
    private bool $ascending;

    /**
     * @var bool 정렬 방향 DESC 여부 (true, false)
     */
    private bool $descending;

    /**
     * 생성자
     * @param string $direction 정렬 방향 (ASC, DESC)
     * @param string $property 정렬 기준 필드명
     * @param bool $ignoreCase 정렬 시 대소문자 구문 여부 (true, false)
     * @param string $nullHandling Null 처리 방식 (NATIVE, NULL_FIRST, NULLS_LAST)
     * @param bool $ascending 정렬 방향 ASC 여부 (true, false)
     * @param bool $descending 정렬 방향 DESC 여부 (true, false)
     */
    public function __construct(string $direction, string $property, bool $ignoreCase, string $nullHandling, bool $ascending, bool $descending)
    {
        $this->direction = $direction;
        $this->property = $property;
        $this->ignoreCase = $ignoreCase;
        $this->nullHandling = $nullHandling;
        $this->ascending = $ascending;
        $this->descending = $descending;
    }

    /**
     * @return string 정렬 방향(ASC, DESC)
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @return string 정렬 기준 필드명
     */
    public function getProperty(): string
    {
        return $this->property;
    }

    /**
     * @return bool 정렬 시 대소문자 구분 여부
     */
    public function isIgnoreCase(): bool
    {
        return $this->ignoreCase;
    }

    /**
     * @return string NULL 처리 방식 (NATIVE, NULLS_FIRST, NULLS_LAST)
     */
    public function getNullHandling(): string
    {
        return $this->nullHandling;
    }

    /**
     * @return bool 정렬 방향 ASC 여부
     */
    public function getAscending(): bool
    {
        return $this->ascending;
    }

    /**
     * @return bool 정렬 방향 DESC 여부
     */
    public function getDescending(): bool
    {
        return $this->descending;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return self
     */
    public static function fromArray($data): self
    {
        return new self($data['direction'], $data['property'], $data['ignoreCase'], $data['nullHandling'], $data['ascending'], $data['descending']);
    }
}

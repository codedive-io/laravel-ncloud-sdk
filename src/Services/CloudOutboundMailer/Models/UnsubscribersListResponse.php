<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 수신 거부 목록 조회 내용
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nesunsubscriberslistcontent
 */
class UnsubscribersListResponse
{
    /**
     * @var string 수신 거부 이메일 주소
     */
    private string $address;

    /**
     * @var NesDateTime 수신 거부 등록 일시
     */
    private NesDateTime $blockDate;

    /**
     * @var bool 관리자가 등록했는지 여부 (true: 관리자 등록, false: 관리자 등록 아님)
     */
    private bool $isRegByManger;

    /**
     * 생성자
     * @param string $address 수신 거부 이메일 주소
     * @param NesDateTime $blockDate 수신 거부 등록 일시
     * @param bool $isRegByManger 관리자가 등록했는지 여부 (true: 관리자 등록, false: 관리자 등록 아님)
     */
    public function __construct(string $address, NesDateTime $blockDate, bool $isRegByManger)
    {
        $this->address = $address;
        $this->blockDate = $blockDate;
        $this->isRegByManger = $isRegByManger;
    }

    /**
     * @return string 수신 거부 이메일 주소
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return NesDateTime 수신 거부 등록 일시
     */
    public function getBlockDate(): NesDateTime
    {
        return $this->blockDate;
    }

    /**
     * @return bool 관리자가 등록했는지 여부 (true: 관리자 등록, false: 관리자 등록 아님)
     */
    public function isRegByManger(): bool
    {
        return $this->isRegByManger;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['address'],
            is_array($data['blockDate']) ? NesDateTime::fromArray($data['blockDate']) : $data['blockDate'],
            (bool)$data['isRegByManager']
        );
    }
}


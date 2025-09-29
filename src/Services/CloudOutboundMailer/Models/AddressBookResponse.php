<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 수신자 그룹 정보
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nesaddressbookresponse
 */
class AddressBookResponse
{
    /**
     * @var int 수신자 그룹 ID
     */
    private int $sid;

    /**
     * @var string 수신자 그룹 이름
     */
    private string $groupName;

    /**
     * @var int 수신자 그룹에 포함된 이메일 주소 개수
     */
    private int $addressCount;

    /**
     * 생성자
     * @param int $sid 수신자 그룹 ID
     * @param string $groupName 수신자 그룹 이름
     * @param int $addressCount 수신자 그룹에 포함된 이메일 주소 개수
     */
    public function __construct(int $sid, string $groupName, int $addressCount)
    {
        $this->sid = $sid;
        $this->groupName = $groupName;
        $this->addressCount = $addressCount;
    }

    /**
     * @return int 수신자 그룹 ID
     */
    public function getSid(): int
    {
        return $this->sid;
    }

    /**
     * @return string 수신자 그룹 이름
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @return int 수신자 그룹에 포함된 이메일 주소 개수
     */
    public function getAddressCount(): int
    {
        return $this->addressCount;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return AddressbookResponse
     */
    public static function fromArray(array $data): AddressBookResponse
    {
        return new self($data['sid'], $data['groupName'], $data['addressCount']);
    }
}

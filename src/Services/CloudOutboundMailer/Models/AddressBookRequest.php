<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

use JsonSerializable;

class AddressBookRequest implements JsonSerializable
{
    /**
     * @var string 수신자 그룹 이름
     */
    private string $groupName;

    /**
     * @var array 이메일 주소 목록
     */
    private array $emailAddresses;

    /**
     * 생성자
     * @param string $groupName 수신자 그룹 이름
     * @param array $emailAddresses 이메일 주소 목록
     */
    public function __construct(string $groupName, array $emailAddresses)
    {
        $this->groupName = $groupName;
        $this->emailAddresses = $emailAddresses;
    }

    /**
     * @return string 수신자 그룹 이름
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @return array 이메일 주소 목록
     */
    public function getEmailAddresses(): array
    {
        return $this->emailAddresses;
    }

    /**
     * @return array JSON_ENCODE 처리를 위한 배열 정보 반환
     */
    public function jsonSerialize(): array
    {
        return [
            'groupName' => $this->groupName,
            'emailAddresses' => $this->emailAddresses,
        ];
    }
}

<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AddressBookResponse;

/**
 * 수신자 그룹과 주소를 입력하여 주소록 생성
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createaddressbook
 */
class CreateAddressBookResponse extends ApiResponse
{
    /**
     * @return int 요청받은 이메일 총 개수
     */
    public function getTotalAddressCount(): int
    {
        return (int)$this->parsed['totalAddressCount'];
    }

    /**
     * @return array<AddressBookResponse>|null 수신자 그룹 목록
     */
    public function getGroups(): ?array
    {
        $parsedGroups = $this->parsed['groups'];

        $groups = [];

        foreach($parsedGroups as $group) {
            $groups[] = AddressBookResponse::fromArray($group);
        }

        return $groups;
    }
}

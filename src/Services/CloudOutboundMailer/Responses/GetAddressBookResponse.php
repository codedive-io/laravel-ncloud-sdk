<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AddressBookResponse;

/**
 * 계정에 보유하고 있는 숫니자 주소록 현황을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getaddressbook
 */
class GetAddressBookResponse extends ApiResponse
{
    /**
     * @return int 총 이메일 주소 개수
     */
    public function getTotalAddressCount(): int
    {
        return (int)$this->parsed['totalAddressCount'];
    }

    /**
     * @return array<AddressBookResponse>|null 수신자 그룹 정보
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

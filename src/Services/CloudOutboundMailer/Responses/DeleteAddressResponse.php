<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AddressBookResponse;

/**
 * 등록된 수신자 이메일 주소를 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteaddress
 */
class DeleteAddressResponse extends ApiResponse
{
    /**
     * @return int 총 이메일 주소 개수
     */
    public function getTotalAddressCount(): int
    {
        return (int)$this->parsed['totalAddressCount'];
    }

    /**
     * @return array|null 수신자 그룹 정보
     */
    public function getGroups(): ?array
    {
        $parsedGroups = $this->parsed['groups'];

        $groups = null;

        if (!empty($parsedGroups)) {
            foreach ($parsedGroups as $group) {
                $groups[] = AddressBookResponse::fromArray($group);
            }
        }

        return $groups;
    }
}

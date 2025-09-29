<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * 계정에 보유하고 있는 수신자 주소록을 전부 삭제하고 초기화
 */
class DeleteAddressBookResponse extends ApiResponse
{
    /**
     * @return int 삭제된 이메일 주소 개수
     */
    public function getDeletedAddressCount(): int
    {
        return (int)$this->parsed['deletedAddressCount'];
    }
}

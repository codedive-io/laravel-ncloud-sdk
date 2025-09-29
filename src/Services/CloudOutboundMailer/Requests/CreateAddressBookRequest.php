<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AddressBookRequest;

/**
 * 수신자 그룹과 주소를 입력하여 주소록을 생성
 */
class CreateAddressBookRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'POST';
        $this->resourcePath('/address-book');
        $this->formAsJson = true;
    }

    /**
     * @param array<AddressBookRequest> $groups 수신자 그룹 목록
     * @return CreateAddressBookRequest
     */
    public function groups(array $groups): CreateAddressBookRequest
    {
        return $this->formParam('groups', $groups);
    }
}


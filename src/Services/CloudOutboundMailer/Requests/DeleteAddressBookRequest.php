<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 계정에 보유하고 있는 수신자 주소록을 전부 삭제하고 초기화
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteaddressbook
 */
class DeleteAddressBookRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
        $this->resourcePath('/address-book');
    }
}

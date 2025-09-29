<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 등록된 수신자 이메일 주소를 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteaddress
 */
class DeleteAddressRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
        $this->resourcePath('/address-book/address');
        $this->formAsJson = true;
    }

    /**
     * @param array $emailAddresses 삭제할 수신자 이메일 주소 목록
     * @return DeleteAddressRequest
     */
    public function emailAddresses(array $emailAddresses): DeleteAddressRequest
    {
        return $this->formParam('emailAddresses', $emailAddresses);
    }
}

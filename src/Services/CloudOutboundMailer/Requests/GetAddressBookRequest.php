<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 게정에 보유하고 있는 수신자 주소록 현황을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getaddressbook
 */
class GetAddressBookRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/address-book');
    }
}

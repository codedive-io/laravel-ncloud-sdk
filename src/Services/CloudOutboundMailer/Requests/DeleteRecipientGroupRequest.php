<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 생성된 수신자 그룹을 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleterecipientgroup
 */
class DeleteRecipientGroupRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
        $this->resourcePath('/address-book/recipient-groups');
    }

    /**
     * @param string $groupName 삭제할 수신자 그룹 이름
     * @return DeleteRecipientGroupRequest
     */
    public function groupName(string $groupName): DeleteRecipientGroupRequest
    {
        return $this->queryParam('groupName', $groupName);
    }
}

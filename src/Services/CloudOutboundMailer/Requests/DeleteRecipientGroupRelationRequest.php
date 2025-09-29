<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 수신자 그룹 안에 등록된 이메일 주소를 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleterecipientgrouprelation
 */
class DeleteRecipientGroupRelationRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
        $this->resourcePath('/address-book/recipient-groups/address');
        $this->formAsJson = true;
    }

    /**
     * @param string $groupName 대상 수신자 그룹
     * @return DeleteRecipientGroupRelationRequest
     */
    public function groupName(string $groupName): DeleteRecipientGroupRelationRequest
    {
        return $this->formParam('groupName', $groupName);
    }

    /**
     * @param array $emailAddresses 삭제할 수신자 이메일 주소 목록
     * @return DeleteRecipientGroupRelationRequest
     */
    public function emailAddresses(array $emailAddresses): DeleteRecipientGroupRelationRequest
    {
        return $this->formParam('emailAddresses', $emailAddresses);
    }
}

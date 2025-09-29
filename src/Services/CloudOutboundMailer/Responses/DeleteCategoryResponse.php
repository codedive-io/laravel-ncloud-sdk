<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * 사용하지 않는 카테고리를 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletecategory
 */
class DeleteCategoryResponse extends ApiResponse
{
    /**
     * @return int 삭제한 카테고리의 SID
     */
    public function getSid(): int
    {
        return (int)$this->parsed['sid'];
    }

    /**
     * @return int 부모 카테고리의 SID
     */
    public function getParentSid(): int
    {
        return (int)$this->parsed['parentSid'];
    }

    /**
     * @return string 삭제한 카테고리의 이름
     */
    public function getName(): string
    {
        return (string)$this->parsed['name'];
    }
}

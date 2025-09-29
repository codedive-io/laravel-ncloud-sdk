<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * 이메일 템플릿을 분류할 수 있는 카테고리를 생성
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createcategory
 */
class CreateCategoryResponse extends ApiResponse
{
    /**
     * @return int 생성한 카테고리의 SID
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
     * @return string 생성한 카테고리의 이름
     */
    public function getName(): string
    {
        return $this->parsed['name'];
    }
}

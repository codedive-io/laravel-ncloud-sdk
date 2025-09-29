<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 이메일 템플릿을 분류할 수 있는 카테고리를 생성
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createcategory
 */
class CreateCategoryRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'POST';
        $this->resourcePath = '/category';
        $this->formAsJson = true;
    }

    /**
     * @param string $categoryName 생성할 카테고리의 이름
     * @return CreateCategoryRequest
     */
    public function categoryName(string $categoryName): CreateCategoryRequest
    {
        return $this->formParam('categoryName', $categoryName);
    }

    /**
     * @param int|null $parentSid 부모 카테고리의 SID
     * @return CreateCategoryRequest
     */
    public function parentSid(?int $parentSid): CreateCategoryRequest
    {
        return $this->formParam('parentSid', $parentSid);
    }
}

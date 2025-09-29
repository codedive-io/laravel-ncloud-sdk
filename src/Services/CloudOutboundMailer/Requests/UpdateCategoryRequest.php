<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 생성한 카테고리의 이름 및 위치를 수정
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatecategory
 */
class UpdateCategoryRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'PUT';
        $this->formAsJson = true;
    }

    /**
     * @param int $categorySid 수정할 카테고리의 SID
     * @return UpdateCategoryRequest
     */
    public function categorySid(int $categorySid): UpdateCategoryRequest
    {
        return $this->resourcePath('/category/'.$categorySid.'/name-location');
    }

    /**
     * @param string|null $categoryName 수정할 카테고리의 이름
     * @return UpdateCategoryRequest
     */
    public function categoryName(?string $categoryName): UpdateCategoryRequest
    {
        return $this->formParam('categoryName', $categoryName);
    }

    /**
     * @param int|null $parentSid 부모 카테고리의 SID
     * @return UpdateCategoryRequest
     */
    public function parentSid(?int $parentSid): UpdateCategoryRequest
    {
        return $this->formParam('parentSid', $parentSid);
    }

    /**
     * @param int|null $lowerSid 하위에 배치할 템플릿 또는 카테고리의 SID
     * @return UpdateCategoryRequest
     */
    public function lowerSid(?int $lowerSid): UpdateCategoryRequest
    {
        return $this->formParam('lowerSid', $lowerSid);
    }
}

<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 사용하지 않는 카테고리를 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletecategory
 */
class DeleteCategoryRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
    }

    /**
     * @param int $categorySid 삭제할 카테고리의 SID
     * @return DeleteCategoryRequest
     */
    public function categorySid(int $categorySid): DeleteCategoryRequest
    {
        return $this->resourcePath('/category/'.$categorySid);
    }
}

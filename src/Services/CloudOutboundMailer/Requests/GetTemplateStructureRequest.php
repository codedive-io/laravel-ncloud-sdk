<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 이메일 템플릿 및 카테고리 구조를 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplatestructure
 */
class GetTemplateStructureRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/template');
    }

    /**
     * @param bool $isUse 사용중인 템플릿 및 카테고리 구조만 조회할지 여부 (true: 사용중만 조회, false: 전체 조회)
     * @return GetTemplateStructureRequest
     */
    public function isUse(bool $isUse = true): GetTemplateStructureRequest
    {
        return $this->queryParam('isUse', $isUse);
    }
}

<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\TemplateStructureResponse;

/**
 * 이메일 템플릿 및 카테고리 구조를 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplatestructure
 */
class GetTemplateStructureResponse extends ApiResponse
{
    /**
     * @return array<TemplateStructureResponse>|null 조회 대상 템플릿 및 카테고리의 상세 구조
     */
    public function getContents(): ?array
    {
        $parsedContent = $this->parsed['contents'];

        $content = [];

        foreach($parsedContent as $contentItem) {
            $content[] = TemplateStructureResponse::fromArray($contentItem);
        }

        return $content;
    }
}

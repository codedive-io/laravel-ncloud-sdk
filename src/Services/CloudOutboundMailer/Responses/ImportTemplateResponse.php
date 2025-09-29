<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\TemplateStructureResponse;

/**
 * 사용자가 JSON 파일 형식으로 작성한 이메일 템플릿을 서비스 환경으로 가져옴
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-importtemplate
 */
class ImportTemplateResponse extends ApiResponse
{
    /**
     * @return array<TemplateStructureResponse>|null 템플릿 구조에 대한 상세 내용
     */
    public function getContents(): ?array
    {
        $parsedContents = $this->parsed['contents'];

        $contents = [];

        foreach($parsedContents as $contentItem) {
            $contents[] = TemplateStructureResponse::fromArray($contentItem);
        }

        return $contents;
    }
}

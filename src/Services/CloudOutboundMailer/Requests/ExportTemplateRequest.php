<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * createTemplateExportRequest API 를 통해 생성한 이메일 템플릿의 백업 파일을 다운로드
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-exporttemplate
 */
class ExportTemplateRequest extends ApiRequest
{
    /**
     * @param int $requestId 백업 파일 생성 요청 SID
     * @return ExportTemplateRequest
     */
    public function requestId(int $requestId): ExportTemplateRequest
    {
        return $this->resourcePath('/template/export/'.$requestId);
    }
}

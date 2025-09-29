<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * 메일 템플릿의 백업 파일을 JSON 형태로 저장
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createtemplateexportrequest
 */
class CreateTemplateExportRequestResponse extends ApiResponse
{
    /**
     * @return int 생성된 백업 파일의 SID
     */
    public function getSid(): int
    {
        return (int)$this->parsed['sid'];
    }
}

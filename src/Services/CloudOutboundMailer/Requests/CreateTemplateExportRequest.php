<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 메일 템플릿의 백업 파일을 JSON 형태로 저장
 * exportTemplate API 를 통해 파일 다운로드
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createtemplateexportrequest
 */
class CreateTemplateExportRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'POST';
        $this->resourcePath('/template/export/request');
    }
}

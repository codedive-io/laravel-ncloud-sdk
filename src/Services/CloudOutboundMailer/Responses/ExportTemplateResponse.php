<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;

/**
 * createTemplateExportRequest API 를 통해 생성한 이메일 템플릿의 백업 파일을 다운로드
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-exporttemplate
 */
class ExportTemplateResponse extends ApiResponse
{
    /**
     * @param string $path 저장 경로
     * @param string|null $filename 저장 파일명
     * @return false|int file_put_contents 처리 결과
     */
    public function save(string $path, ?string $filename = null): false|int
    {
        if (empty($filename)) {
            $disposition = $this->getResponse()->header('Content-Disposition');

            preg_match('/filename="(.+)"/', $disposition, $matches);
            $filename = $matches[1] ?? time().'.json';
        }

        $raw = $this->getResponse()->getBody();

        return file_put_contents($path.'/'.$filename, $raw);
    }
}

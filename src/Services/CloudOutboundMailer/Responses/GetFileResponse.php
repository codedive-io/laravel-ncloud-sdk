<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AttachFile;

/**
 * 사용자가 업로드하여 저장된 파일을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getfile
 */
class GetFileResponse extends ApiResponse
{
    /**
     * @return string 파일 업로드 시 생성된 임시 요청 ID
     */
    public function getTempRequestId(): string
    {
        return $this->parsed['tempRequestId'];
    }

    /**
     * @return array<AttachFile> 업로드 된 파일 목록
     */
    public function getFiles(): array
    {
        $parsedFiles = $this->parsed['files'];

        $files = [];

        foreach($parsedFiles as $fileItem) {
            $files[] = AttachFile::fromArray($fileItem);
        }

        return $files;
    }
}

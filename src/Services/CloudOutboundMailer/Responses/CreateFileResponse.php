<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AttachFile;

/**
 * 이메일 첨부 등의 목적으로 피요한 파일 업로드 응답
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createfile
 */
class CreateFileResponse extends ApiResponse
{
    /**
     * 파일 업로드 시 생성된 임시 요청 ID
     * @return string
     */
    public function getTempRequestId(): string
    {
        return $this->parsed['tempRequestId'];
    }

    /**
     * 업로드한 파일 목록
     * @return array
     */
    public function getFiles(): array
    {
        $parsedFiles = $this->parsed['files'];
        $files = [];

        foreach($parsedFiles as $parsedFileItem) {
            $files[] = AttachFile::fromArray($parsedFileItem);
        }

        return $files;
    }
}

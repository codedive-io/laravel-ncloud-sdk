<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses;

use Codedive\LaravelNcloudSdk\Core\ApiResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AttachFile;

/**
 * 업로드한 파일 중 사용하지 않는 파일을 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletefile
 */
class DeleteFileResponse extends ApiResponse
{
    /**
     * @return string
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
        $parsedGetFiles = $this->parsed['files'];

        $getFiles = [];

        foreach($parsedGetFiles as $fileItem) {
            $getFiles[] = AttachFile::fromArray($fileItem);
        }

        return $getFiles;
    }
}


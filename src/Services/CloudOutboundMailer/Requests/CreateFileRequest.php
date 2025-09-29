<?php declare(strict_types=1);

namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\File;

/**
 * 이메일 첨부 등의 목적으로 필요한 파일을 업로드
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createfile
 */
class CreateFileRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'POST';
        $this->resourcePath = '/files';
        $this->formIsMultipart = true;
    }

    /**
     * 전송할 파일
     * @param File $uploadFile
     * @return $this
     */
    public function fileList(File $uploadFile): CreateFileRequest
    {
        return $this->uploadFile('fileList', $uploadFile);
    }
}

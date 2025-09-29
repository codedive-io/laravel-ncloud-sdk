<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\File;

class ImportTemplateRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'POST';
        $this->resourcePath = '/template/import';
        $this->formIsMultipart = true;
    }

    /**
     * @param File $file 가져올 JSON 파일
     * @return ImportTemplateRequest
     */
    public function file(File $file): ImportTemplateRequest
    {
        return $this->uploadFile('file', $file);
    }
}

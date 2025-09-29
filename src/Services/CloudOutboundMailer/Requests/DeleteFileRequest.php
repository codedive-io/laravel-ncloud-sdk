<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 업로드한 파일 중 사용하지 않는 파일을 삭제
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletefile
 */
class DeleteFileRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'DELETE';
    }

    /**
     * @param string $tempRequestId createFile 실행 후 생성된 임시 요청 ID
     * @return DeleteFileRequest
     */
    public function tempRequestId(string $tempRequestId): DeleteFileRequest
    {
        return $this->resourcePath('/files/'.$tempRequestId);
    }
}

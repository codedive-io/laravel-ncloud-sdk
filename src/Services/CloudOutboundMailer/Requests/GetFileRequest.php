<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 사용자가 업로드하여 저장된 파일을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getfile
 */
class GetFileRequest extends ApiRequest
{
    /**
     * @param string $tempRequestId CreateFile 실행 후 생성된 임시 요청 ID
     * @return GetFileRequest
     */
    public function tempRequestId(string $tempRequestId): GetFileRequest
    {
        return $this->resourcePath('/files/'.$tempRequestId);
    }
}

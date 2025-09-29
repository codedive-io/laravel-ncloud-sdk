<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 이메일 발송 프로젝트별 설정 항목을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getconfig
 */
class GetConfigRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/config');
    }

    /**
     * @param string $type 조회할 설정 항목 (SEND_BLOCK_TIME)
     * @return GetConfigRequest
     */
    public function type(string $type): GetConfigRequest
    {
        return $this->queryParam('type', $type);
    }

    /**
     * @param string|null $subType 해당 설정의 서브 타입 (SEND_BLOCK_TIME 은 null)
     * @return GetConfigRequest
     */
    public function subType(?string $subType): GetConfigRequest
    {
        return $this->queryParam('subType', $subType);
    }
}


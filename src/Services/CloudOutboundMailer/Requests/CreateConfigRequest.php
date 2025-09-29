<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 이메일 발송 프로젝트별 설정 항목을 생성
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createconfig
 */
class CreateConfigRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->method = 'POST';
        $this->resourcePath('/config');
        $this->formAsJson = true;
    }

    /**
     * @param string $type 생성하거나 변경할 설정 항목 (SEND_BLOCK_TIME: 발송 차단 설정)
     * @return CreateConfigRequest
     */
    public function type(string $type): CreateConfigRequest
    {
        return $this->formParam('type', $type);
    }

    /**
     * @param string|null $subType 해당 설정의 서브 타입(SEND_BLOCK_TIME 은 null 입력)
     * @return CreateConfigRequest
     */
    public function subType(?string $subType): CreateConfigRequest
    {
        return $this->formParam('subType', $subType);
    }

    /**
     * @param string $value 생성하거나 변경할 설정 값
     * @return CreateConfigRequest
     */
    public function value(string $value): CreateConfigRequest
    {
        return $this->formParam('value', $value);
    }

    /**
     * @param string $unit 설정 값의 단위 (DAY, HOUR)
     * @return CreateConfigRequest
     */
    public function unit(string $unit): CreateConfigRequest
    {
        return $this->formParam('unit', $unit);
    }
}

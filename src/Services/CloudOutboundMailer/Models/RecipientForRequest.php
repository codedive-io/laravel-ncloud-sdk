<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

use JsonSerializable;

/**
 * 수신자 요청 정보
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nesrecipientrequest
 */
class RecipientForRequest implements JsonSerializable
{
    /**
     * @var string 수신자 이메일 주소
     */
    private string $address;

    /**
     * @var string|null 수신자 이름, 최대 69자
     */
    private ?string $name = null;

    /**
     * @var string|null 수신자 유형 (R: 수신자, C: 참조인, B: 숨은 참조, 기본값은 R)
     */
    private ?string $type = 'R';

    /**
     * @var array|null 치환 파라미터
     */
    private ?array $parameters = [];

    /**
     * 생성자
     * @param string $address 수신자 이메일 주소
     * @param string|null $name 수신자 이름, 최대 69자
     * @param string|null $type 수신자 유형 (R: 수신자, C: 참조인, B: 숨은 참조, 기본값은 R)
     * @param array $parameters 치환 파라미터
     */
    public function __construct(string $address, ?string $name = null, ?string $type = 'R', array $parameters = [])
    {
        $this->address = $address;
        $this->name = $name;
        $this->type = $type;
        $this->parameters = $parameters;
    }

    /**
     * 수신자 이메일 주소 정보 반환
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * 수신자 이름 정보 반환
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * 수신자 유형 정보 반환
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * 치환 파라미터 정보 반환
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return array JSON 형태로 변환하도록 내용 정리하여 반환
     */
    public function jsonSerialize(): array
    {
        return [
            'address' => $this->address,
            'name' => $this->name,
            'type' => $this->type,
            'parameters' => (object) $this->parameters,
        ];
    }
}

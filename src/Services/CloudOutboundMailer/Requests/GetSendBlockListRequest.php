<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 특정 수신자에 대해 시스템에서 자동으로 발송을 차단하는 기본 시간을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getsendblocklist
 */
class GetSendBlockListRequest extends ApiRequest
{
    /**
     * 생성자
     */
    public function __construct()
    {
        $this->resourcePath('/send-block');
    }

    /**
     * @param int|null $size 페이지 당 레코드 개수
     * @return GetSendBlockListRequest
     */
    public function size(?int $size): GetSendBlockListRequest
    {
        return $this->queryParam('size', $size);
    }

    /**
     * @param int|null $page 조회할 페이지 인덱스
     * @return GetSendBlockListRequest
     */
    public function page(?int $page): GetSendBlockListRequest
    {
        return $this->queryParam('page', $page);
    }

    /**
     * @param string|null $sort 정렬 기준
     * @return GetSendBlockListRequest
     */
    public function sort(?string $sort): GetSendBlockListRequest
    {
        return $this->queryParam('sort', $sort);
    }

    /**
     * @param string $targetAddress 발송 차단 내역을 확인할 수신자의 이메일 주소
     * @return GetSendBlockListRequest
     */
    public function targetAddress(string $targetAddress): GetSendBlockListRequest
    {
        return $this->queryParam('targetAddress', $targetAddress);
    }
}


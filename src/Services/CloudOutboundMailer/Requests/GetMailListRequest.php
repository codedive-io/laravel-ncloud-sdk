<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests;

use Codedive\LaravelNcloudSdk\Core\ApiRequest;

/**
 * 발송 요청 ID를 사용하여 특정 발송 요청으로 인해 생성된 이메일 목록을 조회
 * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmaillist
 */
class GetMailListRequest extends ApiRequest
{
    /**
     * 각 요청을 구분하기 위한 이메일 발송 요청 ID
     * @param string $requestId
     * @return $this
     */
    public function requestId(string $requestId): self
    {
        $this->resourcePath = '/mails/requests/'.$requestId.'/mails';
        return $this;
    }

    /**
     * 각 이메일을 식별하기 위한 고유 ID
     * @param string|null $mailId
     * @return self
     */
    public function mailId(?string $mailId): self
    {
        return $this->queryParam('mailId', $mailId);
    }

    /**
     * 수신자 이메일 주소
     * @param string|null $recipientAddress
     * @return self
     */
    public function recipientAddress(?string $recipientAddress): self
    {
        return $this->queryParam('recipientAddress', $recipientAddress);
    }

    /**
     * 이메일 제목 (like 검색 지원)
     * @param string|null $title
     * @return self
     */
    public function title(?string $title): self
    {
        return $this->queryParam('title', $title);
    }

    /**
     * 이메일 발송 상태
     * @param array|null $sendStatus
     * @return self
     */
    public function sendStatus(?array $sendStatus): self
    {
        return $this->queryParam('sendStatus', $sendStatus);
    }

    /**
     * 페이지 당 레코드 수
     * @param int|null $size
     * @return self
     */
    public function size(?int $size): self
    {
        return $this->queryParam('size', $size);
    }

    /**
     * 조회할 페이지 인덱스
     * @param int|null $page
     * @return self
     */
    public function page(?int $page): self
    {
        return $this->queryParam('page', $page);
    }

    /**
     * 정렬 기준
     * @param string|null $sort
     * @return self
     */
    public function sort(?string $sort): self
    {
        return $this->queryParam('sort', $sort);
    }
}

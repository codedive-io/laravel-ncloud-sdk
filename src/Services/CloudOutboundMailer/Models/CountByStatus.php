<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 상태별 메일 건 수
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nescountbystatus
 */
class CountByStatus
{
    /**
     * @var EmailStatus 메일 상태
     */
    private EmailStatus $status;

    /**
     * @var int 메일 건 수
     */
    private int $count;

    /**
     * 생성자
     * @param EmailStatus $status
     * @param int $count
     */
    public function __construct(EmailStatus $status, int $count)
    {
        $this->status = $status;
        $this->count = $count;
    }

    /**
     * @return EmailStatus 메일 상태
     */
    public function getStatus(): EmailStatus
    {
        return $this->status;
    }

    /**
     * @return int 메일 건 수
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return CountByStatus
     */
    public static function fromArray(array $data): CountByStatus
    {
        if (is_array($data['status'])) {
            $status = EmailStatus::fromArray($data['status']);
        } else {
            $status = $data['status'];
        }

        return new self($status, $data['count']);
    }
}

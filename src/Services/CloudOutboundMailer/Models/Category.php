<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 카테고리 정보
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nescategory
 */
class Category
{
    /**
     * @var int 카테고리 SID
     */
    private int $sid;

    /**
     * @var int 부모 카테고리 SID
     */
    private int $parentSid;

    /**
     * @var string 카테고리 이름
     */
    private string $name;

    /**
     * 생성자
     * @param int $sid 카테고리 SID
     * @param int $parentSid 부모 카테고리 SID
     * @param string $name 카테고리 이름
     */
    public function __construct(int $sid, int $parentSid, string $name)
    {
        $this->sid = $sid;
        $this->parentSid = $parentSid;
        $this->name = $name;
    }

    /**
     * @return int 카테고리 SID
     */
    public function getSid(): int
    {
        return $this->sid;
    }

    /**
     * @return int 부모 카테고리 SID
     */
    public function getParentSid(): int
    {
        return $this->parentSid;
    }

    /**
     * @return string 카테고리 이름
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return Category
     */
    public static function fromArray(array $data): Category
    {
        return new Category($data['sid'], $data['parentSid'], $data['name']);
    }
}

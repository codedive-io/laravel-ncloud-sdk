<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

use JsonSerializable;

/**
 * 수신자 그룹 조합 필터
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nesrecipientgroupfilter
 */
class RecipientGroupFilter implements JsonSerializable
{
    /**
     * @var bool AND 조합 여부 (true: AND 조합, false: OR 조합)
     */
    private bool $andFilter;

    /**
     * @var array 수신자 그룹명 목록, 최대 5개
     */
    private array $groups;

    /**
     * 생성자
     * @param bool $andFilter AND 조합 여부 (true: AND 조합, false: OR 조합)
     * @param array $groups 수신자 그룹명 목록, 최대 5개
     */
    public function __construct(bool $andFilter, array $groups)
    {
        $this->andFilter = $andFilter;
        $this->groups = $groups;
    }

    /**
     * AND 조합 여부 정보 반환 (true: AND 조합, false: OR 조합)
     * @return bool
     */
    public function getAndFilter(): bool
    {
        return $this->andFilter;
    }

    /**
     * 수신자 그룹명 목록 반환
     * @return array
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * Json 변환 시 사용
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'andFilter' => $this->andFilter,
            'groups' => $this->groups,
        ];
    }
}

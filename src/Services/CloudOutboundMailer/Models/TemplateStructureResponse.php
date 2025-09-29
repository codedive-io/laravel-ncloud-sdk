<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetTemplateStructureResponse;

/**
 * 템플릿 구조 조회 내용
 * @see https://api.ncloud-docs.com/docs/common-vapidatatype-nestemplatestructurecontent
 */
class TemplateStructureResponse
{
    /**
     * @var int 템플릿 혹은 카테고리의 SID
     */
    private int $sid;

    /**
     * @var int 부모 카테고리의 SID
     */
    private int $parentSid;

    /**
     * @var NesDateTime 생성 시간
     */
    private NesDateTime $createDate;

    /**
     * @var string 템플릿 혹은 카테고리의 이름
     */
    private string $name;

    /**
     * @var bool 카테고리 여부
     */
    private bool $isCategory;

    /**
     * @var bool 사용 여부
     */
    private bool $isUse;

    /**
     * @var array|null 하위 카테고리
     */
    private ?array $subCategories;

    /**
     * @var array|null 하위 템플릿
     */
    private ?array $templates;

    /**
     * 생성자
     * @param int $sid 템플릿 혹은 카테고리의 SID
     * @param int $parentSid 부모 카테고리의 SID
     * @param NesDateTime $createDate 생성 시간
     * @param string $name 템플릿 혹은 카테고리의 이름
     * @param bool $isCategory 카테고리 여부
     * @param bool $isUse 사용 여부
     * @param array|null $subCategories 하위 카테고리
     * @param array|null $templates 하위 템플릿
     * @SuppressWarnings("php:S107")
     */
    public function __construct(int $sid, int $parentSid, NesDateTime $createDate, string $name, bool $isCategory, bool $isUse, ?array $subCategories, ?array $templates)
    {
        $this->sid = $sid;
        $this->parentSid = $parentSid;
        $this->createDate = $createDate;
        $this->name = $name;
        $this->isCategory = $isCategory;
        $this->isUse = $isUse;
        $this->subCategories = $subCategories;
        $this->templates = $templates;
    }

    /**
     * @return int 템플릿 혹은 카테고리의 SID
     */
    public function getSid(): int
    {
        return $this->sid;
    }

    /**
     * @return int 부모 카테고리의 SID
     */
    public function getParentSid(): int
    {
        return $this->parentSid;
    }

    /**
     * @return NesDateTime 생성 시간
     */
    public function getCreateDate(): NesDateTime
    {
        return $this->createDate;
    }

    /**
     * @return string 템플릿 혹은 카테고리의 이름
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool 카테고리 여부
     */
    public function isCategory(): bool
    {
        return $this->isCategory;
    }

    /**
     * @return bool 사용 여부
     */
    public function isUse(): bool
    {
        return $this->isUse;
    }

    /**
     * @return array|null 하위 카테고리
     */
    public function getSubCategories(): ?array
    {
        return $this->subCategories;
    }

    /**
     * @return array|null 하위 템플릿
     */
    public function getTemplates(): ?array
    {
        return $this->templates;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return TemplateStructureResponse
     */
    public static function fromArray(array $data): TemplateStructureResponse
    {
        $createDate = $data['createDate'];
        if (is_array($createDate)) {
            $createDate = NesDateTime::fromArray($createDate);
        }

        $subCategories = $data['subCategories'];
        if (is_array($subCategories)) {
            $objSubCategories = [];

            foreach($subCategories as $subCategory) {
                $objSubCategories[] = TemplateStructureResponse::fromArray($subCategory);
            }

            $subCategories = $objSubCategories;
        }

        $templates = $data['templates'];
        if (is_array($templates)) {
            $objTemplates = [];

            foreach($templates as $template) {
                $objTemplates[] = TemplateStructureResponse::fromArray($template);
            }

            $templates = $objTemplates;
        }

        return new self(
            $data['sid'],
            $data['parentSid'],
            $createDate,
            $data['name'],
            $data['isCategory'],
            $data['isUse'],
            $subCategories,
            $templates
        );
    }
}

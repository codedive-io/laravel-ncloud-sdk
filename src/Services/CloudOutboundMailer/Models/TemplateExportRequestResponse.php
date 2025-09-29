<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 템플릿 백업(JSON) 다운로드 요청 내용
 */
class TemplateExportRequestResponse
{
    /**
     * @var int 템플릿 JSON 생성 요청 ID
     */
    private int $sid;

    /**
     * @var int 사용자 프로젝트 ID
     */
    private int $projectSid;

    /**
     * @var NesDateTime 생성 요청 시간
     */
    private NesDateTime $requestUtc;

    /**
     * @var NesDateTime|null 파일 생성 완료 시간
     */
    private ?NesDateTime $completeUtc;

    /**
     * @var string|null 파일 생성 소요 시간
     */
    private ?string $elapsedTime;

    /**
     * @var TemplateBackupStatus 생성 요청 상태
     */
    private TemplateBackupStatus $statusCode;

    /**
     * @var string|null $downloadUrl 생성한 파일 다운로드 URL
     */
    private ?string $downloadUrl;

    /**
     * 생성자
     * @param int $sid
     * @param int $projectSid
     * @param NesDateTime $requestUtc
     * @param NesDateTime|null $completeUtc
     * @param string|null $elapsedTime
     * @param TemplateBackupStatus|null $statusCode
     * @param string|null $downloadUrl
     */
    public function __construct(int $sid, int $projectSid, NesDateTime $requestUtc, ?NesDateTime $completeUtc, ?string $elapsedTime, ?TemplateBackupStatus $statusCode, ?string $downloadUrl)
    {
        $this->sid = $sid;
        $this->projectSid = $projectSid;
        $this->requestUtc = $requestUtc;
        $this->completeUtc = $completeUtc;
        $this->elapsedTime = $elapsedTime;
        $this->statusCode = $statusCode;
        $this->downloadUrl = $downloadUrl;
    }

    /**
     * @return int 템플릿 JSON 생성 요청 ID
     */
    public function getSid(): int
    {
        return $this->sid;
    }

    /**
     * @return int 사용자 프로젝트 ID
     */
    public function getProjectSid(): int
    {
        return $this->projectSid;
    }

    /**
     * @return NesDateTime 생성 요청 시간
     */
    public function getRequestUtc(): NesDateTime
    {
        return $this->requestUtc;
    }

    /**
     * @return NesDateTime|null 파일 생성 완료 시간
     */
    public function getCompleteUtc(): ?NesDateTime
    {
        return $this->completeUtc;
    }

    /**
     * @return string|null 파일 생성 소요 시간
     */
    public function getElapsedTime(): ?string
    {
        return $this->elapsedTime;
    }

    /**
     * @return TemplateBackupStatus 생성 요청 상태
     */
    public function getStatusCode(): TemplateBackupStatus
    {
        return $this->statusCode;
    }

    /**
     * @return string|null 생성한 파일 다운로드 URL
     */
    public function getDownloadUrl(): ?string
    {
        return $this->downloadUrl;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['sid'],
            $data['projectSid'],
            NesDateTime::fromArray($data['requestUtc']),
            !empty($data['completeUtc']) ? NesDateTime::fromArray($data['completeUtc']) : null,
            $data['elapsedTime'] ?? null,
            TemplateBackupStatus::fromArray($data['statusCode']),
            $data['downloadUrl'] ?? null
        );
    }
}

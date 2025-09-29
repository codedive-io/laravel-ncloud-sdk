<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

class AttachFile
{
    /**
     * @var string 파일 ID
     */
    private string $fileId;

    /**
     * @var string 파일명
     */
    private string $fileName;

    /**
     * @var int 파일 사이즈
     */
    private int $fileSize;

    /**
     * 생성자
     * @param string $fileId
     * @param string $fileName
     * @param int $fileSize
     */
    public function __construct(string $fileId, string $fileName, int $fileSize)
    {
        $this->fileId = $fileId;
        $this->fileName = $fileName;
        $this->fileSize = $fileSize;
    }

    /**
     * @return string 파일 ID
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @return string 파일 명
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return int 파일 사이즈(Byte))
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * 배열을 이용하여 객체 생성
     * @param array $data
     * @return AttachFile
     */
    public static function fromArray(array $data): AttachFile
    {
        return new self($data['fileId'], $data['fileName'], $data['fileSize']);
    }
}

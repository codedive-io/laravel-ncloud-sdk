<?php declare(strict_types=1);

namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models;

/**
 * 파일 업로드 시 업로드할 파일의 정보를 저장하는 Class
 */
class File
{
    /**
     * @var string $filename 업로드 할 파일의 이름
     */
    protected string $filename;

    /**
     * @var string $filepath 업로드 할 파일의 경로
     */
    protected string $filepath;

    /**
     * 생성자
     * @param string $filename
     * @param string $filepath
     */
    public function __construct(string $filename, string $filepath)
    {
        $this->filename = $filename;
        $this->filepath = $filepath;
    }

    /**
     * @return string 파일 이름
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return string 파일 전체 경로
     */
    public function getFilepath(): string
    {
        return $this->filepath;
    }
}

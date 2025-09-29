<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Core;

use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\File;

class ApiRequest
{
    protected string $host = 'https://mail.apigw.ntruss.com';

    protected string $basePath = '/api/v1';

    protected ?string $resourcePath = null;

    protected ?string $method = 'GET';

    protected ?array $queryParams = [];

    protected ?array $formParams = [];

    protected ?array $headers = [];

    protected ?array $uploadFiles = [];

    protected bool $formAsJson = false;

    protected bool $formIsMultipart = false;

    public function resourcePath(string $resourcePath): self
    {
        $this->resourcePath = $resourcePath;
        return $this;
    }

    public function queryParam(string $key, $value = null): self
    {
        if (is_null($value)) {
            unset($this->queryParams[$key]);
        } else {
            $this->queryParams[$key] = $value;
        }

        return $this;
    }

    public function queryParams(array $params): self
    {
        foreach($params as $key => $value) {
            $this->queryParam($key, $value);
        }

        return $this;
    }

    public function formParam(string $key, $value = null): self
    {
        if (is_null($value)) {
            unset($this->formParams[$key]);
        } else {
            $this->formParams[$key] = $value;
        }

        return $this;
    }

    public function formParams(array $formParams): self
    {
        foreach($formParams as $key => $value) {
            $this->formParam($key, $value);
        }

        return $this;
    }

    /**
     * 업로드하려는 파일 정보 저장
     * @param string $key
     * @param File $uploadFile
     * @return $this
     */
    public function uploadFile(string $key, File $uploadFile): self
    {
        $this->uploadFiles[$key] = $uploadFile;
        return $this;
    }

    public function header(string $key, $value = null): self
    {
        if (is_null($value)) {
            unset($this->headers[$key]);
        } else {
            $this->headers[$key] = $value;
        }

        return $this;
    }

    public function headers(array $headers): self
    {
        foreach($headers as $key => $value) {
            $this->header($key, $value);
        }

        return $this;
    }

    public function formAsJson(bool $formAsJson = true): self
    {
        $this->formAsJson = $formAsJson;
        return $this;
    }

    public function formIsMultipart(bool $formIsMultipart = true): self
    {
        $this->formIsMultipart = $formIsMultipart;
        return $this;
    }

    public function getUrl(): string
    {
        $parts = [$this->host, $this->basePath];
        if (!empty($this->resourcePath)) {
            $parts[] = $this->resourcePath;
        }

        return implode('', $parts);
    }

    public function getEndpoint(): string
    {
        $parts = [$this->basePath];
        if (!empty($this->resourcePath)) {
            $parts[] = $this->resourcePath;
        }

        return implode('', $parts);
    }

    public function getEndpointWithQueryString(): string
    {
        $parts = [$this->getEndpoint()];
        if (!empty($this->queryParams)) {
            $parts[] = http_build_query($this->queryParams);
        }

        return implode('?', $parts);
    }

    /**
     * form params 를 가지고 있는지 확인
     * @return bool
     */
    public function hasFormParams(): bool
    {
        return !empty($this->formParams);
    }

    /**
     * form 이 Multipart 인지 확인
     * @return bool
     */
    public function getFormIsMultipart(): bool
    {
        return $this->formIsMultipart === true;
    }

    /**
     * form 이 json 으로 전송해야 하는지 확인
     * @return bool
     */
    public function getFormAsJson(): bool
    {
        return $this->formAsJson === true;
    }

    /**
     * form 으로 전송하는 데이터 반환
     * @return array
     */
    public function getFormParams(): array
    {
        return $this->formParams;
    }

    /**
     * upload file 목록
     * @return array
     */
    public function getUploadFiles(): array
    {
        return $this->uploadFiles;
    }

    public function toArray(): array
    {
        return [
            'host' => $this->host,
            'base_path' => $this->basePath,
            'resource_path' => $this->resourcePath,
            'endpoint' => $this->getEndpoint(),
            'endpoint_with_query_string' => $this->getEndpointWithQueryString(),
            'url' => $this->getUrl(),
            'method' => $this->method,
            'query_params' => $this->queryParams,
            'form_params' => $this->formParams,
            'upload_files' => $this->uploadFiles,
            'headers' => $this->headers,
            'form_as_json' => $this->formAsJson,
            'form_is_multipart' => $this->formIsMultipart,
        ];
    }
}

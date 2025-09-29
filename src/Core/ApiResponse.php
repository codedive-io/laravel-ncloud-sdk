<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Core;

use Illuminate\Http\Client\Response;

class ApiResponse
{
    protected Response $response;

    protected ?array $parsed;

    public function __construct(Response $response)
    {
        $this->response = $response;
        $this->parsed = json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Get Http Status Code
     * @return int
     */
    public function getHttpStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    /**
     * Get Http Response Headers
     * @return array
     */
    public function getHttpHeaders(): array
    {
        return $this->response->getHeaders();
    }

    /**
     * Get Http Body
     * @return string
     */
    public function getBody(): string
    {
        return $this->response->getBody()->getContents();
    }

    /**
     * Response
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * 응답 파싱 데이터 반환
     * @return array|null
     */
    public function getParsed(): ?array
    {
        return $this->parsed;
    }
}

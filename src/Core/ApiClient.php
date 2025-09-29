<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Core;

use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\File;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ApiClient
{
    /**
     * @var array $config
     */
    protected array $config;

    /**
     * 생성자
     * @param array $config Config 정보
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * API 요청을 위한 Signature 생성
     * @param string $method 호출 method
     * @param string $endpointWithQueryString QueryString 이 포함된 endpoint
     * @param int $timestamp 호출 timestamp
     * @return string
     */
    public function makeSignature(string $method, string $endpointWithQueryString, int $timestamp): string
    {
        $space = ' ';
        $newLine = "\n";

        $message = $method . $space . $endpointWithQueryString . $newLine . $timestamp . $newLine . $this->config['access_key'];

        $hash = hash_hmac('sha256', $message, $this->config['secret_key'], true);

        return base64_encode($hash);
    }

    /**
     * Http 통신 실행
     * @param ApiRequest $apiRequest
     * @return Response
     */
    public function call(ApiRequest $apiRequest): Response
    {
        $request = $apiRequest->toArray();

        // API 호출 Signature 생성
        $method = $request['method'];
        $endpointWithQueryString = $request['endpoint_with_query_string'];
        $timestamp = (int) (microtime(true)*1000);

        $signature = $this->makeSignature($method, $endpointWithQueryString, $timestamp);

        // build http request
        $http = Http::withHeaders(array_merge($request['headers'], [
            'x-ncp-apigw-timestamp' => $timestamp,
            'x-ncp-iam-access-key' => $this->config['access_key'],
            'x-ncp-apigw-signature-v2' => $signature,
        ]));

        $http->withQueryParameters($request['query_params']);

        if ($apiRequest->getFormIsMultipart()) {
            $http->asMultipart();

            /**
             * 첨부파일 설정
             * @var string $key
             * @var File $file
             */
            foreach($apiRequest->getUploadFiles() as $key => $file) {
                $http->attach($key, file_get_contents($file->getFilepath()), $file->getFilename());
            }

            $response = $http->$method($apiRequest->getUrl(), $apiRequest->getFormParams());

        } elseif ($apiRequest->getFormAsJson()) {
            $response = $http->asJson()->$method($apiRequest->getUrl(), $apiRequest->getFormParams());

        } else {
            $response = $http->asForm()->$method($apiRequest->getUrl(), $apiRequest->getFormParams());

        }

        return $response;
    }

}

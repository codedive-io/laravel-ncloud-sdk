# Laravel Ncloud SDK

라라벨에서 네이버 클라우드 서비스의 API 를 활용할 수 있는 SDK 입니다.

## 기능

* 네이버 클라우드 API 중 [Cloud Outbound Mailer](https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer) 에 대해서만 제공됩니다.

## 요구사항

다음 환경에서 테스트 되었습니다.

* Laravel 12 이상
* php 8.1 이상

## 설치 방법

```bash
composer require codedive-io/laravel-ncloud-sdk
```

## 사용법

### Config

.env 파일에 다음 정보를 추가

```.dotenv
NCLOUD_ACCESS_KEY="네이버 클라우드의 ACCESS_KEY"
NCLOUD_SECRET_KEY="네이버 클라우드의 SECRET_KEY"
```

또는

```bash
php artisan vendor:publish --tag=laravel_ncloud_sdk_config
```

명령어를 이용하여 ncloud_sdk.php 파일을 생성 후 편집하여 정보 저장

### 메일 발송

[createMailRequest API 문서](https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createmailrequest)를 참고해 주세요.

```php
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\CloudOutboundMailerService;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateMailRequestRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateMailRequestResponse;

$cloudOutboundMailerService = app(CloudOutboundMailerService::class);

$createMailRequestRequest = new CreateMailRequestRequest();
$createMailRequestRequest->senderAddress('noreply@sample.com')
            ->senderName('admin')
            ->templateSid('11111')
            ->individual(true)
            ->recipients([
                new RecipientForRequest('receiver@test.com', 'receiver-name', 'R')
            ])->parameters([
                'verification_code' => '113344',
            ]);

$createMailRequestResponse = $cloudOutboundMailerService->createMailRequest($cloudOutboundMailerService);

if ($createMailRequestResponse->getHttpStatusCode() == 201) {
    echo 'send success!!';
} else {
    echo 'failed!!';
}

```

추가적인 사용법과 지원되는 API 는 소스코드 CloudOutboundMailerService::class 를 참고해주세요.

## Contribution

버그 제보, 기능 제안, 그리고 풀 리퀘스트는 언제나 환영합니다. [Github 저장소](http://github.com/codedive-io/laravel-ncloud-sdk) 를 통해 기여하실 수 있습니다.

Bug reports, feature suggestions, and pull requests are welcome. You can contribute via the [Github Repository](https://github.com/codedive-io/laravel-ncloud-sdk).


## LICENSE

이 패키지는 MIT 라이센스를 준수합니다 [MIT license](LICENSE)

This package is open-sourced software licensed under the [MIT license](LICENSE).
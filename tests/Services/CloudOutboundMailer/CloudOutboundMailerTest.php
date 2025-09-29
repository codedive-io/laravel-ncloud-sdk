<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Tests\Services\CloudOutboundMailer;

use Codedive\LaravelNcloudSdk\LaravelNcloudSdkServiceProvider;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AddressBookRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AddressBookResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\CountByStatus;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\EmailStatus;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\RequestListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\SendBlockHistoryResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Sort;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\TemplateStructureResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\UnsubscribersListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateAddressBookRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateCategoryRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateConfigRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteAddressBookRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteAddressRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteCategoryRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteRecipientGroupRelationRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteRecipientGroupRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteTemplateRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteUnsubscribersRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\ExportTemplateRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetAddressBookRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetConfigRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetSendBlockListRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetTemplateExportRequestListRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\AttachFile;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\Category;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\NesDateTime;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\RecipientForRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\TemplateExportRequestResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Models\File;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\CloudOutboundMailerService;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateFileRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateMailRequestRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateTemplateExportRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\CreateTemplateRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\DeleteFileRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetFileRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetMailListRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetMailRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetMailRequestListRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetMailRequestStatusRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetTemplateRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetTemplateStructureRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\GetUnsubscribersListRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\ImportTemplateRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\RegisterUnsubscribersRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\RestoreTemplateRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\UpdateCategoryRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\UpdateTemplateLocationOrNameRequest;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Requests\UpdateTemplateRequest;
use Codedive\LaravelNcloudSdk\Tests\TestCase;

/**
 * OutboundMailer Test
 */
class CloudOutboundMailerTest extends TestCase
{
    private CloudOutboundMailerService $outboundMailer;

    /**
     * Service Providers 로드
     * @param $app
     * @return \class-string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelNcloudSdkServiceProvider::class,
        ];
    }

    /**
     * 환경변수 설정
     * @param $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        // config 내용에 환경변수 설정
        $app['config']->set('ncloud_sdk', [
            'access_key' => env('NCLOUD_ACCESS_KEY'),
            'secret_key' => env('NCLOUD_SECRET_KEY'),
        ]);
    }

    /**
     * Setup
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->outboundMailer = App(CloudOutboundMailerService::class);
    }

    /**
     * test createMailRequest
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createmailrequest
     */
    public function testCreateMailRequest()
    {
        $senderAddress = env('SENDER_ADDRESS');
        $senderName = env('SENDER_NAME');
        $templateId = env('TEMPLATE_ID');

        $receivers = [[
            'email' => env('RECEIVER_ADDRESS'),
            'name' => env('RECEIVER_NAME'),
            'type' => env('RECEIVER_TYPE'),
        ], [
            'email' => env('RECEIVER_ADDRESS_2'),
            'name' => env('RECEIVER_NAME_2'),
            'type' => env('RECEIVER_TYPE_2'),
        ]];

        $recipients = [];
        foreach($receivers as $receiver) {
            $recipients[] = new RecipientForRequest($receiver['email'], $receiver['name'], $receiver['type']);
        }

        $createMailRequest = new CreateMailRequestRequest();
        $createMailRequest->senderAddress($senderAddress)
            ->senderName($senderName)
            ->templateSid($templateId)
            ->individual(true)
            ->recipients($recipients)
            ->parameters([
                'verification_code' => '113344',
            ]);

        $createMailResponse = $this->outboundMailer->createMailRequest($createMailRequest);

        print_r($createMailResponse->getParsed());

        $this->assertSame(201, $createMailResponse->getHttpStatusCode());
        $this->assertIsString($createMailResponse->getRequestId());
        $this->assertIsInt($createMailResponse->getCount());
        $this->assertTrue($createMailResponse->getCount() == count($recipients));
    }

    /**
     * test GetMail
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmail
     */
    public function testGetMail()
    {
        $mailId = env('MAIL_ID');

        $getMailRequest = new GetMailRequest();
        $getMailRequest->mailId($mailId);

        $getMailResponse = $this->outboundMailer->getMail($getMailRequest);

        print_r($getMailResponse->getParsed());

        $this->assertSame(200, $getMailResponse->getHttpStatusCode());
        $this->assertIsString($getMailResponse->getRequestId());
        $this->assertIsString($getMailResponse->getRequesterIp());
        $this->assertInstanceOf(NesDateTime::class, $getMailResponse->getRequestDate());
        $this->assertIsString($getMailResponse->getMailId());
        $this->assertIsString($getMailResponse->getTitle());
        $templateSid = $getMailResponse->getTemplateSid();
        if (!is_null($templateSid)) {
            $this->assertIsInt($templateSid);
        }
        $this->assertIsString($getMailResponse->getTemplateName());
        $this->assertInstanceOf(EmailStatus::class, $getMailResponse->getEmailStatus());
        $this->assertIsString($getMailResponse->getSenderAddress());
        $senderName = $getMailResponse->getSenderName();
        if (!is_null($senderName)) {
            $this->assertIsString($senderName);
        }
        $sendDate = $getMailResponse->getSendDate();
        if (!is_null($sendDate)) {
            $this->assertInstanceOf(NesDateTime::class, $sendDate);
        }
        $reservationDate = $getMailResponse->getReservationDate();
        if (!is_null($reservationDate)) {
            $this->assertInstanceOf(NesDateTime::class, $reservationDate);
        }
        $this->assertIsString($getMailResponse->getBody());
        $referencesHeader = $getMailResponse->getReferencesHeader();
        if (!is_null($referencesHeader)) {
            $this->assertIsString($referencesHeader);
        }
        $attachFiles = $getMailResponse->getAttachFiles();
        if (!is_null($attachFiles)) {
            $this->assertIsArray($attachFiles);
        }
        $this->assertIsArray($getMailResponse->getRecipients());
        $this->assertIsBool($getMailResponse->getAdvertising());
    }

    /**
     * GetMailList
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmaillist
     */
    public function testGetMailList()
    {
        $requestId = env('REQUEST_ID');

        $getMailListRequest = new GetMailListRequest();
        $getMailListRequest->requestId($requestId);

        $getMailListResponse = $this->outboundMailer->getMailList($getMailListRequest);

        print_r($getMailListResponse->getParsed());

        $this->assertSame(200, $getMailListResponse->getHttpStatusCode());
        $content = $getMailListResponse->getContent();
        if (!empty($content)) {
            $this->assertIsArray($content);
        }
        $this->assertIsBool($getMailListResponse->getLast());
        $this->assertIsInt($getMailListResponse->getTotalElements());
        $this->assertIsInt($getMailListResponse->getTotalPages());
        $this->assertIsBool($getMailListResponse->getFirst());
        $this->assertIsInt($getMailListResponse->getNumberOfElements());
        $sort = $getMailListResponse->getSort();
        $this->assertIsArray($sort);
        foreach($sort as $sortItem) {
            $this->assertInstanceOf(Sort::class, $sortItem);
        }
        $this->assertIsInt($getMailListResponse->getSize());
        $this->assertIsInt($getMailListResponse->getNumber());
    }

    /**
     * GetMailRequestList test
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmailrequestlist
     */
    public function testGetMailRequestList()
    {
        $getMailRequestListRequest = new GetMailRequestListRequest();

        $getMailRequestListResponse = $this->outboundMailer->getMailRequestList($getMailRequestListRequest);

        print_r($getMailRequestListResponse->getParsed());

        $this->assertSame(200, $getMailRequestListResponse->getHttpStatusCode());

        $content = $getMailRequestListResponse->getContent();
        if (!is_null($content)) {
            $this->assertIsArray($content);

            foreach($content as $contentItem) {
                $this->assertInstanceOf(RequestListResponse::class, $contentItem);
            }
        }
        $this->assertIsBool($getMailRequestListResponse->getLast());
        $this->assertIsInt($getMailRequestListResponse->getTotalElements());
        $this->assertIsInt($getMailRequestListResponse->getTotalPages());
        $this->assertIsBool($getMailRequestListResponse->getFirst());
        $this->assertIsInt($getMailRequestListResponse->getNumberOfElements());
        $this->assertIsInt($getMailRequestListResponse->getSize());
        $this->assertIsInt($getMailRequestListResponse->getNumber());
        $sort = $getMailRequestListResponse->getSort();
        $this->assertIsArray($sort);
        foreach($sort as $sortItem) {
            $this->assertInstanceOf(Sort::class, $sortItem);
        }
    }

    /**
     * GetMailRequestStatus test
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmailrequeststatus
     */
    public function testGetMailRequestStatus()
    {
        $requestId = env('REQUEST_ID');

        $getMailRequestStatusRequest = new GetMailRequestStatusRequest();
        $getMailRequestStatusRequest->requestId($requestId);

        $getMailRequestStatusResponse = $this->outboundMailer->getMailRequestStatus($getMailRequestStatusRequest);

        print_r($getMailRequestStatusResponse->getParsed());

        $this->assertSame(200, $getMailRequestStatusResponse->getHttpStatusCode());

        $this->assertIsString($getMailRequestStatusResponse->getRequestId());
        $this->assertIsBool($getMailRequestStatusResponse->getReadyCompleted());
        $this->assertIsBool($getMailRequestStatusResponse->getAllSentSuccess());
        $this->assertIsInt($getMailRequestStatusResponse->getRequestCount());
        $this->assertIsInt($getMailRequestStatusResponse->getSentCount());
        $this->assertIsInt($getMailRequestStatusResponse->getFinishCount());
        $this->assertIsInt($getMailRequestStatusResponse->getReadyCount());
        $reservationDate = $getMailRequestStatusResponse->getReservationDate();
        if (!is_null($reservationDate)) {
            $this->assertInstanceOf(NesDateTime::class, $reservationDate);
        }
        $countByStatus = $getMailRequestStatusResponse->getCountsByStatus();
        $this->assertIsArray($countByStatus);
        foreach($countByStatus as $countByStatusItem) {
            $this->assertInstanceOf(CountByStatus::class, $countByStatusItem);
        }
    }

    /**
     * Test CreateFile
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createfile
     */
    public function testCreateFile()
    {
        $filename = env('ATTACH_FILE_NAME');
        $filepath = __DIR__.env('ATTACH_FILE_PATH');

        $createFileRequest = new CreateFileRequest();
        $createFileRequest->fileList(new File($filename, $filepath));

        $createFileResponse = $this->outboundMailer->createFile($createFileRequest);

        print_r($createFileResponse->getParsed());

        $this->assertSame(201, $createFileResponse->getHttpStatusCode());

        $this->assertIsString($createFileResponse->getTempRequestId());
        $files = $createFileResponse->getFiles();
        $this->assertIsArray($files);
        foreach($files as $fileItem) {
            $this->assertInstanceOf(AttachFile::class, $fileItem);
        }
    }

    /**
     * Test GetFile
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getfile
     */
    public function testGetFile()
    {
        $tempRequestId = env('ATTACH_FILE_TEMP_REQUEST_ID');

        $getFileRequest = new GetFileRequest();
        $getFileRequest->tempRequestId($tempRequestId);

        $getFileResponse = $this->outboundMailer->getFile($getFileRequest);

        print_r($getFileResponse->getParsed());

        $this->assertSame(200, $getFileResponse->getHttpStatusCode());
        $this->assertIsString($getFileResponse->getTempRequestId());
        $this->assertSame($tempRequestId, $getFileResponse->getTempRequestId());

        $getFiles = $getFileResponse->getFiles();

        $this->assertIsArray($getFiles);

        if (!empty($getFiles)) {
            $attachFile = $getFiles[0];

            $this->assertInstanceOf(AttachFile::class, $attachFile);
            $this->assertIsString($attachFile->getFileId());
            $this->assertIsString($attachFile->getFileName());
            $this->assertIsInt($attachFile->getFileSize());
        }
    }

    /**
     * Test DeleteFile
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletefile
     */
    public function testDeleteFile()
    {
        $tempRequestId = env('ATTACH_FILE_TEMP_REQUEST_ID');

        $deleteFileRequest = new DeleteFileRequest();
        $deleteFileRequest->tempRequestId($tempRequestId);

        $deleteFileResponse = $this->outboundMailer->deleteFile($deleteFileRequest);

        print_r($deleteFileResponse->getParsed());

        $this->assertSame(200, $deleteFileResponse->getHttpStatusCode());
        $this->assertIsString($deleteFileResponse->getTempRequestId());
        $this->assertSame($tempRequestId, $deleteFileResponse->getTempRequestId());

        $getFiles = $deleteFileResponse->getFiles();

        $this->assertIsArray($getFiles);

        if (!empty($getFiles)) {
            $attachFile = $getFiles[0];

            $this->assertInstanceOf(AttachFile::class, $attachFile);
            $this->assertIsString($attachFile->getFileId());
            $this->assertIsString($attachFile->getFileName());
            $this->assertIsInt($attachFile->getFileSize());
        }
    }

    /**
     * Test CreateTemplate
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createtemplate
     */
    public function testCreateTemplate()
    {
        $templateName = env('TEMPLATE_NAME');
        $templateDescription = env('TEMPLATE_DESCRIPTION');
        $templateTitle = env('TEMPLATE_TITLE');
        $templateBody = env('TEMPLATE_BODY');
        $templateSenderAddress = env('TEMPLATE_SENDER_ADDRESS');
        $templateSenderName = env('TEMPLATE_SENDER_NAME');

        $createTemplateRequest = new CreateTemplateRequest();
        $createTemplateRequest->templateName($templateName)
            ->description($templateDescription)
            ->title($templateTitle)
            ->body($templateBody)
            ->senderAddress($templateSenderAddress)
            ->senderName($templateSenderName)
            ->isUse(false);

        $createTemplateResponse = $this->outboundMailer->createTemplate($createTemplateRequest);

        print_r($createTemplateResponse->getParsed());

        $this->assertSame(201, $createTemplateResponse->getHttpStatusCode());
        $this->assertIsInt($createTemplateResponse->getSid());
        $this->assertInstanceOf(NesDateTime::class, $createTemplateResponse->getCreateDate());
        $this->assertIsString($createTemplateResponse->getName());
        $this->assertIsString($createTemplateResponse->getDescription());
        $this->assertIsString($createTemplateResponse->getTitle());
        $this->assertIsString($createTemplateResponse->getSenderAddress());
        $this->assertIsString($createTemplateResponse->getSenderName());
        $this->assertIsString($createTemplateResponse->getBody());
        $this->assertIsBool($createTemplateResponse->getIsUse());

        $category = $createTemplateResponse->getCategory();
        if (!empty($category)) {
            $this->assertInstanceOf(Category::class, $createTemplateResponse->getCategory());
        }
    }

    /**
     * Test CreateTemplateExportRequest
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createtemplateexportrequest
     */
    public function testCreateTemplateExportRequest()
    {
        $createTemplateExportRequest = new CreateTemplateExportRequest();

        $createTemplateExportRequestResponse = $this->outboundMailer->createTemplateExportRequest($createTemplateExportRequest);

        print_r($createTemplateExportRequestResponse->getParsed());

        $this->assertSame(200, $createTemplateExportRequestResponse->getHttpStatusCode());
        $this->assertIsInt($createTemplateExportRequestResponse->getSid());
    }

    /**
     * Test getTemplate
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplate
     */
    public function testGetTemplate()
    {
        $templateSid = (int)env('TEMPLATE_SID');

        $getTemplateRequest = new GetTemplateRequest();
        $getTemplateRequest->templateSid($templateSid);

        $getTemplateResponse = $this->outboundMailer->getTemplate($getTemplateRequest);

        print_r($getTemplateResponse->getParsed());

        $this->assertSame(200, $getTemplateResponse->getHttpStatusCode());
        $this->assertIsInt($getTemplateResponse->getSid());
        $this->assertInstanceOf(NesDateTime::class, $getTemplateResponse->getCreateDate());
        $this->assertIsString($getTemplateResponse->getName());
        $description = $getTemplateResponse->getDescription();
        if ($description !== null) {
            $this->assertIsString($description);
        } else {
            $this->assertNull($description);
        }
        $this->assertIsString($getTemplateResponse->getTitle());
        $this->assertIsString($getTemplateResponse->getSenderAddress());
        $senderName = $getTemplateResponse->getSenderName();
        if ($senderName !== null) {
            $this->assertIsString($senderName);
        } else {
            $this->assertNull($senderName);
        }
        $this->assertIsString($getTemplateResponse->getBody());
        $this->assertIsBool($getTemplateResponse->getIsUse());
        $category = $getTemplateResponse->getCategory();
        if ($category !== null) {
            $this->assertInstanceOf(Category::class, $category);
        } else {
            $this->assertNull($category);
        }
    }

    /**
     * Test getTemplateExportRequestList
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplateexportrequestlist
     */
    public function testGetTemplateExportRequestList()
    {
        $getTemplateExportRequestListRequest = new GetTemplateExportRequestListRequest();

        $getTemplateExportRequestListRequest->size(10)->page(0)->sort('sid,statusCode');

        $getTemplateExportRequestListResponse = $this->outboundMailer->getTemplateExportRequestList($getTemplateExportRequestListRequest);

        print_r($getTemplateExportRequestListResponse->getParsed());

        $this->assertSame(200, $getTemplateExportRequestListResponse->getHttpStatusCode());

        $content = $getTemplateExportRequestListResponse->getContent();

        if (!empty($content)) {
            $this->assertIsArray($content);
            $item = $content[0];
            $this->assertInstanceOf(TemplateExportRequestResponse::class, $item);

        } else {
            $this->assertNull($content);

        }

        $this->assertIsInt($getTemplateExportRequestListResponse->getTotalElements());
        $this->assertIsBool($getTemplateExportRequestListResponse->getLast());
        $this->assertIsInt($getTemplateExportRequestListResponse->getTotalPages());
        $this->assertIsInt($getTemplateExportRequestListResponse->getSize());
        $this->assertIsInt($getTemplateExportRequestListResponse->getNumber());
        $sort = $getTemplateExportRequestListResponse->getSort();
        if (!empty($sort)) {
            $this->assertIsArray($sort);
            $this->assertInstanceOf(Sort::class, $sort[0]);

        } else {
            $this->assertNull($sort);
        }
        $this->assertIsBool($getTemplateExportRequestListResponse->getFirst());
        $this->assertIsInt($getTemplateExportRequestListResponse->getNumberOfElements());
    }

    /**
     * Test getTemplateStructure
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-gettemplatestructure
     */
    public function testGetTemplateStructure()
    {
        $getTemplateStructureRequest = new GetTemplateStructureRequest();
        $getTemplateStructureRequest->isUse(true);

        $getTemplateStructureResponse = $this->outboundMailer->getTemplateStructure($getTemplateStructureRequest);

        print_r($getTemplateStructureResponse->getParsed());

        $this->assertSame(200, $getTemplateStructureResponse->getHttpStatusCode());
        $contents = $getTemplateStructureResponse->getContents();

        if (!empty($contents)) {
            $this->assertIsArray($contents);

            foreach($contents as $content) {
                $this->assertInstanceOf(TemplateStructureResponse::class, $content);
            }
        } else {
            $this->assertNull($contents);
        }
    }

    /**
     * Test updateTemplate
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatetemplate
     */
    public function testUpdateTemplate()
    {
        $templateSid = (int)env('TEMPLATE_SID');
        $templateName = env('TEMPLATE_NAME').'-수정';
        $templateDescription = env('TEMPLATE_DESCRIPTION').'-수정';
        $templateTitle = env('TEMPLATE_TITLE').'-수정';
        $templateBody = env('TEMPLATE_BODY').'-수정';
        $templateSenderAddress = env('TEMPLATE_SENDER_ADDRESS');

        $updateTemplateRequest = new UpdateTemplateRequest();
        $updateTemplateRequest->templateSid($templateSid);
        $updateTemplateRequest->templateName($templateName)
            ->description($templateDescription)
            ->title($templateTitle)
            ->body($templateBody)
            ->senderAddress($templateSenderAddress)
            ->isUse(true);

        $updateTemplateResponse = $this->outboundMailer->updateTemplate($updateTemplateRequest);

        print_r($updateTemplateResponse->getParsed());

        $this->assertSame(200, $updateTemplateResponse->getHttpStatusCode());
        $this->assertIsInt($updateTemplateResponse->getSid());
        $this->assertInstanceOf(NesDateTime::class, $updateTemplateResponse->getCreateDate());
        $this->assertIsString($updateTemplateResponse->getName());
        $description = $updateTemplateResponse->getDescription();
        if ($description !== null) {
            $this->assertIsString($description);
        } else {
            $this->assertNull($description);
        }
        $this->assertIsString($updateTemplateResponse->getTitle());
        $this->assertIsString($updateTemplateResponse->getSenderAddress());
        $senderName = $updateTemplateResponse->getSenderName();
        if ($senderName !== null) {
            $this->assertIsString($senderName);
        } else {
            $this->assertNull($senderName);
        }
        $this->assertIsString($updateTemplateResponse->getBody());
        $this->assertIsBool($updateTemplateResponse->getIsUse());
        $category = $updateTemplateResponse->getCategory();
        if ($category !== null) {
            $this->assertInstanceOf(Category::class, $category);
        } else {
            $this->assertNull($category);
        }
    }

    /**
     * Test updateTemplateLocationOrName
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatetemplatelocationorname
     */
    public function testUpdateTemplateLocationOrName()
    {
        $templateSid = (int)env('TEMPLATE_SID');
        $templateName = env('TEMPLATE_NAME').'-수정2';

        $updateTemplateLocationOrNameRequest = new UpdateTemplateLocationOrNameRequest();
        $updateTemplateLocationOrNameRequest->templateSid($templateSid);
        $updateTemplateLocationOrNameRequest->templateName($templateName);

        $updateTemplateLocationOrNameResponse = $this->outboundMailer->updateTemplateLocationOrName($updateTemplateLocationOrNameRequest);

        print_r($updateTemplateLocationOrNameResponse->getParsed());

        $this->assertSame(200, $updateTemplateLocationOrNameResponse->getHttpStatusCode());
        $this->assertIsInt($updateTemplateLocationOrNameResponse->getSid());
        $this->assertInstanceOf(NesDateTime::class, $updateTemplateLocationOrNameResponse->getCreateDate());
        $this->assertIsString($updateTemplateLocationOrNameResponse->getName());
        $description = $updateTemplateLocationOrNameResponse->getDescription();
        if ($description !== null) {
            $this->assertIsString($description);
        } else {
            $this->assertNull($description);
        }
        $this->assertIsString($updateTemplateLocationOrNameResponse->getTitle());
        $this->assertIsString($updateTemplateLocationOrNameResponse->getSenderAddress());
        $senderName = $updateTemplateLocationOrNameResponse->getSenderName();
        if ($senderName !== null) {
            $this->assertIsString($senderName);
        } else {
            $this->assertNull($senderName);
        }
        $this->assertIsString($updateTemplateLocationOrNameResponse->getBody());
        $this->assertIsBool($updateTemplateLocationOrNameResponse->getIsUse());
        $category = $updateTemplateLocationOrNameResponse->getCategory();
        if ($category !== null) {
            $this->assertInstanceOf(Category::class, $category);
        } else {
            $this->assertNull($category);
        }
    }

    /**
     * Test exportTemplate
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-exporttemplate
     */
    public function testExportTemplate()
    {
        $templateExportRequestId = (int)env('TEMPLATE_EXPORT_REQUEST_ID');
        $templateExportFilePath = env('TEMPLATE_EXPORT_FILE_PATH');
        $templateExportFileName = env('TEMPLATE_EXPORT_FILE_NAME');

        $exportTemplateRequest = new ExportTemplateRequest();
        $exportTemplateRequest->requestId($templateExportRequestId);

        $exportTemplateResponse = $this->outboundMailer->exportTemplate($exportTemplateRequest);

        print_r($exportTemplateResponse->getParsed());

        $this->assertSame(200, $exportTemplateResponse->getHttpStatusCode());

        $exportTemplateResponse->save(__DIR__.$templateExportFilePath, $templateExportFileName);
    }

    /**
     * Test importTemplate
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-importtemplate
     */
    public function testImportTemplate()
    {
        $templateImportFileName = env('TEMPLATE_IMPORT_FILE_NAME');
        $templateImportFilePath = env('TEMPLATE_IMPORT_FILE_PATH');

        $importTemplateRequest = new ImportTemplateRequest();
        $importTemplateRequest->file(new File($templateImportFileName, __DIR__.$templateImportFilePath));

        $importTemplateResponse = $this->outboundMailer->importTemplate($importTemplateRequest);

        print_r($importTemplateResponse->getParsed());

        $this->assertSame(201, $importTemplateResponse->getHttpStatusCode());
        $contents = $importTemplateResponse->getContents();
        if (!empty($contents)) {
            $this->assertIsArray($contents);

            foreach($contents as $content) {
                $this->assertInstanceOf(TemplateStructureResponse::class, $content);
            }

        } else {
            $this->assertNull($contents);

        }
    }

    /**
     * Test deleteTemplate
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletetemplate
     */
    public function testDeleteTemplate()
    {
        $deleteTemplateSid = (int)env('TEMPLATE_DELETE_SID');

        $deleteTemplateRequest = new DeleteTemplateRequest();
        $deleteTemplateRequest->templateSid($deleteTemplateSid);

        $deleteTemplateResponse = $this->outboundMailer->deleteTemplate($deleteTemplateRequest);

        print_r($deleteTemplateResponse->getParsed());

        $this->assertSame(200, $deleteTemplateResponse->getHttpStatusCode());

        $this->assertIsInt($deleteTemplateResponse->getSid());
        $this->assertInstanceOf(NesDateTime::class, $deleteTemplateResponse->getCreateDate());
        $this->assertIsString($deleteTemplateResponse->getName());
        $description = $deleteTemplateResponse->getDescription();
        if ($description !== null) {
            $this->assertIsString($description);
        }
        $this->assertIsString($deleteTemplateResponse->getTitle());
        $this->assertIsString($deleteTemplateResponse->getSenderAddress());
        $senderName = $deleteTemplateResponse->getSenderName();
        if ($senderName !== null) {
            $this->assertIsString($senderName);
        }
        $this->assertIsString($deleteTemplateResponse->getBody());
        $this->assertIsBool($deleteTemplateResponse->getIsUse());
        $category = $deleteTemplateResponse->getCategory();
        if ($category !== null) {
            $this->assertInstanceOf(Category::class, $category);
        }
    }

    /**
     * Test restoreTemplate
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-restoretemplate
     */
    public function testRestoreTemplate()
    {
        $templateRestoreSid = (int)env('TEMPLATE_RESTORE_SID');

        $restoreTemplateRequest = new RestoreTemplateRequest();
        $restoreTemplateRequest->templateSid($templateRestoreSid);

        $restoreTemplateResponse = $this->outboundMailer->restoreTemplate($restoreTemplateRequest);

        print_r($restoreTemplateResponse->getParsed());

        $this->assertSame(200, $restoreTemplateResponse->getHttpStatusCode());
        $this->assertIsInt($restoreTemplateResponse->getSid());
        $this->assertInstanceOf(NesDateTime::class, $restoreTemplateResponse->getCreateDate());
        $this->assertIsString($restoreTemplateResponse->getName());
        $description = $restoreTemplateResponse->getDescription();
        if ($description !== null) {
            $this->assertIsString($description);
        }
        $this->assertIsString($restoreTemplateResponse->getTitle());
        $this->assertIsString($restoreTemplateResponse->getSenderAddress());
        $senderName = $restoreTemplateResponse->getSenderName();
        if ($senderName !== null) {
            $this->assertIsString($senderName);
        }
        $this->assertIsString($restoreTemplateResponse->getBody());
        $this->assertIsBool($restoreTemplateResponse->getIsUse());
        $category = $restoreTemplateResponse->getCategory();
        if ($category !== null) {
            $this->assertInstanceOf(Category::class, $category);
        }
    }

    /**
     * Test createCategory
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createcategory
     */
    public function testCreateCategory()
    {
        $categoryName = env('CATEGORY_NAME');

        $createCategoryRequest = new CreateCategoryRequest();
        $createCategoryRequest->categoryName($categoryName);

        $createCategoryResponse = $this->outboundMailer->createCategory($createCategoryRequest);

        print_r($createCategoryResponse->getParsed());

        $this->assertSame(201, $createCategoryResponse->getHttpStatusCode());
        $this->assertIsInt($createCategoryResponse->getSid());
        $this->assertIsInt($createCategoryResponse->getParentSid());
        $this->assertIsString($createCategoryResponse->getName());
    }

    /**
     * Test updateCategory
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatecategory
     */
    public function testUpdateCategory()
    {
        $categoryUpdateSid = (int)env('CATEGORY_UPDATE_SID');
        $categoryUpdateName = env('CATEGORY_UPDATE_NAME');

        $updateCategoryRequest = new UpdateCategoryRequest();
        $updateCategoryRequest->categorySid($categoryUpdateSid);
        $updateCategoryRequest->categoryName($categoryUpdateName);

        $updateCategoryResponse = $this->outboundMailer->updateCategory($updateCategoryRequest);

        print_r($updateCategoryResponse->getParsed());

        $this->assertSame(200, $updateCategoryResponse->getHttpStatusCode());
        $this->assertIsInt($updateCategoryResponse->getSid());
        $this->assertIsInt($updateCategoryResponse->getParentSid());
        $this->assertIsString($updateCategoryResponse->getName());
    }

    /**
     * Test deleteCategory
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletecategory
     */
    public function testDeleteCategory()
    {
        $categoryDeleteSid = (int)env('CATEGORY_DELETE_SID');

        $deleteCategoryRequest = new DeleteCategoryRequest();
        $deleteCategoryRequest->categorySid($categoryDeleteSid);

        $deleteCategoryResponse = $this->outboundMailer->deleteCategory($deleteCategoryRequest);

        print_r($deleteCategoryResponse->getParsed());

        $this->assertSame(200, $deleteCategoryResponse->getHttpStatusCode());
        $this->assertIsInt($deleteCategoryResponse->getSid());
        $this->assertIsInt($deleteCategoryResponse->getParentSid());
        $this->assertIsString($deleteCategoryResponse->getName());
    }

    /**
     * test createAddressBook
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createaddressbook
     */
    public function testCreateAddressBook()
    {
        $addressBookGroupName = env('ADDRESS_BOOK_GROUP_NAME');
        $addressBookEmails = [
            env('ADDRESS_BOOK_EMAIL_1'),  env('ADDRESS_BOOK_EMAIL_2'),
        ];

        $createAddressBookRequest = new CreateAddressBookRequest();
        $createAddressBookRequest->groups([
            new AddressBookRequest($addressBookGroupName, $addressBookEmails),
        ]);

        $createAddressBookResponse = $this->outboundMailer->createAddressBook($createAddressBookRequest);

        print_r($createAddressBookResponse->getParsed());

        $this->assertSame(201, $createAddressBookResponse->getHttpStatusCode());
        $this->assertIsInt($createAddressBookResponse->getTotalAddressCount());
        $groups = $createAddressBookResponse->getGroups();
        if ($groups !== null) {
            $this->assertIsArray($groups);

            foreach($groups as $group) {
                $this->assertInstanceOf(AddressBookResponse::class, $group);
            }
        }
    }

    /**
     * Test getAddressBook
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getaddressbook
     */
    public function testGetAddressBook()
    {
        $getAddressBookRequest = new GetAddressBookRequest();

        $getAddressBookResponse = $this->outboundMailer->getAddressBook($getAddressBookRequest);

        print_r($getAddressBookResponse->getParsed());

        $this->assertSame(200, $getAddressBookResponse->getHttpStatusCode());
        $this->assertIsInt($getAddressBookResponse->getTotalAddressCount());
        $groups = $getAddressBookResponse->getGroups();
        if ($groups !== null) {
            $this->assertIsArray($groups);

            foreach($groups as $group) {
                $this->assertInstanceOf(AddressBookResponse::class, $group);
            }
        }
    }

    /**
     * Test deleteAddressBook
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteaddressbook
     */
    public function testDeleteAddressBook()
    {
        $deleteAddressBookRequest = new DeleteAddressBookRequest();

        $deleteAddressBookResponse = $this->outboundMailer->deleteAddressBook($deleteAddressBookRequest);

        print_r($deleteAddressBookResponse->getParsed());

        $this->assertSame(200, $deleteAddressBookResponse->getHttpStatusCode());
        $this->assertIsInt($deleteAddressBookResponse->getDeletedAddressCount());
    }

    /**
     * Test deleteAddress
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteaddress
     */
    public function testDeleteAddress()
    {
        $addressBookEmails = [
            env('ADDRESS_BOOK_EMAIL_1'), env('ADDRESS_BOOK_EMAIL_2')
        ];

        $deleteAddressRequest = new DeleteAddressRequest();
        $deleteAddressRequest->emailAddresses($addressBookEmails);

        $deleteAddressResponse = $this->outboundMailer->deleteAddress($deleteAddressRequest);

        print_r($deleteAddressResponse->getParsed());

        $this->assertSame(200, $deleteAddressResponse->getHttpStatusCode());
        $this->assertIsInt($deleteAddressResponse->getTotalAddressCount());
        $groups = $deleteAddressResponse->getGroups();
        if ($groups !== null) {
            $this->assertIsArray($groups);
            foreach($groups as $group) {
                $this->assertInstanceOf(AddressBookResponse::class, $group);
            }
        }
    }

    /**
     * Test deleteRecipientGroup
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleterecipientgroup
     */
    public function testDeleteRecipientGroup()
    {
        $addressBookGroupName = env('ADDRESS_BOOK_GROUP_NAME');

        $deleteRecipientGroupRequest = new DeleteRecipientGroupRequest();
        $deleteRecipientGroupRequest->groupName($addressBookGroupName);

        $deleteRecipientGroupResponse = $this->outboundMailer->deleteRecipientGroup($deleteRecipientGroupRequest);

        print_r($deleteRecipientGroupResponse->getParsed());

        $this->assertSame(200, $deleteRecipientGroupResponse->getHttpStatusCode());
        $this->assertIsInt($deleteRecipientGroupResponse->getTotalAddressCount());
        $groups = $deleteRecipientGroupResponse->getGroups();
        if ($groups !== null) {
            $this->assertIsArray($groups);

            foreach($groups as $group) {
                $this->assertInstanceOf(AddressBookResponse::class, $group);
            }
        }
    }

    /**
     * Test deleteRecipientGroupRelation
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleterecipientgrouprelation
     */
    public function testDeleteRecipientGroupRelation()
    {
        $addressBookGroupName = env('ADDRESS_BOOK_GROUP_NAME');
        $addressBookEmails = [
            env('ADDRESS_BOOK_EMAIL_1'), env('ADDRESS_BOOK_EMAIL_2')
        ];

        $deleteRecipientGroupRelationRequest = new DeleteRecipientGroupRelationRequest();
        $deleteRecipientGroupRelationRequest->groupName($addressBookGroupName)
            ->emailAddresses($addressBookEmails);

        $deleteRecipientGroupRelationResponse = $this->outboundMailer->deleteRecipientGroupRelation($deleteRecipientGroupRelationRequest);

        print_r($deleteRecipientGroupRelationResponse->getParsed());

        $this->assertSame(200, $deleteRecipientGroupRelationResponse->getHttpStatusCode());
        $this->assertIsInt($deleteRecipientGroupRelationResponse->getTotalAddressCount());
        $groups = $deleteRecipientGroupRelationResponse->getGroups();
        if ($groups !== null) {
            $this->assertIsArray($groups);

            foreach($groups as $group) {
                $this->assertInstanceOf(AddressBookResponse::class, $group);
            }
        }
    }

    /**
     * test GetSendBlockList
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getsendblocklist
     */
    public function testGetSendBlockList()
    {
        $blockTargetAddress = env('BLOCK_TARGET_ADDRESS');

        $getSendBlockListRequest = new GetSendBlockListRequest();
        $getSendBlockListRequest->size(10)->targetAddress($blockTargetAddress);

        $getSendBlockListResponse = $this->outboundMailer->getSendBlockList($getSendBlockListRequest);

        print_r($getSendBlockListResponse->getParsed());

        $this->assertSame(200, $getSendBlockListResponse->getHttpStatusCode());
        $content = $getSendBlockListResponse->getContent();
        if (!empty($content)) {
            $this->assertIsArray($content);

            foreach($content as $item) {
                $this->assertInstanceOf(SendBlockHistoryResponse::class, $item);
            }
        }
        $this->assertIsString($getSendBlockListResponse->getRegisterStatus());
        $expectedDeleteDate = $getSendBlockListResponse->getExpectedDeleteDate();
        if ($expectedDeleteDate !== null) {
            $this->assertInstanceOf(NesDateTime::class, $getSendBlockListResponse->getExpectedDeleteDate());
        }
        $this->assertIsBool($getSendBlockListResponse->getLast());
        $this->assertIsInt($getSendBlockListResponse->getTotalElements());
        $this->assertIsInt($getSendBlockListResponse->getTotalPages());
        $this->assertIsBool($getSendBlockListResponse->getFirst());
        $this->assertIsInt($getSendBlockListResponse->getNumberOfElements());
        $this->assertIsInt($getSendBlockListResponse->getSize());
        $this->assertIsInt($getSendBlockListResponse->getNumber());

        $sort = $getSendBlockListResponse->getSort();
        $this->assertIsArray($sort);

        foreach($sort as $sortItem) {
            $this->assertInstanceOf(Sort::class, $sortItem);
        }
    }

    /**
     * Test registerUnsubscribers
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-registerunsubscribers
     */
    public function testRegisterUnsubscribers()
    {
        $unsubscriberEmailAddress = [env('UNSUBSCRIBER_EMAIL_ADDRESS')];

        $registerUnsubscribersRequest = new RegisterUnsubscribersRequest();
        $registerUnsubscribersRequest->blockedReceivers($unsubscriberEmailAddress);

        $registerUnsubscribersResponse = $this->outboundMailer->registerUnsubscribers($registerUnsubscribersRequest);

        print_r($registerUnsubscribersResponse->getParsed());

        $this->assertSame(201, $registerUnsubscribersResponse->getHttpStatusCode());
        $this->assertIsInt($registerUnsubscribersResponse->getCount());
        $this->assertIsInt($registerUnsubscribersResponse->getRequestCount());
        $this->assertIsInt($registerUnsubscribersResponse->getIgnoreCount());
    }

    /**
     * Test getUnsubscribersList
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getunsubscriberslist
     */
    public function testGetUnsubscribersList()
    {
        $getUnsubscribersListRequest = new GetUnsubscribersListRequest();
        $getUnsubscribersListRequest->size(10);

        $getUnsubscribersListResponse = $this->outboundMailer->getUnsubscribersList($getUnsubscribersListRequest);

        print_r($getUnsubscribersListResponse->getParsed());

        $this->assertSame(200, $getUnsubscribersListResponse->getHttpStatusCode());
        $content = $getUnsubscribersListResponse->getContent();
        if (!empty($content)) {
            $this->assertIsArray($content);
            foreach($content as $item) {
                $this->assertInstanceOf(UnsubscribersListResponse::class, $item);
            }
        }
        $this->assertIsInt($getUnsubscribersListResponse->getTotalElements());
        $this->assertIsInt($getUnsubscribersListResponse->getTotalPages());
        $this->assertIsBool($getUnsubscribersListResponse->getLast());
        $this->assertIsInt($getUnsubscribersListResponse->getNumberOfElements());
        $this->assertIsBool($getUnsubscribersListResponse->getFirst());
        $sort = $getUnsubscribersListResponse->getSort();
        $this->assertIsArray($sort);
        foreach($sort as $sortItem) {
            $this->assertInstanceOf(Sort::class, $sortItem);
        }
        $this->assertIsInt($getUnsubscribersListResponse->getSize());
        $this->assertIsInt($getUnsubscribersListResponse->getNumber());

    }

    /**
     * Test deleteUnsubscribers
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteunsubscribers
     */
    public function testDeleteUnsubscribers()
    {
        $deleteUnsubscribers = [
            env('UNSUBSCRIBER_EMAIL_ADDRESS'),
        ];

        $deleteUnsubscribersRequest = new DeleteUnsubscribersRequest();
        $deleteUnsubscribersRequest->blockedReceivers($deleteUnsubscribers);

        $deleteUnsubscribersResponse = $this->outboundMailer->deleteUnsubscribers($deleteUnsubscribersRequest);

        print_r($deleteUnsubscribersResponse->getParsed());

        $this->assertSame(200, $deleteUnsubscribersResponse->getHttpStatusCode());
        $this->assertIsInt($deleteUnsubscribersResponse->getCount());
        $this->assertIsInt($deleteUnsubscribersResponse->getRequestCount());
        $this->assertIsInt($deleteUnsubscribersResponse->getIgnoreCount());
    }

    /**
     * Test createConfig
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createconfig
     */
    public function testCreateConfig()
    {
        $createConfigRequest = new CreateConfigRequest();
        $createConfigRequest->type('SEND_BLOCK_TIME')->value('180')->unit('HOUR');

        $createConfigResponse = $this->outboundMailer->createConfig($createConfigRequest);

        print_r($createConfigResponse->getParsed());

        $this->assertSame(200, $createConfigResponse->getHttpStatusCode());
        $this->assertIsString($createConfigResponse->getType());
        $subType = $createConfigResponse->getSubType();
        if ($subType !== null) {
            $this->assertIsString($subType);
        }
        $this->assertIsString($createConfigResponse->getValue());
    }

    /**
     * Test getConfig
     * @return void
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getconfig
     */
    public function testGetConfig()
    {
        $getConfigRequest = new GetConfigRequest();
        $getConfigRequest->type('SEND_BLOCK_TIME');

        $getConfigResponse = $this->outboundMailer->getConfig($getConfigRequest);

        print_r($getConfigResponse->getParsed());

        $this->assertSame(200, $getConfigResponse->getHttpStatusCode());
        $this->assertIsString($getConfigResponse->getType());
        $subType = $getConfigResponse->getSubType();
        if ($subType !== null) {
            $this->assertIsString($subType);
        }
        $this->assertIsString($getConfigResponse->getValue());
    }
}

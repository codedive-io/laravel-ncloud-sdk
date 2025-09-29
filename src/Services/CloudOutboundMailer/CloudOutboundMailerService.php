<?php declare(strict_types=1);
namespace Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer;

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
use Codedive\LaravelNcloudSdk\Core\ApiClient;
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
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateAddressBookResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateCategoryResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateConfigResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\DeleteAddressBookResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\DeleteAddressResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\DeleteCategoryResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\DeleteRecipientGroupResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\DeleteTemplateResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\DeleteUnsubscribersResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\ExportTemplateResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetAddressBookResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetConfigResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetMailRequestListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetSendBlockListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetUnsubscribersListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\ImportTemplateResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\RegisterUnsubscribersResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\RestoreTemplateResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\UpdateCategoryResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\UpdateTemplateLocationOrNameResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateFileResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateMailRequestResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateTemplateExportRequestResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\CreateTemplateResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\DeleteFileResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetFileResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetMailListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetMailRequestStatusResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetMailResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetTemplateExportRequestListResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetTemplateResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\GetTemplateStructureResponse;
use Codedive\LaravelNcloudSdk\Services\CloudOutboundMailer\Responses\UpdateTemplateResponse;

/**
 * Cloud Outbound Mailer Service
 * @SuppressWarnings("php:S1448")
 */
class CloudOutboundMailerService
{
    protected ApiClient $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * CreateMailRequest
     * @param CreateMailRequestRequest $createMailRequest
     * @return CreateMailRequestResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createmailrequest
     */
    public function createMailRequest(CreateMailRequestRequest $createMailRequest): CreateMailRequestResponse
    {
        return new CreateMailRequestResponse($this->apiClient->call($createMailRequest));
    }

    /**
     * GetMail
     * @param GetMailRequest $getMailRequest
     * @return GetMailResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmail
     */
    public function getMail(GetMailRequest $getMailRequest): GetMailResponse
    {
        return new GetMailResponse($this->apiClient->call($getMailRequest));
    }

    /**
     * GetMailList
     * @param GetMailListRequest $getMailListRequest
     * @return GetMailListResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmaillist
     */
    public function getMailList(GetMailListRequest $getMailListRequest): GetMailListResponse
    {
        return new GetMailListResponse($this->apiClient->call($getMailListRequest));
    }

    /**
     * GetMailRequestList
     * @param GetMailRequestListRequest $getMailRequestListRequest
     * @return GetMailRequestListResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmailrequestlist
     */
    public function getMailRequestList(GetMailRequestListRequest $getMailRequestListRequest): GetMailRequestListResponse
    {
        return new GetMailRequestListResponse($this->apiClient->call($getMailRequestListRequest));
    }

    /**
     * GetMailRequestStatus
     * @param GetMailRequestStatusRequest $getMailRequestStatusRequest
     * @return GetMailRequestStatusResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getmailrequeststatus
     */
    public function getMailRequestStatus(GetMailRequestStatusRequest $getMailRequestStatusRequest): GetMailRequestStatusResponse
    {
        return new GetMailRequestStatusResponse($this->apiClient->call($getMailRequestStatusRequest));
    }

    /**
     * CreateFile
     * @param CreateFileRequest $apiRequest
     * @return CreateFileResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createfile
     */
    public function createFile(CreateFileRequest $apiRequest): CreateFileResponse
    {
        return new CreateFileResponse($this->apiClient->call($apiRequest));
    }

    /**
     * GetFile
     * @param GetFileRequest $getFileRequest
     * @return GetFileResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getfile
     */
    public function getFile(GetFileRequest $getFileRequest): GetFileResponse
    {
        return new GetFileResponse($this->apiClient->call($getFileRequest));
    }

    /**
     * DeleteFile
     * @param DeleteFileRequest $deleteFileRequest
     * @return DeleteFileResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletefile
     */
    public function deleteFile(DeleteFileRequest $deleteFileRequest): DeleteFileResponse
    {
        return new DeleteFileResponse($this->apiClient->call($deleteFileRequest));
    }

    /**
     * CreateTemplate
     * @param CreateTemplateRequest $createTemplateRequest
     * @return CreateTemplateResponse
     */
    public function createTemplate(CreateTemplateRequest $createTemplateRequest): CreateTemplateResponse
    {
        return new CreateTemplateResponse($this->apiClient->call($createTemplateRequest));
    }

    /**
     * CreateTemplateExportRequest
     * @param CreateTemplateExportRequest $createTemplateExportRequest
     * @return CreateTemplateExportRequestResponse
     */
    public function createTemplateExportRequest(CreateTemplateExportRequest $createTemplateExportRequest): CreateTemplateExportRequestResponse
    {
        return new CreateTemplateExportRequestResponse($this->apiClient->call($createTemplateExportRequest));
    }

    /**
     * GetTemplate
     * @param GetTemplateRequest $getTemplateRequest
     * @return GetTemplateResponse
     */
    public function getTemplate(GetTemplateRequest $getTemplateRequest): GetTemplateResponse
    {
        return new GetTemplateResponse($this->apiClient->call($getTemplateRequest));
    }

    /**
     * GetTemplateExportRequestList
     * @param GetTemplateExportRequestListRequest $getTemplateExportRequestListRequest
     * @return GetTemplateExportRequestListResponse
     */
    public function getTemplateExportRequestList(GetTemplateExportRequestListRequest $getTemplateExportRequestListRequest): GetTemplateExportRequestListResponse
    {
        return new GetTemplateExportRequestListResponse($this->apiClient->call($getTemplateExportRequestListRequest));
    }

    /**
     * GetTemplateStructure
     * @param GetTemplateStructureRequest $getTemplateStructureRequest
     * @return GetTemplateStructureResponse
     */
    public function getTemplateStructure(GetTemplateStructureRequest $getTemplateStructureRequest): GetTemplateStructureResponse
    {
        return new GetTemplateStructureResponse($this->apiClient->call($getTemplateStructureRequest));
    }

    /**
     * UpdateTemplate
     * @param UpdateTemplateRequest $updateTemplateRequest
     * @return UpdateTemplateResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatetemplate
     */
    public function updateTemplate(UpdateTemplateRequest $updateTemplateRequest): UpdateTemplateResponse
    {
        return new UpdateTemplateResponse($this->apiClient->call($updateTemplateRequest));
    }

    /**
     * UpdateTemplateLocationOrName
     * @param UpdateTemplateLocationOrNameRequest $updateTemplateLocationOrNameRequest
     * @return UpdateTemplateLocationOrNameResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatetemplatelocationorname
     */
    public function updateTemplateLocationOrName(UpdateTemplateLocationOrNameRequest $updateTemplateLocationOrNameRequest): UpdateTemplateLocationOrNameResponse
    {
        return new UpdateTemplateLocationOrNameResponse($this->apiClient->call($updateTemplateLocationOrNameRequest));
    }

    /**
     * ExportTemplate
     * @param ExportTemplateRequest $exportTemplateRequest
     * @return ExportTemplateResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-exporttemplate
     */
    public function exportTemplate(ExportTemplateRequest $exportTemplateRequest): ExportTemplateResponse
    {
        return new ExportTemplateResponse($this->apiClient->call($exportTemplateRequest));
    }

    /**
     * ImportTemplate
     * @param ImportTemplateRequest $importTemplateRequest
     * @return ImportTemplateResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-importtemplate
     */
    public function importTemplate(ImportTemplateRequest $importTemplateRequest): ImportTemplateResponse
    {
        return new ImportTemplateResponse($this->apiClient->call($importTemplateRequest));
    }

    /**
     * DeleteTemplate
     * @param DeleteTemplateRequest $deleteTemplateRequest
     * @return DeleteTemplateResponse
     */
    public function deleteTemplate(DeleteTemplateRequest $deleteTemplateRequest): DeleteTemplateResponse
    {
        return new DeleteTemplateResponse($this->apiClient->call($deleteTemplateRequest));
    }

    /**
     * RestoreTemplate
     * @param RestoreTemplateRequest $restoreTemplateRequest
     * @return RestoreTemplateResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-restoretemplate
     */
    public function restoreTemplate(RestoreTemplateRequest $restoreTemplateRequest): RestoreTemplateResponse
    {
        return new RestoreTemplateResponse($this->apiClient->call($restoreTemplateRequest));
    }

    /**
     * CreateCategory
     * @param CreateCategoryRequest $createCategoryRequest
     * @return CreateCategoryResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createcategory
     */
    public function createCategory(CreateCategoryRequest $createCategoryRequest): CreateCategoryResponse
    {
        return new CreateCategoryResponse($this->apiClient->call($createCategoryRequest));
    }

    /**
     * UpdateCategory
     * @param UpdateCategoryRequest $updateCategoryRequest
     * @return UpdateCategoryResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-updatecategory
     */
    public function updateCategory(UpdateCategoryRequest $updateCategoryRequest): UpdateCategoryResponse
    {
        return new UpdateCategoryResponse($this->apiClient->call($updateCategoryRequest));
    }

    /**
     * DeleteCategory
     * @param DeleteCategoryRequest $deleteCategoryRequest
     * @return DeleteCategoryResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deletecategory
     */
    public function deleteCategory(DeleteCategoryRequest $deleteCategoryRequest): DeleteCategoryResponse
    {
        return new DeleteCategoryResponse($this->apiClient->call($deleteCategoryRequest));
    }

    /**
     * CreateAddressBook
     * @param CreateAddressBookRequest $createAddressBookRequest
     * @return CreateAddressBookResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createaddressbook
     */
    public function createAddressBook(CreateAddressBookRequest $createAddressBookRequest): CreateAddressBookResponse
    {
        return new CreateAddressBookResponse($this->apiClient->call($createAddressBookRequest));
    }

    /**
     * GetAddressBook
     * @param GetAddressBookRequest $getAddressBookRequest
     * @return GetAddressBookResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getaddressbook
     */
    public function getAddressBook(GetAddressBookRequest $getAddressBookRequest): GetAddressBookResponse
    {
        return new GetAddressBookResponse($this->apiClient->call($getAddressBookRequest));
    }

    /**
     * DeleteAddressBook
     * @param DeleteAddressBookRequest $deleteAddressBookRequest
     * @return DeleteAddressBookResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteaddressbook
     */
    public function deleteAddressBook(DeleteAddressBookRequest $deleteAddressBookRequest): DeleteAddressBookResponse
    {
        return new DeleteAddressBookResponse($this->apiClient->call($deleteAddressBookRequest));
    }

    /**
     * DeleteAddress
     * @param DeleteAddressRequest $deleteAddressRequest
     * @return DeleteAddressResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteaddress
     */
    public function deleteAddress(DeleteAddressRequest $deleteAddressRequest): DeleteAddressResponse
    {
        return new DeleteAddressResponse($this->apiClient->call($deleteAddressRequest));
    }

    /**
     * DeleteRecipientGroup
     * @param DeleteRecipientGroupRequest $deleteRecipientGroupRequest
     * @return DeleteRecipientGroupResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleterecipientgroup
     */
    public function deleteRecipientGroup(DeleteRecipientGroupRequest $deleteRecipientGroupRequest): DeleteRecipientGroupResponse
    {
        return new DeleteRecipientGroupResponse($this->apiClient->call($deleteRecipientGroupRequest));
    }

    /**
     * DeleteRecipientGroupRelation
     * @param DeleteRecipientGroupRelationRequest $deleteRecipientGroupRelationRequest
     * @return DeleteRecipientGroupResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleterecipientgrouprelation
     */
    public function deleteRecipientGroupRelation(DeleteRecipientGroupRelationRequest $deleteRecipientGroupRelationRequest): DeleteRecipientGroupResponse
    {
        return new DeleteRecipientGroupResponse($this->apiClient->call($deleteRecipientGroupRelationRequest));
    }

    /**
     * GetSendBlockList
     * @param GetSendBlockListRequest $getSendBlockListRequest
     * @return GetSendBlockListResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getsendblocklist
     */
    public function getSendBlockList(GetSendBlockListRequest $getSendBlockListRequest): GetSendBlockListResponse
    {
        return new GetSendBlockListResponse($this->apiClient->call($getSendBlockListRequest));
    }

    /**
     * RegisterUnsubscribers
     * @param RegisterUnsubscribersRequest $registerUnsubscribersRequest
     * @return RegisterUnsubscribersResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-registerunsubscribers
     */
    public function registerUnsubscribers(RegisterUnsubscribersRequest $registerUnsubscribersRequest): RegisterUnsubscribersResponse
    {
        return new RegisterUnsubscribersResponse($this->apiClient->call($registerUnsubscribersRequest));
    }

    /**
     * GetUnsubscribersList
     * @param GetUnsubscribersListRequest $getUnsubscribersListRequest
     * @return GetUnsubscribersListResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getunsubscriberslist
     */
    public function getUnsubscribersList(GetUnsubscribersListRequest $getUnsubscribersListRequest): GetUnsubscribersListResponse
    {
        return new GetUnsubscribersListResponse($this->apiClient->call($getUnsubscribersListRequest));
    }

    /**
     * DeleteUnsubscribers
     * @param DeleteUnsubscribersRequest $deleteUnsubscribersRequest
     * @return DeleteUnsubscribersResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-deleteunsubscribers
     */
    public function deleteUnsubscribers(DeleteUnsubscribersRequest $deleteUnsubscribersRequest): DeleteUnsubscribersResponse
    {
        return new DeleteUnsubscribersResponse($this->apiClient->call($deleteUnsubscribersRequest));
    }

    /**
     * CreateConfig
     * @param CreateConfigRequest $createConfigRequest
     * @return CreateConfigResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-createconfig
     */
    public function createConfig(CreateConfigRequest $createConfigRequest): CreateConfigResponse
    {
        return new CreateConfigResponse($this->apiClient->call($createConfigRequest));
    }

    /**
     * GetConfig
     * @param GetConfigRequest $getConfigRequest
     * @return GetConfigResponse
     * @see https://api.ncloud-docs.com/docs/ai-application-service-cloudoutboundmailer-getconfig
     */
    public function getConfig(GetConfigRequest $getConfigRequest): GetConfigResponse
    {
        return new GetConfigResponse($this->apiClient->call($getConfigRequest));
    }
}

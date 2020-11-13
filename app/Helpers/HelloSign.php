<?php

namespace App\Helpers;

use App\Lead;
use App\SalesDocumentSigner;
use HelloSign\BaseException;
use HelloSign\Client;
use HelloSign\EmbeddedSignatureRequest;
use HelloSign\SignatureRequest;
use HelloSign\TemplateSignatureRequest;
use Illuminate\Support\Collection;

/**
 * Class HelloSign
 *
 * @package App\Helpers
 */
class HelloSign
{
    const ROLE_CLIENT = 'Client';
    const ROLE_SALES_REP = 'SalesRep';

    /**
     * HelloSign API client
     *
     * @var Client
     */
    public $helloSignClient;

    /**
     * @var TemplateSignatureRequest
     */
    public $helloSignRequest;

    /**
     * @var SignatureRequest
     */
    public $signatureRequest;

    /**
     * @var Lead
     */
    public $lead;

    /**
     * True when our configuration is set to test mode
     *
     * @var bool
     */
    private $inTestMode = false;

    /**
     * True when the PDF file is from Amazon S3
     *
     * @var bool
     */
    public $isUploaded = false;

    /**
     * HelloSign client ID
     *
     * @var null
     */
    private $clientId = null;

    /**
     * HelloSign constructor.
     */
    public function __construct()
    {
        // Build our client
        $this->helloSignClient = new Client(config('services.helloSign.api_key'));

        // Build our default sign request
        $this->helloSignRequest = new TemplateSignatureRequest();
        $this->signatureRequest = new SignatureRequest();

        // Set out client ID
        $this->clientId = config('services.helloSign.client_id');
        $this->helloSignRequest->setClientId($this->clientId);
        $this->signatureRequest->setClientId($this->clientId);

        // Enable test mode
        $this->inTestMode = config('services.helloSign.test_mode');
        if ($this->inTestMode) {
            $this->testMode();
        }
    }

    /**
     * Verifies our integration is authenticated
     *
     * @return bool
     */
    public function authenticated(): bool
    {
        try {
            $this->helloSignClient->getAccount();
        } catch (BaseException $e) {
            return false;
        }

        return true;
    }

    /**
     * Enable test mode on the request
     *
     * @return $this
     */
    public function testMode(): self
    {
        $this->helloSignRequest->enableTestMode();
        $this->signatureRequest->enableTestMode();

        return $this;
    }

    /**
     * True when we are in test mode
     *
     * @return bool
     */
    public function inTestMode(): bool
    {
        return $this->inTestMode;
    }

    /**
     * Returns our client ID
     *
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param Lead $lead
     * @param string|null $signerEmail
     * @return $this
     */
    public function consumeLead(Lead $lead, string $signerEmail = null): self
    {
        $signerEmail = $signerEmail ?? $lead->email;
        $this->lead = $lead;

        if ($this->isUploaded) {
            $this->signatureRequest->addSigner($signerEmail, $lead->user->full_name);
        } else {
            $this->helloSignRequest->setSigner(HelloSign::ROLE_CLIENT, $signerEmail, $lead->full_name);
            $this->helloSignRequest->setCC(HelloSign::ROLE_SALES_REP, $lead->user->email);
            $this->helloSignRequest->addMetadata('lead_id', $lead->id);
            $this->helloSignRequest->addMetadata('full_name', $lead->full_name);
            $this->helloSignRequest->addMetadata('address', $lead->address);
            if (!empty($lead->address_2)) {
                $this->helloSignRequest->addMetadata('address_2', $lead->address_2);
            }
        }

        return $this;
    }

    /**
     * @param SalesDocumentSigner $signer
     * @return $this
     */
    public function consumeDocumentSigner(SalesDocumentSigner $signer): self
    {
        // Set our template ID from our sales doc singer request
        if ($this->isUploaded) {
            $this->signatureRequest->addCC($signer->email);
            $this->signatureRequest->addFileURL(config('filesystems.disks.s3.url').'/signed_documents/'.$signer->template_id.'.pdf');
        }
        else {
            $this->helloSignRequest->setTemplateId($signer->template_id);
        }

        // Set any data we have from our sales document
        if (!empty($signer->salesDocument)) {
            $this->helloSignRequest->setTitle($signer->salesDocument->name);
        }

        return $this;
    }

    /**
     * Fetch a embedded sign request from the HelloSign API
     *
     * @return \HelloSign\SignatureRequest
     * @throws \HelloSign\BaseException
     */
    public function getEmbeddedSignUrl(): SignatureRequest
    {
        // Here we create a embedded signature request and fire a call to the HelloSign API
        $embeddedRequest = $this->isUploaded ? new EmbeddedSignatureRequest($this->signatureRequest) : new EmbeddedSignatureRequest($this->helloSignRequest);

        return $this->helloSignClient->createEmbeddedSignatureRequest($embeddedRequest);
    }

    /**
     * Loops over all templates and returns them as a laravel collection
     *
     * @param int $page
     * @return Collection
     * @throws BaseException
     */
    public function getTemplates(int $page = 1): Collection
    {
        // Holder
        $data = [];

        // Fetch our templates
        $templates = $this->helloSignClient->getTemplates($page);

        // Verify we have data
        if (empty($templates) || $templates->getNumPages() === 0 || empty($templates->toArray())) {
            return collect();
        }

        // Loopback if we are on page one and pull every page we have
        if ($templates->getNumPages() > 1 && $page === 1) {
            for ($x = 1; $x <= $templates->getNumPages(); $x++) {
                $data[] = $this->getTemplates($x);
            }
        }

        return collect(array_merge($data, $templates->toArray()));
    }
}

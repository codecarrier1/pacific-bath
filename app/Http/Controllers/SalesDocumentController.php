<?php

namespace App\Http\Controllers;

use App\Helpers\HelloSign;
use App\Http\Requests\StoreDocumentSignerRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\FileStoreRequest;
use App\Lead;
use App\User;
use App\Payment;
use App\SalesDocument;
use App\SalesDocumentSigner;
use Illuminate\Support\Str;
use Storage;
use Illuminate\Support\Facades\Validator;

/**
 * Class SalesDocumentController
 *
 * @package App\Http\Controllers
 */
class SalesDocumentController extends Controller
{
    /**
     * @param \App\Lead $lead
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function summary(Lead $lead)
    {
        // Fetch our sales documents via eager load
        $salesDocuments = $lead->service->salesDocuments;

        // Grab HelloSign
        $sign = app(HelloSign::class);

        // Group our sales documents by type
        $salesDocuments = $salesDocuments->mapToGroups(function ($item, $key) {
            return [$item['type'] => $item];
        });
        
        $documentsUploaded = [];
        foreach($lead->signedDocuments as $signer) {
            if (isset($signer->salesDocument) && $signer->salesDocument->type === SalesDocument::TYPE_SIGN_REQUIRED) {
                array_push($documentsUploaded, json_decode(json_encode($signer->salesDocument)));
            }
        }

        // Return our view
        return view('sales.docs.summary', [
            'lead' => $lead,
            'salesRep' => json_encode($lead->user),
            'salesDocuments' => $salesDocuments,
            'documentsUploaded' => json_encode($documentsUploaded),
            'signedDocuments' => $lead->signedDocuments,
            'baseStoreSignRoute' => route('sales.documents.store.sign', $lead) . '/',
            'fetchSignerUrl' => route('sales.documents.fetch.sign.url', $lead) . '/',
            'cancelSignUrl' => route('sales.documents.cancel.sign', $lead) . '/',
            'confirmSignUrl' => route('sales.documents.confirm.sign', $lead) . '/',
            'helloSignClientId' => $sign->getClientId(),
            'helloSignTestMode' => json_encode($sign->inTestMode()),
        ]);
    }

    /**
     * @param Lead $lead
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment(Lead $lead)
    {
        // Mock a payment object for vue to not complain
        $mockPayment = new Payment();

        // Attach a fake ID for json encoding in vue
        $mockPayment->id = 0;

        $depositTypes = [];
        $depositTypes[Payment::TYPE_CHECK] = Str::title(Payment::TYPE_CHECK);
        $depositTypes[Payment::TYPE_CREDIT_CARD] = str_replace('_', ' ', Str::title(Payment::TYPE_CREDIT_CARD));


        // Mock our payment object
        $payment = $lead->quote->payment ?? $mockPayment;

        // Return our view
        return view('sales.payment', [
            'lead' => $lead,
            'depositTypes' => json_encode($depositTypes),
            'postAction' => route('sales.payment.post', $lead),
            'payment' => $payment,
        ]);
    }

    /**
     * @param \App\Http\Requests\StorePaymentRequest $request
     * @param \App\Lead $lead
     * @return \Illuminate\Http\JsonResponse
     */
    public function storePayment(StorePaymentRequest $request, Lead $lead)
    {
        // Look for a payment for our quote/lead
        $payment = $lead->quote->payment ?? new Payment();

        $payment->fill($request->validated());

        // Fill with our own data
        $payment->lead_id = $lead->id;
        $payment->quote_id = $lead->quote->id;
        $payment->user_id = auth()->user()->id;
        $payment->deposit = $lead->quote->deposit;
        $payment->discounted_total = $lead->quote->discounted_total;
        $payment->total = $lead->quote->total;

        $payment->save();

        // Let our frontend know it worked
        return response()->json();
    }

    /**
     * Create or update a sales document signing request
     *
     * @param StoreDocumentSignerRequest $request
     * @param Lead $lead
     * @param SalesDocument $salesDocument
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeDocumentSigner(StoreDocumentSignerRequest $request, Lead $lead, SalesDocument $salesDocument)
    {
        // We expect to have a single signed document per lead per document
        $signer = SalesDocumentSigner::whereLeadId($lead->id)
                ->whereSalesDocumentId($salesDocument->id)
                ->whereQuoteId($lead->quote->id)
                ->first() ?? new SalesDocumentSigner();

        $signer->fill($request->validated());

        // Fill with our own data
        $signer->lead_id = $lead->id;
        $signer->quote_id = $lead->quote->id;
        $signer->user_id = $lead->user->id;
        $signer->sales_document_id = $salesDocument->id;
        $signer->template_id = $salesDocument->template_id;
        $signer->document_type = $salesDocument->type;

        $signer->save();

        // Let our frontend know it worked
        return response()->json([
            'signer' => $signer,
            'helloSign'
        ]);
    }

    /**
     * Fetch our HelloSign signature request
     *
     * @param Lead $lead
     * @param SalesDocumentSigner $signer
     * @return \Illuminate\Http\JsonResponse
     * @throws \HelloSign\BaseException
     */
    public function fetchHelloSignRequest(Lead $lead, SalesDocumentSigner $signer)
    {
        $sign = app(HelloSign::class);

        if ($signer->document_type === SalesDocument::TYPE_SIGN_REQUIRED) {
            $sign->isUploaded = true;
        }

        $response = $sign->testMode()->consumeDocumentSigner($signer)->consumeLead($lead, $signer->email)->getEmbeddedSignUrl();

        $signatures = $response->getSignatures()->toArray();
        foreach ($signatures as $index => $signature) {
            if ($signature['signer_email_address'] === $signer->email) {
                $signer->signature_id = $signature['signature_id'];
                $signer->save();

                continue;
            }
        }

        $response = $sign->helloSignClient->getEmbeddedSignUrl($signer->signature_id);

        // Grab our embedded URL
        return response()->json(base64_encode($response->getSignUrl()));
    }

    /**
     * Fetch our HelloSign signature request
     *
     * @param Lead $lead
     * @param SalesDocumentSigner $signer
     * @return \Illuminate\Http\JsonResponse
     * @throws \HelloSign\BaseException
     */
    public function confirmHelloSignRequest(Lead $lead, SalesDocumentSigner $signer)
    {
        $signer->is_signed = true;
        $signer->save();

        // Grab our embedded URL
        return response()->json($signer->salesDocument);
    }

    /**
     * Remove signer request
     *
     * @param Lead $lead
     * @param SalesDocumentSigner $signer
     * @return \Illuminate\Http\JsonResponse
     * @throws \HelloSign\BaseException
     */
    public function cancelHelloSignRequest(Lead $lead, SalesDocumentSigner $signer)
    {
        $signer->salesDocument->delete();
        $signer->delete();

        // Grab our embedded URL
        return response()->json();
    }

    /**
     * Upload PDF files to sign
     *
     * @param Lead $lead
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \HelloSign\BaseException
     */
    public function uploadDocumentForSign(Lead $lead, FileStoreRequest $request)
    {
        $validatedData = $request->validated();

        // ...or just move it somewhere else (eg: local `storage` directory or S3)
        $filePath = Storage::disk('s3')->put('signed_documents', $request->signedDocument);
        $fileName = $request->fileName;
        $fileId = str_replace('.pdf', '', str_replace('signed_documents/', '', $filePath));
        
        $salesDocument = new SalesDocument();
        $salesDocument->template_id = $fileId;
        $salesDocument->title = $fileName;
        $salesDocument->message = 'Requires a sales rep to sign';
        $salesDocument->type = SalesDocument::TYPE_SIGN_REQUIRED;
        $salesDocument->is_active = 1;
        $salesDocument->save();
        
        return $salesDocument;
    }
}

<?php
/**
 * @var \App\Lead $lead
 * @var \App\SalesDocument[] $salesDocuments
 * @var \App\SalesDocumentSigner[] $signedDocuments
 * @var string $baseStoreSignRoute
 * @var string $fetchSignerUrl
 * @var string $helloSignClientId
 * @var bool $helloSignTestMode
 */
?>
@extends('layouts.app')
@section('content')
    @include('partials.main-nav')
    @include('partials.salesdocs-sub-nav')

    <div id="salesdoc-app" class="px-16 flex justify-between pb-10">

        {{-- NCR Form Checklist --}}
        <sale-document-signer
            :documents-uploaded="{{ $documentsUploaded }}"
            :documents="{{ $salesDocuments }}"
            default-email="{{ $lead->email ?? '' }}"
            :signed-documents="{{ $signedDocuments }}"
            base-store-sign-route="{{ $baseStoreSignRoute }}"
            hello-sign-client-id="{{ $helloSignClientId }}"
            :hello-sign-test-mode="{{ $helloSignTestMode }}"
            fetch-signer-url="{{ $fetchSignerUrl }}"
            confirm-sign-url="{{ $confirmSignUrl }}"
            cancel-sign-url="{{ $cancelSignUrl }}"
            :sales-rep="{{ $salesRep }}"
            :lead="{{ $lead }}">
        </sale-document-signer>

        {{-- HOA Information --}}
        <homeowners-contact
            action="{{ route('sales.homeowners.contact.submit', ['lead' => $lead]) }}"
            :existing-contact="{{ json_encode($lead->homeOwnerContact) }}"
        >
        </homeowners-contact>
    </div>

    @include('partials.btm-nav')
@endsection

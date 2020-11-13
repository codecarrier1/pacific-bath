<?php
/**
 * @var \App\Lead $lead
 * @var string $depositTypes
 * @var string $postAction
 */
?>
@extends('layouts.app')

@section('content')
    @include('partials.main-nav')
    @include('partials.salesdocs-sub-nav')

    <div id="salesdoc-app" class="px-16 pb-16 mx-auto pt-4" style="max-width:96rem;">
        <h2 class="text-32 text-gray-333 font-bold text-center mb-8">Payment Information</h2>
        <div class="bg-white box-shadow rounded-lg">
            <div
                class="flex justify-center text-center border-solid border-b border-gray-dcdcdc mb-14 pb-14 pt-16">
                <div class="pr-16 pt-16">
                    <span
                        class="font-light text-blue-0c839b text-54 block leading-tight">${{ number_format($lead->payment->deposit, $decimals = 2) }}</span>
                    <span class="font-bold text-grey-333 text-18 block">Deposit Amount</span>
                </div>
                <div class="pl-16 pt-16 relative">
                    <span
                        class="text-red-d91a1a text-18 line-through absolute top-0 left-0 w-full pl-16 pt-4">${{ number_format($lead->quote->total, $decimals = 2) }}</span>
                    <span
                        class="font-light text-blue-0c839b text-54 block leading-tight">${{ number_format($lead->payment->discounted_total, $decimals = 2) }}</span>
                    <span class="font-bold text-grey-333 text-18 block">Final Amount</span>
                </div>
            </div>

            {{-- Deposit Payment Type --}}
            <payment
                title="Test"
                :deposit-types="{{ $depositTypes }}"
                :payment="{{ $payment }}"
                action="{{ $postAction }}"
            ></payment>
        </div>
    </div>

    @include('partials.btm-nav')

@endsection

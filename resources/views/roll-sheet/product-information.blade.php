<?php
/**
 * @var \App\ProductInformation[] $productInfos
 * @var string[] $productInfoTypes
 * @var string $serviceName
 */
?>
@extends('layouts.app')

@section('content')
    @include('partials.main-nav')
    @include('partials.roll-sheet-sub-nav')

    <div id="rollsheet-app">
        <product-info
            :product-infos="{{ $productInfos }}"
            :product-info-types="{{ $productInfoTypes }}"
            service-name="{{ $serviceName }}"
        ></product-info>
    </div>
    @include('partials.btm-nav')

@endsection

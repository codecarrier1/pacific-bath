@extends('layouts.app')

@section('content')
  @include('partials.main-nav')
  @include('partials.roll-sheet-sub-nav')
 @livewire('payment-options', ['lead' => $lead, 'financingOptions' => $financingOptions])
  @include('partials.btm-nav')

@endsection
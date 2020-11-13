@extends('layouts.app')

@section('content')
  <div id="dash-app" class="px-20 pb-20">
      @include('salesforce')
    <span id="datacharts-loader" style="display:block; width:61px; height:161px; margin:0 auto; padding:50px 0;">@include ('partials/loader')</span>
    <data-charts @loaded="componentLoaded('datacharts')" :url="{{ json_encode($route) }}"></data-charts>

    {{-- Upcoming Projects --}}
    <span id="salesdash1-loader" style="display:block; width:61px; height:161px; margin:0 auto; padding:50px 0;">@include ('partials/loader')</span>
    <sales-dash
        @loaded="componentLoaded('salesdash1')"
        :projects="{{ $upcomingProjects->toJson() }}"
        :title="{{ json_encode($upcomingLabel) }}"
        show-processor-dropdown="{{ json_encode($showProcessorDropdown) }}"
        show-installation-dropdown="{{ json_encode($showInstallationDropdown) }}"
        show-disposition-dropdown="{{ json_encode($showDispositionDropdown)}}"
        dispositions="{{ $statuses['all-dispositions'] }}"
        is-admin="{{ json_encode($isAdmin) }}"
        installation-statuses="{{ $statuses['installation'] }}"
        processor-statuses="{{ $statuses['processor'] }}"
    ></sales-dash>

    {{-- Past Projects --}}
    <span id="salesdash2-loader" style="display:block; width:61px; height:161px; margin:0 auto; padding:50px 0;">@include ('partials/loader')</span>
    <sales-dash
        @loaded="componentLoaded('salesdash2')"
        :projects="{{ $pastProjects->toJson() }}"
        title="Pending Projects"
        show-processor-dropdown="{{ json_encode($showProcessorDropdown) }}"
        show-installation-dropdown="{{ json_encode($showInstallationDropdown) }}"
        show-disposition-dropdown="{{ json_encode($showDispositionDropdown)}}"
        dispositions="{{ $statuses['all-dispositions'] }}"
        is-admin="{{ json_encode($isAdmin) }}"
        installation-statuses="{{ $statuses['installation'] }}"
        processor-statuses="{{ $statuses['processor'] }}"
    ></sales-dash>

    <modal v-if="dispositionModal" @close="dispositionModal = false">
      <div slot="content" class="modalholder">
        <disposition-modal></disposition-modal>
      </div>
    </modal>
  </div>
  @include ('partials/modal')
  <style>
    @-webkit-keyframes rotate {
      from {-webkit-transform: rotate(0deg);}
      to {-webkit-transform: rotate(360deg);}
    }

    @-moz-keyframes rotate {
      from {-moz-transform: rotate(0deg);}
      to {-moz-transform: rotate(360deg);}
    }

    @keyframes rotate {
      from {transform: rotate(0deg);}
      to {transform: rotate(360deg);}
    }
    .svg-spinner{
      -webkit-transition-property: -webkit-transform;
      -webkit-transition-duration: 1.2s;
      -webkit-animation-name: rotate;
      -webkit-animation-iteration-count: infinite;
      -webkit-animation-timing-function: linear;

      -moz-transition-property: -moz-transform;
      -moz-animation-name: rotate;
      -moz-animation-duration: 1.2s;
      -moz-animation-iteration-count: infinite;
      -moz-animation-timing-function: linear;

      transition-property: transform;
      animation-name: rotate;
      animation-duration: 1.2s;
      animation-iteration-count: infinite;
      animation-timing-function: linear;
    }
  </style>
@endsection

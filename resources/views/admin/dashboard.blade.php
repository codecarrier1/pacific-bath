{{-- <h1>This is the sales representative's dashboard.</h1>
<pre>
        {!! json_encode($leads, JSON_PRETTY_PRINT) !!}
</pre> --}}

@extends('layouts.app')

@section('content')
  <div id="dash-app" class="px-20 pb-20">
  @include('salesforce')
    <span id="datacharts-loader" style="display:block; width:61px; height:161px; margin:0 auto; padding:50px 0;">@include ('partials/loader')</span>

    <data-charts @loaded="componentLoaded('datacharts')" :url="{{ json_encode(route('admin.dashboard.charts')) }}"></data-charts>

    <span id="admindash-loader" style="display:block; width:61px; height:61px; margin:50px auto;">@include ('partials/loader')</span>

    <admin-dash @loaded="componentLoaded('admindash')" :sales="{{ json_encode($salesReps) }}" title="{{ now()->format('F') . ' Sales Team Stats:'}}"></admin-dash>
  </div>

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

@extends('layouts.app')

@section('content')
    @include('partials.main-nav')
    @include('partials.build-estimate-sub-nav')


    <div id="buildestimate-app">
        <span id="fixtures-loader" style="display:block; width:61px; height:161px; margin:0 auto; padding:50px 0;">@include ('partials/loader')</span>
        <bath-tub-doors
            :initial-data="{{ json_encode($initialData) }}"
            :quote="{{ $lead->quote->toJson() }}"
            @loaded="componentLoaded('fixtures')"
        ></bath-tub-doors>
    </div>

    @include('partials.btm-nav')

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

@extends('layouts.app')

@section('content')
  @include('partials.main-nav')
  @include('partials.needs-analysis-sub-nav')

  <span id="questions-loader" style="display:block; width:61px; height:161px; margin:0 auto; padding:50px 0;">@include ('partials/loader')</span>
  
  <div id="analysis-app" class="px-20">
    <modal v-if="dispositionModal" @close="dispositionModal = false">
      <div slot="content" class="modalholder">
        <disposition-modal></disposition-modal>
      </div>
    </modal>
    @foreach($questions as $question)

    <questions-section @loaded="componentLoaded('questions')" :id="{{ $question->id }}" question="{{ $loop->index + 1 }}. {{ $question->question }}">
      <div style="max-width:880px">
          <long-text-field text="{{ optional($question->answer)->answer }}" route="{{ route('discovery-question.update', [$question]) }}"></long-text-field>
        </div>
    </questions-section>
      @endforeach
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

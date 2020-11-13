@extends('layouts.app')

@section('content')
  @include('partials.main-nav')
  @include('partials.needs-analysis-sub-nav')

  <span id="questionssection-loader" style="display:block; width:61px; height:161px; margin:0 auto; padding:50px 0;">@include ('partials/loader')</span>
  
  <div id="analysis-app" class="px-20">

    @foreach($questions as $question)
      <questions-section @loaded="componentLoaded('questionssection')" :id="{{ $question->id }}" question="{{ ($loop->index + 1) . '. ' . $question->question }}">
        <div class="{{ $question->type }}">

          <{{ $question->type }}
            @if($question->type === 'multiple-choice')
                  :choices="{{ $question->getChoicesJson($lead) }}"
          @elseif($question->type === 'yesno-choice')
            @if(is_array($question->choices) && count($question->choices) > 1)
              left-text="{{ $question->choices[0]->attributes->choice }}"
              right-text="{{ $question->choices[1]->attributes->choice }}"
              @php $rightChoice = $question->choices[1]->attributes->choice @endphp
              @else
              @php $rightChoice = "No" @endphp
                @endif
              :active-index="{{ (int)(optional($question->answer)->answer === $rightChoice) }}"
              @else
              text="{{ optional($question->answer)->answer }}"
          @endif
                  route="{{ route('job-specification-question.update', [$question]) }}"
                  lead-id={{$lead->id}}
          ></{{ $question->type }}>
        </div>
          @if($question->allow_additional_comments)
             <div class="multiple-choice">
                 <additional-comments
                         @if($question->help_text)
                                 help-text="{{$question->help_text}}"
                                 @endif
                         addcoments="{{ optional($question->answer)->comment }}"
                         lead-id={{$lead->id}}
                                 route="{{ route('job-specification-question.update', [$question]) }}"
                 ></additional-comments>
             </div>
              @endif
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

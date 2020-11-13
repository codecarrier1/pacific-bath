@extends('layouts.app')

@section('content')
  {{-- <h1 class="font-medium text-42">Discovery Questions for {{ $lead->full_name }}</h1>
  @foreach($questions as $question)
  <ul>
      <li><span class="font-bold">{{ $question->question }}</span>
          <ul>
              @foreach($question->choices as $choice)
                  <li>
                      <label>{{ $choice->choice }}</label>
                      <input type="radio" value="1"
                              @if($choice->answer && $choice->choice == $question->answer->answer) checked @endif>
                  </li>
              @endforeach
              <label>Comments:</label><br>
              <textarea>{{ ($question->answer) ? $question->answer->comment : '' }}</textarea>
          </ul>
      </li>
  </ul>
  @endforeach --}}

  <div id="analysis-app" id class="px-20 pb-20">

    <questions-section :id="5" question="1. Multiple choice with comments ligula dolor, at laoreet arcu consequat id?">
      <div style="max-width:880px">

        <multiple-choice :choices="[{ answer: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fringilla volutpat massa ac dictum.', state: false}, { answer: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fringilla volutpat massa ac dictum.', state: true}, { answer: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fringilla volutpat massa ac dictum.', state: false}]"></multiple-choice>

        <additional-comments addcoments="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fringilla volutpat massa ac dictum. Nullam vestibulum, metus eu tincidunt imperdiet, tellus ante facilisis quam, in pulvinar ex erat eget enim. Quisque ultrices"></additional-comments>
      </div>
    </questions-section>

    <questions-section :id="1" question="2. Multiple choice shorter ligula dolor, at laoreet arcu consequat id?">
      <div style="max-width:430px">

        <multiple-choice :choices="[{ answer: 'Lorem ipsum dolor', state: false}, { answer: 'Lorem ipsum dolor', state: true}, { answer: 'Lorem ipsum dolor', state: false}]"></multiple-choice>

      </div>
    </questions-section>

    <questions-section :id="4" question="3. Yes or no ligula dolor, at laoreet arcu consequat id?">

      <yesno-choice></yesno-choice>

    </questions-section>

    <questions-section :id="5555" question="4. Yes or no ligula dolor, at laoreet arcu consequat id?">

      <yesno-choice left-text="Yesterday" right-text="Tomorrow" active-index="1"></yesno-choice>

    </questions-section>

    <questions-section :id="777" question="4. Yes or no ligula dolor, at laoreet arcu consequat id?">
      <div style="max-width:125px">
    
        <text-field text="1234"></text-field>

      </div>
    </questions-section>

    <questions-section :id="343777" question="5. Long field answer text box expands if needed ligula dolor, at laoreet arcu consequat id?">
      <div style="max-width:875px">
    
        <long-text-field text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fringilla volutpat massa ac dictum. Nullam vestibulum, metus eu tincidunt imperdiet, tellus ante facilisis quam, in pulvinar ex erat eget enim. Quisque ultrices ligula dolor, at laoreet arcu consequat id. Nulla facilisi. Fusce aliquam, nulla at consectetur lacinia, nibh tortor elementum odio, sodales blandit massa leo eu dui. Quisque fringilla erat vitae enim pulvinar pretium."></long-text-field>

      </div>
    </questions-section>

  </div>
@endsection

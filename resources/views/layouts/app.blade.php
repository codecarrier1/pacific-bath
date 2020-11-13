<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include ('partials/head')
<body class="bg-gray-fafafa text-16 text-999 leading-normal font-sans text-primary">
@include ('partials/header')

@yield('content')

@include ('partials.modal')

@prepend('scripts')
  @isset($lead)
      <script>
        {{--  Intentionally using var here to put them in global scope --}}
        var currentLeadId = {{ $lead->id }};
        var selectedDisposition = {{ $lead->sales_disposition_id }}
        var currentUserIsAdmin = @if(auth()->user()->hasRole('Administrator')) true @else false @endif
      </script>
  @endisset
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    @if (app()->environment('local'))
        <script src="{{ mix('js/app.js') }}"></script>
    @else
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif

@endprepend
@stack('scripts')
@livewireScripts
</body>
</html>

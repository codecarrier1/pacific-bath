<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pacific Bath">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest')}}">
  <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg')}}" 
  color="#5bbad5">
  <title>Pacific Bath</title>
  <!-- Styles -->
  @if (app()->environment('local'))
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @endif
  @livewireStyles
</head>
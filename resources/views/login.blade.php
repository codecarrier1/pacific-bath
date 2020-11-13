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
  <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
  <title>Pacific Bath</title>
  <!-- Styles -->
  <link href="{{ mix('css/login.css') }}" rel="stylesheet">
</head>
<body>
  <div id="container">
    <div id="rside">
      <div class="login-holder">
        <h1><img src="{{ asset('images/login-logo.png') }}" alt="Pacific Bath" width="384" height="81"></h1>
        <div class="holder">
          <p class="date"></p>
          <h2 id="greeting"></h2>
          <h3>Login with your Google account below:</h3>
          <a id="google-login" dusk="login" href="{{ route('google.login') }}"><i></i> Login with Google</a>
        </div>
      </div>
      <div class="footer">
        <strong class="logo"><img src="{{ asset('images/login-logo-kohler.png') }}" alt="Kohler" width="174" height="37"></strong>
        <p>&copy; {{ date("Y") }} Pacific Bath Company <span class="separator">|</span> v1.0.1</p>
      </div>
    </div>
    <span id="lside"></span>
  </div>
  <script>
      var myDate = new Date();
      var options = { year: 'numeric', month: 'long', day: 'numeric' };
      var hrs = myDate.getHours();
      var greet;
      if (hrs < 12){
          greet = 'Good Morning';
      }
      else if (hrs >= 12 && hrs <= 17) {
          greet = 'Good Afternoon';
      }
      else if (hrs >= 17 && hrs <= 24) {
          greet = 'Good Evening';
      }
      document.getElementById('greeting').innerText = greet;
      document.querySelector('p.date').innerText = myDate.toLocaleDateString("en-US", options);
  </script>
</body>
</html>

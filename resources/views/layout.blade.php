<!doctype html>
  <html lang="{{ app()->getLocale() }}">
      <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- CSRF Token -->
			<meta name="csrf-token" content="{{ csrf_token() }}">

			<title>{{ config('app.name', 'Laravel') }}</title>

			<!-- Scripts -->
			<script src="{{ asset('js/app.js') }}" defer></script>

			<!-- Fonts -->
			<link rel="dns-prefetch" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

			<!-- Styles -->
			<link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



      </head>
      <body>
    @include('inc.request')
    @include('inc.topNav')
     @yield('content')
      </body>
  </html>

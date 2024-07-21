@extends('client.layouts.app')

@section('content')
  <body>
      <div id="app"></div>
      <script src="https://telegram.org/js/telegram-web-app.js"></script>
      <script>
        window.Telegram.WebApp.ready();
      </script>
  </body>
@endsection
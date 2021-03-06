<?php 
use App\User;
$user_id = auth()->user()->id;
$user = User::find($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  

  <link rel="stylesheet" href="/quill/dist/quill.snow.css">
  <link rel="stylesheet" href="/css/app.css">
  <title>{{ config('app.name', 'RP Admin') }}</title>
</head>
<body class="{{ $user->theme }}-theme" >
  <div id="app">
    @include('partials.sidenav')
    @include('partials.topnav')
    @include('partials.rightbar')

    <div class="mt-5 mb-5 pt-3 pl-3 pr-3 section-@yield('class')">
      <div class="row">
        <div class="col-md-8 col-lg-9 mb-3">
            @include('partials/messages')
            @yield('content')
        </div>
        <div class="col-md-4 col-lg-3">
          {!! $user->side_notes !!}
        </div>
      </div>
    </div>

    
  </div>

  @include('partials.footer')


  <script src="/js/app.js"></script>
  <script src="/tinymce/tinymce.min.js"></script>
  <script>
    var mcePlugins = "autolink autosave link image lists hr table textcolor  code";
    var mceButtons = "formatselect forecolor backcolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | link unlink image | bullist numlist table code";
    var mceCSS = "/css/tinymce.css";
  </script>
  @yield('contentjs')
  
</body>
</html>
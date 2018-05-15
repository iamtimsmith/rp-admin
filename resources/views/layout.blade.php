<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link rel="stylesheet" href="/css/app.css">
  <title>Laravel</title>
</head>
<body>
  <div id="app">
    {{--@include('partials.navbar')--}}
    @include('partials.sidenav')
    @include('partials.topnav')
    @include('partials.rightbar')

    <div class="mt-5 mb-5 pt-3 pl-3 pr-3 section-@yield('class')">
      @include('partials/messages')
      @yield('content')
    </div>

    
  </div>

  <script src="/js/app.js"></script>
  <script src="/laravel-ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'article-ckeditor' );
  </script>

  
</body>
</html>
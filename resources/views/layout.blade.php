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
    @include('partials.navbar')

    <div class="container mt-5 pt-5 pb-5 section-@yield('class')">
      @yield('content')
    </div>

    
  </div>

  <script src="/js/app.js"></script>
</body>
</html>
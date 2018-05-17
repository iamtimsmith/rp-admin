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
    {{--@include('partials.navbar')--}}
    @include('partials.sidenav')
    @include('partials.topnav')
    @include('partials.rightbar')

    <div class="mt-5 mb-5 pt-3 pl-3 pr-3 section-@yield('class')">
      <div class="row">
        <div class="col-sm-9">
            @include('partials/messages')
            @yield('content')
        </div>
        <div class="col-sm-3">
          {!! $user->side_notes !!}
        </div>
      </div>
    </div>

    
  </div>

  @include('partials.footer')


  <script src="/js/app.js"></script>
  <script src="/quill/dist/quill.min.js"></script>
  <script>
  var toolbarOptions = [
  [{ 'size': ['huge', 'large', false, 'small'] }], 
  [{ 'font': [] }],
  [{ 'color': [] }, { 'background': [] }],        
  ['bold', 'italic', 'underline', 'strike'],  
  [{ 'align': [] }],
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  ['link'],
  ['image'],
  ['blockquote', 'code-block'],
  ['clean']                     // remove formatting button
  ];
  </script>
  @yield('contentjs')
  
</body>
</html>
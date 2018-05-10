@extends('layout')
@section('class','monsters')

@section('content')
<div class="row justify-content-center">
  <div class="col-8">
      <h1>Monsters</h1>
  
      <search></search>
      @if(count($monsters) > 0)
      <p class="mt-4 mb-0"><span>Name</span><span class="float-right">CR</span></p>
      <ul id="list" style="list-style:none; padding:0;">
        @foreach($monsters as $monster)
      <li><a href="/monsters/{{ $monster->id }}"><span>{{ $monster->name }}</span><span class="float-right">{{ $monster->challenge_rating }}</span></a></li>
        @endforeach
      </ul>
      @endif
  </div>
</div>

@endsection
@extends('layout')
@section('class','monsters')

@section('content')
      <h1>Monsters</h1>
  
      <search></search>
      @if(count($monsters) > 0)
      <p class="mt-4 mb-0"><strong><span>Name</span><span class="float-right">CR</span></strong></p>
      <ul id="list" style="list-style:none; padding:0;">
        @foreach($monsters as $monster)
      <li>
          {{--<a href="/monsters/{{ $monster->id }}">{{ $monster->name }}</a>--}}
        <a href="/monsters/{{ $monster->id }}"><span>{{ $monster->name }}</span><span class="float-right">{{ $monster->challenge_rating }}</span></a>
      </li>
        @endforeach
      </ul>
      @endif

      <hr class="mt-5">
      <p>This is SRD material and falls under the <a href="/license">OGL License</a>.</p>
@endsection
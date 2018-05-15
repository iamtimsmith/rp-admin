@extends('layout')
@section('class', 'spells')

@section('content')

        <h1>Spells</h1>
    
        <search></search>
        @if(count($spells) > 0)
        <p class="mt-4 mb-0"><span>Name</span><span class="float-right">Level</span></p>
        <ul id="list" style="list-style:none; padding:0;">
          @foreach($spells as $spell)
        <li><a href="/spells/{{ $spell->id }}"><span>{{ $spell->name }}</span><span class="float-right">{{ $spell->level }}</span></a></li>
          @endforeach
        </ul>
        @endif
  

@endsection
@extends('layout')
@section('class', 'spells')

@section('content')

<div class="d-flex">
    <h1 class=" header">Spells</h1>
  </div>
  <div class="card">
    <div class="card-body">
  
  @if(count($spells) > 0)
  <sort-items :items="{{ json_encode($spells) }}" section="spells" :columns="['name', 'class', 'level']" />
  @endif
  
  </div>
  </div>

  <hr class="mt-5">
  <p>This is SRD material and falls under the <a href="/license">OGL License</a>.</p>

@endsection
@extends('layout')
@section('class','monsters')

@section('content')

<div class="d-flex">
    <h1 class=" header">Monsters</h1>
  </div>
  <div class="card">
    <div class="card-body">
  
  @if(count($monsters) > 0)
  <sort-items :items="{{ json_encode($monsters) }}" section="monsters" :columns="['name', 'cr']" />
  @endif
  
  </div>
  </div>

  <hr class="mt-5">
  <p>This is SRD material and falls under the <a href="/license">OGL License</a>.</p>
@endsection
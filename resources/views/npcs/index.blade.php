@extends('layout')
@section('class', 'npcs')

@section('content')

<div class="d-flex">
    <h1 class=" header">NPCs</h1>
    <a href="/npcs/create" class="btn btn-default ml-auto">New</a>
  </div>
  <div class="card">
    <div class="card-body">
  
  @if(count($npcs) > 0)
  <sort-items :items="{{ json_encode($npcs) }}" section="npcs" :columns="['name', 'gender', 'race', 'class', 'affiliation']" url="id" />
  @else
  <p>You don't have any locations yet. <a href="/npcs/create">Click here to create one</a>.</p>
  @endif
  
  </div>
  </div>

  

@endsection
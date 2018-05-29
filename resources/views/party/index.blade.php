@extends('layout')
@section('class', 'party')

@section('content')

<div class="d-flex">
    <h1 class=" header">Party</h1>
    <a href="/party/create" class="btn btn-default ml-auto">New</a>
  </div>
  <div class="card">
    <div class="card-body">
  
  @if(count($party) > 0)
  <sort-items :items="{{ json_encode($party) }}" section="party" :columns="['name', 'player', 'ac', 'hp', 'pp', 'status']" url="id" />
  @else
  <p>You don't have any party yet. <a href="/party/create">Click here to create one</a>.</p>
  @endif
  
  </div>
  </div>
  

@endsection
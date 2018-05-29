@extends('layout')
@section('class', 'notes')

@section('content')
<div class="d-flex">
    <h1 class=" header">Notes</h1>
    <a href="/notes/create" class="btn btn-default ml-auto">New</a>
  </div>
  <div class="card">
    <div class="card-body">
  
  @if(count($notes) > 0)
  <sort-items :items="{{ json_encode($notes) }}" section="notes" :columns="['title', 'campaign']" url="id" />
  @else
  <p>You don't have any notes yet. <a href="/notes/create">Click here to create one</a>.</p>
  @endif
  
  </div>
  </div>

@endsection
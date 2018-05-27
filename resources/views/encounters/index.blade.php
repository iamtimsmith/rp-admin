@extends('layout')
@section('class', 'encounters')

@section('content')
<div class="d-flex">
    <h1 class=" header">Encounters</h1>
    <a href="/encounters/create" class="btn btn-default ml-auto">New</a>
  </div>
  <div class="card">
    <div class="card-body">
  
  @if(count($encounters) > 0)
  <sort-items :items="{{ json_encode($encounters) }}" section="encounters" :columns="['title', 'campaign']" />
  @else
  <p>You don't have any encounters yet. <a href="/encounters/create">Click here to create one</a>.</p>
  @endif
  
  </div>
  </div>
@endsection
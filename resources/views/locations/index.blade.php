@extends('layout')
@section('class', 'locations')

@section('content')
<div class="d-flex">
  <h1 class=" header">Location Notes</h1>
  <a href="/locations/create" class="btn btn-default ml-auto">New</a>
</div>
<div class="card">
  <div class="card-body">

@if(count($locations) > 0)
<sort-items :items="{{ json_encode($locations) }}" section="locations" :columns="['title', 'campaign']" url="id" />
@else
<p>You don't have any locations yet. <a href="/locations/create">Click here to create one</a>.</p>
@endif

</div>
</div>

@endsection


@section('contentjs')

@endsection
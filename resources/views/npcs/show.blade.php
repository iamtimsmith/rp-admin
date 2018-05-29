@extends('layout') @section('class', 'npcs') @section('content')

<div class="d-flex mb-4">
  <a href="/npcs">&lt;&lt; Back</a>
  <div class="ml-auto">
    <a href="/npcs/{{$npc->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
    {!! Form::open(['action' => ['NpcsController@destroy', $npc->id], 'method'=>'POST', 'class'=>'float-right']) !!} {{ Form::hidden('_method',
    'DELETE') }} {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em'])
    }} {!! Form::close() !!}
  </div>
</div>

<div class="row">
  <div class="col-md-10">
    <h1 class="header">{{ $npc->name }}</h1>
    <hr>
    <div class="card">
      <div class="card-body">
        <p>
          <strong>Gender</strong> {{ $npc->gender }}</p>
        <p>
          <strong>Race</strong> {{ $npc->race }}</p>
        <p>
          <strong>Class</strong> {{ $npc->class }}</p>
        <p>
          <strong>Alignment</strong> {{ $npc->alignment }}</p>
        <p>
          <strong>Affiliations</strong> {{ $npc->affiliation }}</p>
        <p class="h5">Notes</p>
        <hr class="mt-0 mb-3"> 
        {!! $npc->notes !!}
      </div>
    </div>
  </div>
    <div class="col-md-2">
      {{-- Images --}}
      @if ($npc->images !== null )
        <p class="h5 header">Images</p>
        <thumbnails :images="[{{ $npc->images }}]"></thumbnails>
      @endif
    </div>
  </div>


@endsection
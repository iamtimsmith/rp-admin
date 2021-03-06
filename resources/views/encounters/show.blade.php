@extends('layout') @section('class', 'encounter') @section('content')
<?php
  use App\Monster;
  $names = explode(',',ucwords($encounter->monsters));
?>
<div class="d-flex mb-4">
  <a href="/encounters">&lt;&lt; Back</a>
  <div class="ml-auto">
    <a href="/encounters/{{$encounter->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
    {!! Form::open(['action' => ['EncountersController@destroy', $encounter->id], 'method'=>'POST', 'class'=>'float-right'])
    !!} {{ Form::hidden('_method', 'DELETE') }} {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0',
    'style'=>'font-size:1em']) }} {!! Form::close() !!}
  </div>
</div>
<div class="row">
  <div class="col-md-10" id="show-details">
    <h1 class="header">{{ $encounter->title }}</h1>
    <span>
      <strong>id: </strong>{{ $encounter->id }}</span>
    <hr>
    <div class="card">
      <div class="card-body">
        <div>
          {!! $encounter->content !!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <affix class="" relative-element-selector="#show-details" style="width:200px" :offset="{top:50, bottom:-500}">
      {{-- Images --}} 
      @if ($encounter->images !== null )
        <p class="h5 header">Images</p>
        <thumbnails :images="[{{ $encounter->images }}]"></thumbnails>
      @endif 
      
      {{-- Monsters --}} 
      @if ( $encounter->monsters !== null )
        <p class="h5 header mt-5">Monsters</p>
            
        <?php $monsters = []; ?>
        @foreach ($names as $name)
          <?php array_push($monsters, Monster::find(trim($name))); ?>
        @endforeach
        <monsters :stats="{{json_encode($monsters)}}"></monsters>
      @endif



    </affix>
  </div>
</div>
@endsection
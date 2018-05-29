@extends('layout')
@section('class', 'location')

@section('content')
<?php
  use App\Monster;
  use App\Encounter;
  $names = explode(',',ucwords($location->monsters));
  $encounters = explode(',',ucwords($location->encounters));
?>
<div class="d-flex mb-4">
    <a href="/locations">&lt;&lt; Back</a>
    <div class="ml-auto">
        <a href="/locations/{{$location->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
        {!! Form::open(['action' => ['LocationsController@destroy', $location->id], 'method'=>'POST', 'class'=>'float-right']) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
        {!! Form::close() !!}
    </div>
  </div>


  <div class="row">
    <div class="col-12 col-md-10" id="show-details">
        <h1 class="header">{{ $location->title }}</h1>
  
        <hr>
        <div class="card">
            <div class="card-body">

        <div>
          {!! $location->content !!}
        </div>
    </div>
  </div>
</div>
<div class="d-none d-md-block col-md-2 on-top">
    <affix class="" relative-element-selector="#show-details" style="width:150px" :offset="{top:50, bottom:20}">
        <div>
        {{-- Images --}}
        @if ($location->images !== '[]')
          <p class="h5 header">Images</p>
          <thumbnails :images="[{{ $location->images }}]"></thumbnails>
        @endif

      
        {{-- Encounters --}}
        @if ( $location->encounters !== null )
        <p class="h5 header mt-5">Encounters</p>
        
        <ul class="pl-3">
          @foreach ($encounters as $encounter)
            <?php $notes = Encounter::find(trim($encounter)); ?>
            <li>
              <encounters :notes="{{json_encode($notes)}}"></encounters>
            </li>
          @endforeach
        </ul>
        @endif


        {{-- Monsters --}}
        @if ( $location->monsters !== null )
        <p class="h5 header mt-5">Monsters</p>
        
        <ul class="pl-3">
          @foreach ($names as $name)
            <?php $stats = Monster::find(trim($name)); ?>
            <li>
              <monsters :stats="{{json_encode($stats)}}"></monsters>
            </li>
          @endforeach
        </ul>
        @endif

      </div>
        
      </affix>
</div>
<div class="d-md-none col-12 mt-4">
      {{-- Images --}}
      @if ($location->images !== '[]')
        <p class="h5 header">Images</p>
        <thumbnails :images="[{{ $location->images }}]"></thumbnails>
      @endif

    
      {{-- Encounters --}}
      @if ( $location->encounters !== null )
      <p class="h5 header mt-5">Encounters</p>
      
      <ul class="pl-3">
        @foreach ($encounters as $encounter)
          <?php $notes = Encounter::find(trim($encounter)); ?>
          <li>
            <encounters :notes="{{json_encode($notes)}}"></encounters>
          </li>
        @endforeach
      </ul>
      @endif


      {{-- Monsters --}}
      @if ( $location->monsters !== null )
      <p class="h5 header mt-5">Monsters</p>
      
      <ul class="pl-3">
        @foreach ($names as $name)
          <?php $stats = Monster::find(trim($name)); ?>
          <li>
            <monsters :stats="{{json_encode($stats)}}"></monsters>
          </li>
        @endforeach
      </ul>
      @endif

    </div>
  </div>

  
@endsection
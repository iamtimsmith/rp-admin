@extends('layout')
@section('class', 'party')

@section('content')
<div class="row">
  <div class="col-sm-9">
      <div class="d-flex mb-4">
          <a href="/party">&lt;&lt; Back</a>
          <div class="ml-auto">
              <a href="/party/{{$char->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
              {!! Form::open(['action' => ['PartyController@destroy', $char->id], 'method'=>'POST', 'class'=>'float-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
              {!! Form::close() !!}
          </div>
        </div>
        <h1>{{ $char->name }}</h1>
          <div class="d-flex">
            <div class="col-sm-6">
                <p><strong>Player</strong> {{ $char->player }}</p>
                <p><strong>Armor Class</strong> {{ $char->ac }}</p>
                <p><strong>Hit Points</strong> {{ $char->hp }}</p>
                <p><strong>Passive Perception</strong> {{ $char->pp }}</p>
                <p class="h5">Notes</p>
                <hr class="mt-0 mb-3">
                {!! $char->notes !!}
            </div>
            <div class="col-sm-6">
              @if($char->portrait !== "noimage.jpg")
                <img class="col" src="/storage/portraits/{{ $char->portrait }}" alt="{{ $char->name }}">
              @endif
            </div>
          </div>
        </div>
  </div>
</div>


@endsection
@extends('layout')
@section('class', 'party')

@section('content')

<div class="row"></div>
  <div class="col-md-9">
    <a href="/party">&lt;&lt; Back</a>
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

@endsection
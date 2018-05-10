@extends('layout')
@section('class','spells detail')

@section('content')
<div class="row justify-content-center">
  <div class="col-8">
      <a href="/spells"> &lt;&lt; Back</a>
      <h1 class="mt-3">{{ $spell->name }}</h1>
      
      <hr>
      
      <div><strong>Description </strong>{!! $spell->description !!}</div>
      @if($spell->higher_levels !== "")
        <div><strong>Higher levels</strong>{!! $spell->higher_levels !!}</div>
      @endif
      <div><strong>Range </strong><span>{{ $spell->range }}</span></div>
      <div><strong>Components </strong><span>{{ $spell->components }}</span></div>
      <div><strong>Materials </strong><span>{{ $spell->material }}</span></div>
      <div><strong>Ritual </strong><span>{{ $spell->ritual }}</span></div>
      <div><strong>Duration </strong><span>{{ $spell->duration }}</span></div>
      <div><strong>Concentration </strong><span>{{ $spell->concentration }}</span></div>
      <div><strong>Casting Time </strong><span>{{ $spell->casting_time }}</span></div>
      <div><strong>Level </strong><span>{{ $spell->level }}</span></div>
      <div><strong>School </strong><span>{{ $spell->school }}</span></div>
      <div><strong>Archetype </strong><span>{{ $spell->archetype }}</span></div>
      <div><strong>Circles </strong><span>{{ $spell->circles }}</span></div>
      <div><strong>Page </strong><span>{{ $spell->page }}</span></div>

  </div>
</div>



@endsection
@extends('layout') @section('class', 'party') @section('content')

<div class="d-flex mb-4">
  <a href="/party">&lt;&lt; Back</a>
  <div class="ml-auto">
    <a href="/party/{{$char->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
    {!! Form::open(['action' => ['PartyController@destroy', $char->id], 'method'=>'POST', 'class'=>'float-right']) !!} {{ Form::hidden('_method',
    'DELETE') }} {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em'])
    }} {!! Form::close() !!}
  </div>
</div>
<h1 class="header">{{ $char->name }}</h1>
<div class="row">
  <div class="col-sm-10">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <p class="col-6">
            <strong>Player:</strong> {{ $char->player }}</p>
            <p class="col-6">
                <strong>Status:</strong> {{ $char->status }}</p>
          <p class="col-6">
            <strong>Armor Class:</strong> {{ $char->ac }}</p>
          <p class="col-6">
            <strong>Hit Points:</strong> {{ $char->hp }}</p>
          <p class="col-6">
            <strong>Passive Perception:</strong> {{ $char->pp }}</p>

        {{-- Optional items if user wants detailed characters --}}
        @if ( $user->detail_level == 'detailed')
          <p class="col-6">
            <strong>Speed:</strong> {{ $char->speed }}</p>
        @endif
        </div>

        {{-- Optional items if user wants detailed characters --}}
        @if ( $user->detail_level == 'detailed')
        <hr>

        <div class="row abilities">
          <div class="col-sm text-center">
            <p>
              <strong>STR</strong>
            </p>
            <p>{{ $char->str }}</p>
          </div>
          <div class="col-sm text-center">
            <p>
              <strong>DEX</strong>
            </p>
            <p>{{ $char->dex }}</p>
          </div>
          <div class="col-sm text-center">
            <p>
              <strong>CON</strong>
            </p>
            <p>{{ $char->con }}</p>
          </div>
          <div class="col-sm text-center">
            <p>
              <strong>INT</strong>
            </p>
            <p>{{ $char->int }}</p>
          </div>
          <div class="col-sm text-center">
            <p>
              <strong>WIS</strong>
            </p>
            <p>{{ $char->wis }}</p>
          </div>
          <div class="col-sm text-center">
            <p>
              <strong>CHA</strong>
            </p>
            <p>{{ $char->cha }}</p>
          </div>
        </div>

        <hr>

        <ul>
          @if($char->saving_throws !== null)
            <li><strong>Saving Throws:</strong> {{$char->saving_throws}}</li>
          @endif
          @if($char->skills !== null)
            <li><strong>Skills:</strong> {{$char->skills}}</li>
          @endif
          @if($char->damage_vulnerabilities !== null)
            <li><strong>Damage Vulnerabilities:</strong> {{$char->damage_vulnerabilities}}</li>
          @endif
          @if($char->damage_resistance !== null)
            <li><strong>Damage Resistances:</strong> {{$char->damage_resistance}}</li>
          @endif
          @if($char->damage_immunities !== null)
            <li><strong>Damage Immmunities:</strong> {{$char->damage_immunities}}</li>
          @endif
          @if($char->condition_immunities !== null)
            <li><strong>Condition Immmunities:</strong> {{$char->condition_immunities}}</li>
          @endif
          @if($char->senses !== null)
            <li><strong>Senses:</strong> {{$char->senses}}</li>
          @endif
          @if($char->languages !== null)
            <li><strong>Languages:</strong> {{$char->languages}}</li>
          @endif
        </ul>

        <br>
        <p class='h5 border-bottom'>ABILITIES</p>
        <div class="mb-5">
          {!! $char->abilities !!}
        </div>

        <br>
        <p class='h5 border-bottom'>ACTIONS</p>
        <div class="mb-5">
            {!! $char->actions !!}
        </div>

        <br>
        <p class='h5 border-bottom'>EQUIPMENT</p>
        <div class="mb-5">
            {!! $char->equipment !!}
        </div>

        @endif

        <br>
        <p class="h5">NOTES</p>
        <hr class="mt-0 mb-3"> {!! $char->notes !!}
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <affix>
      <div>
        {{-- Images --}} 
        @if ($char->images !== null )
          <p class="h5 header">Images</p>
          <thumbnails :images="[{{ $char->images }}]"></thumbnails>
        @endif 
      </div>
    </affix>
  </div>
</div>

@endsection
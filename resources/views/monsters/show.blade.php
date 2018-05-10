@extends('layout')
@section('class','monsters detail')

@section('content')
<div class="row justify-content-center">
  <div class="col-8">
      <a href="/monsters"> &lt;&lt; Back</a>
      <h1 class="mt-3">{{ $monster->name }}</h1>
      <p>{{ $monster->size }} {{ $monster->type }} {{ $monster->subtype }}, {{ $monster->alignment }}</p>
      
      <hr>
      
      <ul>
        <li><strong>Armor Class</strong> {{ $monster->armor_class }}</li>
        <li><strong>Hit Points</strong> {{ $monster->hit_points }}</li>
        <li><strong>Speed</strong> {{ $monster->speed }}</li>
      </ul>
      
      <hr>
      
        <div class="row abilities">
          <div class="col-sm">
            <p><strong>STR</strong></p>
            <p>{{ $monster->str }}</p>
          </div>
          <div class="col-sm">
            <p><strong>DEX</strong></p>
            <p>{{ $monster->dex }}</p>
          </div>
          <div class="col-sm">
            <p><strong>CON</strong></p>
            <p>{{ $monster->con }}</p>
          </div>
          <div class="col-sm">
            <p><strong>INT</strong></p>
            <p>{{ $monster->int }}</p>
          </div>
          <div class="col-sm">
            <p><strong>WIS</strong></p>
            <p>{{ $monster->wis }}</p>
          </div>
          <div class="col-sm">
            <p><strong>CHA</strong></p>
            <p>{{ $monster->cha }}</p>
          </div>
        </div>
      
        <hr>
      
        <ul>
          <li class="saving-throws"><strong>Saving Throws</strong> 
            @if($monster->str_save !== 0)<span> Str +{{$monster->str_save}}</span>@endif
            @if($monster->dex_save !== 0)<span> Dex +{{$monster->dex_save}}</span>@endif
            @if($monster->con_save !== 0)<span> Con +{{$monster->con_save}}</span>@endif
            @if($monster->int_save !== 0)<span> Int +{{$monster->int_save}}</span>@endif
            @if($monster->wis_save !== 0)<span> Wis +{{$monster->wis_save}}</span>@endif
            @if($monster->cha_save !== 0)<span> Cha +{{$monster->cha_save}}</span>@endif
          </li>
          <li class="skills"><strong>Skills</strong> 
            @if($monster->acrobatics !== 0)<span> Acrobatics +{{$monster->acrobatics}}</span>@endif
            @if($monster->animal_handling !== 0)<span> Animal Handling +{{$monster->animal_handling}}</span>@endif
            @if($monster->arcana !== 0)<span> Arcana +{{$monster->arcana}}</span>@endif
            @if($monster->athletics !== 0)<span> Athletics +{{$monster->athletics}}</span>@endif
            @if($monster->deception !== 0)<span> Deception +{{$monster->deception}}</span>@endif
            @if($monster->history !== 0)<span> History +{{$monster->history}}</span>@endif
            @if($monster->insight !== 0)<span> Insight +{{$monster->insight}}</span>@endif
            @if($monster->intimidation !== 0)<span> Intimidation +{{$monster->intimidation}}</span>@endif
            @if($monster->investigation !== 0)<span> Investigation +{{$monster->investigation}}</span>@endif
            @if($monster->medicine !== 0)<span> Medicine +{{$monster->medicine}}</span>@endif
            @if($monster->nature !== 0)<span> Nature +{{$monster->nature}}</span>@endif
            @if($monster->perception !== 0)<span> Perception +{{$monster->perception}}</span>@endif
            @if($monster->performance !== 0)<span> Performance +{{$monster->performance}}</span>@endif
            @if($monster->persuasion !== 0)<span> Persuasion +{{$monster->persuasion}}</span>@endif
            @if($monster->religion !== 0)<span> Religion +{{$monster->religion}}</span>@endif
            @if($monster->sleight_of_hand !== 0)<span> Sleight of Hand +{{$monster->sleight_of_hand}}</span>@endif
            @if($monster->stealth !== 0)<span> Stealth +{{$monster->stealth}}</span>@endif
            @if($monster->survival !== 0)<span> Survival +{{$monster->survival}}</span>@endif
          </li>
          <li><strong>Damage Vulnerabilities</strong> {{ $monster->damage_vulnerabilities }}</li>
          <li><strong>Damage Resistance</strong> {{ $monster->damage_resistance }}</li>
          <li><strong>Damage Inmmunities</strong> {{ $monster->damage_immunities }}</li>
          <li><strong>Condition Inmmunities</strong> {{ $monster->condition_immunities }}</li>
          <li><strong>Senses</strong> {{ $monster->senses }}</li>
          <li><strong>Languages</strong> {{ $monster->languages }}</li>
          <li><strong>Challenge Rating</strong> {{ $monster->challenge_rating }}</li>
        </ul>
      
        <hr>
      
        {!! $monster->special_abilities !!}
      
        <br>
        <h5 class='border-bottom'>ACTIONS</h5>
      
        {!! $monster->actions !!}
  </div>
</div>



@endsection
<?php 
use App\Char;
use App\User;

$user_id = auth()->user()->id;
$user = User::find($user_id);
$party = $user->party;
?>
<div class="card" id="widgets">
  <button class="btn btn-default toggle-widgets" @click="widgetToggle"><i class="fa fa-angle-left"></i></button>
  <div class="card-body">
    <div id="initiative">
      <p class="h5">Initiative</p>
      @if ( count($party) > 0)
      <additem :items="{{$party}}"></additem>
      @endif
    </div>
  </div>
</div>

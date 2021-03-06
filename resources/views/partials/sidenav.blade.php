<?php 
use App\User;

$user_id = auth()->user()->id;
$user = User::find($user_id);
?>

<div id="sidenav">
  <div class="">
    <ul>
      @guest
        <li class="mt-3 mb-5"><a href="/"><img src="/storage/images/d20.png" alt="RP Admin" class="col-sm-12"></a></li>
      @else
        <li class="mt-3 mb-5"><a href="/dashboard"><img src="/images/d20.png" alt="RP Admin" class="col-sm-12"></a></li>
      @endif

      <li class="mt-2"><a href="/dashboard"><span class="ra ra-quill-ink ra-2x"></span><span class="navlabel">Dashboard</span></a></li>
      <li class="mt-2"><a href="/monsters"><span class="ra ra-hydra ra-2x"></span><span class="navlabel">Monsters</span></a></li>
      <li class="mt-2"><a href="/spells"><span class="ra ra-flame-symbol ra-2x"></span><span class="navlabel">Spells</span></a></li>
      <li class="mt-2"><a href="/notes"><span class="ra ra-book ra-2x"></span><span class="navlabel">Notes</span></a></li>
      <li class="mt-2"><a href="/locations"><span class="fa fa-map-marker ra-2x"></span><span class="navlabel">Locations</span></a></li>
      <li class="mt-2"><a href="/encounters"><span class="ra ra-crossed-swords ra-2x"></span><span class="navlabel">Encounters</span></a></li>
      <li class="mt-2"><a href="/npcs"><span class="ra ra-hood ra-2x"></span><span class="navlabel">NPCs</span></a></li>
      <li class="mt-2"><a href="/party"><span class="ra ra-double-team ra-2x"></span><span class="navlabel">Party</span></a></li>
    </ul>
    
  </div>
</div>
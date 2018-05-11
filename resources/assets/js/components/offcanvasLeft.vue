<template>
<div>
  <button class="btn btn-outline-light" @click="openLeft"><i class="fa fa-bars"></i></button>
  <div class="card" id="offcanvas-left">
    <button class="btn ml-auto" @click="closeLeft"><i class="fa fa-close"></i></button>
    <div class="card-body">
      <ul>
        <!--<li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>-->
        <li><a href="/monsters">Monsters</a></li>
        <li><a href="/spells">Spells</a></li>
        <li><a href="/rules">Rules</a></li>
      </ul>
      <hr>
      <ul>
        <li>User Controls</li>
        <li><a href="/dashboard">Dashboard</a></li>
        <li>
          <a href="/notes">Notes</a>
        </li>
        <li><a href="/npcs">NPCs</a></li>
        <li><a href="/locations">Locations</a></li>
        <li><a href="/party">Party</a></li>
      </ul>

      <div class="row" id="controls">
        <div class="col-6">
          <a href="#"><span class="fa fa-cog"></span></a>
        </div>
        <div class="col-6">
          <a href="/login"><span class="fa fa-user"></span></a>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
  export default {
    data: {

    },
    methods: {
      openLeft() {
        var offcanvas = document.getElementById('offcanvas-left');
        offcanvas.classList.add('showing');
      },
      closeLeft() {
        var offcanvas = document.getElementById('offcanvas-left');
        offcanvas.classList.remove('showing');
      }
    }
  }
</script>

<style lang="scss" scoped>
.btn-outline-light {
    border:none!important;
    .fa-bars {
      font-size:1.5rem;
    }
  }
  #offcanvas-left {
    position:fixed;
    top:0;
    bottom:0;
    left:-300px;
    width:300px;
    z-index:9;
    transition:all .3s;
    &.showing {
      left:0;
    }
    a {
      color:#000;
    }
    button {
      width:50px;
      .fa-close {
        font-size:1.5rem;
      }
    }
    ul {
      list-style:none;
      li {
        a {
          font-size:1.1rem;
          text-decoration:none!important;
        }
      }
    }
    #controls {
      position:absolute;
      bottom:0;
      left:0;
      right:0;
      padding:15px 20px 15px 15px;
      .fa {
        font-size:1.5rem;
      }
      div:nth-child(2) {
        text-align:right;
      }
    }
  }
</style>
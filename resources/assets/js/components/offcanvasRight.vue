<template>
<div>
  <button class="btn btn-outline-light" @click="openRight"><i class="fa fa-bars"></i></button>
  <div class="card" id="offcanvas-right">
    <button class="btn mr-auto" @click="closeRight"><i class="fa fa-close"></i></button>
    <div class="card-body">
      <div id="initiative">
        <p class="h5 text-center">Initiative Tracker</p>
        <input type="text" id="addItem" @keyup.enter="addItem" placeholder="Enter an initiative item...">
        <ul class="list-group">
          <draggable :list="init" class="dragArea">
            <li class="list-group-item" v-for="char in init">{{ char }}</li>
          </draggable>
        </ul>
      </div>
    </div>
  </div>
</div>
</template>

<script>
  import draggable from 'vuedraggable'
  export default {
    components: {
      draggable
    },
    data() {
      return {
      init: [],
      }
    },
    methods: {
      openRight() {
        var offcanvas = document.getElementById('offcanvas-right');
        offcanvas.classList.add('showing');
      },
      closeRight() {
        var offcanvas = document.getElementById('offcanvas-right');
        offcanvas.classList.remove('showing');
      },
      addItem() {
        var item = document.getElementById('addItem');
        this.init.push(item.value);
        item.value = "";
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
  #offcanvas-right {
    position:fixed;
    top:0;
    bottom:0;
    right:-300px;
    width:300px;
    z-index:9;
    transition:all .3s;
    &.showing {
      right:0;
    }
    button {
      width:50px;
      .fa-close {
        font-size:1.5rem;
      }
    }
    input {
      width:100%;
    }
    .dragArea {
      li {
        cursor:grab;
        cursor:-webkit-grab;
        &:active {
          cursor:grabbing;
          cursor:-webkit-grabbing;
        }
      }
    }
  }
</style>
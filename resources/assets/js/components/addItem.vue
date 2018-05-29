<template>
<div>
  <div class="d-flex">
    <button class="btn btn-default text-secondary ml-auto" id="refreshLocalStorage" @click="refreshLocalStorage"><i class="fa fa-refresh"></i></button>
  </div>
  
  <ul class="list-group">
    <draggable :list="init" class="dragArea">
      <li class="list-group-item" v-for="item in init" :key="item.id">
        <p class="mb-0">{{ item.name }}</p>
        <span><small>AC {{ item.ac }} | HP {{ item.hp }} | PP {{ item.pp }}</small></span>
      </li>
    </draggable>
  </ul>
  </div>
</template>

<script>
import draggable from 'vuedraggable'

export default {
  components: {
    draggable
  },
  props: [
    'items'
  ],
  data() {
    return {
      count: 0,
      init: this.items
    }
  },
  watch: {
    init: {
      handler() {
        localStorage.setItem('initiative', JSON.stringify(this.init));
      }
    }
  },
  mounted: function() {
    this.count = this.init.length;
    if (localStorage.getItem('initiative')) {
      this.init = JSON.parse(localStorage.getItem('initiative'))
    } else {
      var dm = {id:0, name:'DM'};
      this.init.push(dm);
    }
  },
  methods: {
    refreshLocalStorage() {
      var refresh = document.querySelector('#refreshLocalStorage .fa-refresh').classList;
      var dm = {id:0, name:'DM'};
      refresh.add('rotate');
      setTimeout(function() {
        refresh.remove('rotate');
      }, 1500);

      this.init = this.items;
      if (this.init.length <= this.count) {
        this.init.push(dm);
      }
    }
  }
}
</script>

<style lang="scss" scoped>
#refreshLocalStorage .fa-refresh {
  &.rotate {
    animation:rotate 1.5s linear;
  }
}
@keyframes rotate {
  from {transform:rotate(0deg)}
  to {transform:rotate(360deg)}
}
</style>

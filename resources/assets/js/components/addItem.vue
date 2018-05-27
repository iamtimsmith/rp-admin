<template>
<div>
  <!--<input type="text" id="addItem" @keyup.enter="addItem" placeholder="Enter an initiative item..." >-->
  
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
    if (localStorage.getItem('initiative')) {
      this.init = JSON.parse(localStorage.getItem('initiative'))
    } else {
      var dm = {id:0, name:'DM'};
      this.init.push(dm);
    }
  }
}
</script>
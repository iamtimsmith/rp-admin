<template>
<div>
  <!--<input type="text" id="addItem" @keyup.enter="addItem" placeholder="Enter an initiative item..." >-->
  
  <ul class="list-group">
    <draggable :list="init" class="dragArea">
      <li class="list-group-item" v-for="item in items" :key="item.id">
        <p class="mb-0">{{ item.name }}</p>
        <span><small>AC {{ item.ac }} | HP {{ item.hp }} | PP {{ item.pp }}</small></span>
      </li>
      <li class="list-group-item">DM</li>
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
      
    }
  },
  created: {
    addDM() {
      var dm = "DM";
      items.push(dm);
    }
  }
}
</script>
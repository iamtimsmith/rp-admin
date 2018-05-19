<template>
  <div style="width:100%;">
    <vue-good-table :columns="columns" :rows="items"></vue-good-table>
  </div>
</template>

<script>
import VueGoodTable from 'vue-good-table';
export default {
  props:[
    'items',
    'Column1',
    'Column2'
  ],
  data() {
    return {
      columns:[
        {label:'Title', field:'title', filterOptions:{enabled:true}},
        {label:'Campaign', field:'campaign', filterOptions:{enabled:true}}, 
      ],
    }
  }
}
</script>
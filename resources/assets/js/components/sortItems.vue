<template>
<div id="sortable">
  <table-component :data="items" :sort-by="columns[0]" sort-order="asc" filter-placeholder="Search..." table-class="table table-striped" show-caption="false">
    <table-column :show="columns[0]">
      <template slot-scope="row">
          <a :href="`/${section}/${row[url]}`">{{ row[columns[0]] }}</a>
      </template>
    </table-column>
    <table-column v-if="columns.length > 1" :show="columns[1]"></table-column>
    <table-column v-if="columns.length > 2" :show="columns[2]"></table-column>
    <table-column v-if="columns.length > 3" :show="columns[3]"></table-column>
    <table-column v-if="columns.length > 4" :show="columns[4]"></table-column>
    <table-column v-if="columns.length > 5" :show="columns[5]"></table-column>
  </table-component>
</div>
</template>

<script>

import { TableComponent, TableColumn } from 'vue-table-component';
export default {
  components: {
    TableComponent,
    TableColumn
  },
  props:[
    'items',
    'columns',
    'section',
    'url'
  ],
  beforeUpdate() {
    var col = document.getElementsByTagName('TH');
    
    for (var i=0; i < col.length; i++) {
      var curWidth = col[i].offsetWidth;
      col[i].style.width = curWidth+"px";
    }
  }
}
</script>

<style lang="scss">
#sortable {
  .table-component__filter {
    position:relative;
    .table-component__filter__field {
    border:white!important;
    border-bottom:1px solid #ddd!important;
    }
    .table-component__filter__clear {
      position:absolute;
      top:0;
      bottom:0;
      right:10px;
      font-size:1.5em;
      cursor:pointer;
    }
  }
  .table-component__table-wrapper {
    overflow-x:scroll!important;
  }
  table {
    width:100%;
    th {
      text-transform:capitalize;
      cursor:pointer;
      border-top:none;
    }
    tr {
      width:auto;
    }
    caption {
      display:none;
    }
  }
}
</style>
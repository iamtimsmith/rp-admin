<template>
<li class="dropdown">
  <a href="javascript:void(0)" @click="dropdownToggle">{{ text }} <i class="fa fa-caret-down"></i></a>
  <ul class='dropdown-menu card bg-white'>
    <slot></slot>
  </ul>
</li>
</template>

<script>
export default {
  props: [
    'text'
  ],
  data: {
    show:false
  },
  methods: {
    /*dropdownToggle() {
      var dropdownMenu = document.getElementsByClassName('dropdown-menu')[0];
      if (this.show) {
      dropdownMenu.classList.remove('opened')
      this.show = !this.show;
      }
      else {
      dropdownMenu.classList.add('opened');
      this.show = !this.show;
      }
      console.log(this.show);
    }*/
  }
}
</script>

<style lang="scss" scoped>
.dropdown {
  position:relative;
  display:inline-block;
  &:hover .dropdown-menu {
    display:flex;
  }
  >a {
    display:block;
    padding:8px 0;
  }
  .dropdown-menu {
    position:absolute;
    top:45px;
    right:-5px;
    margin-left:auto;
    max-width:100px;
    display:none;
    padding:0;
    border-top:none;
    .dropdown-item {
      padding:0;
      text-align:center;
    }
  }
}
</style>
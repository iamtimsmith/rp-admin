<template>
  <div>
    <div class="thumbs">
      <div v-for="image in arr" :key="image" :style="{ backgroundImage: `url(${image})`}">
        <a href="javascript:void(0)" class="btn btn-dark btn-sm" @click="removeImage(image)"><i class="fa fa-close"></i></a>
      </div>
    </div>
    <div class="input">
      <input type="text" placeholder="Place the url for your image here...">
      <a href="javascript:void(0)" @click="addImage" class="btn btn-default ml-auto"><i class="fa fa-plus"></i></a>
    </div>
  </div>
</template>

<script>
import { SweetModal, SweetModalTab } from 'sweet-modal-vue';
export default {
  props: [
    'images'
  ],
  data() {
    return {
      arr:[]
    }
  },
  methods: {
    removeImage(image) {
      var index = this.arr.indexOf(image);
      if (index > -1) {
        this.arr.splice(index, 1);
      }
    },
    addImage() {
      var input = document.querySelector('.input > input');
      this.arr.push(input.value);
      input.value = "";
    }
  },
  mounted: function() {
    if (this.images !== null) {
      for(var i=0;i < this.images.length; i++) {
        this.arr.push( this.images[i] );
      }
    }
  },
  watch: {
    arr: {
      handler() {
        var hiddenInput = document.querySelector("#inputMap");
        var str = "";

        if (this.arr.length > 0) {
        for (var i = 0; i < this.arr.length; i++) {
          str = str + `"${this.arr[i]}",`;
        }
        }

        hiddenInput.value = str;
      }
    }
  },
}
</script>

<style lang="scss" scoped>
.thumbs {
  display:flex;
  >div {
    position:relative;
    height:100px;
    width:100px;
    background-size:cover;
    margin: 10px;
    border:1px solid #ddd;
    .btn-dark {
      position:absolute;
      top:-10px;
      right:-10px;
      border-radius:100%;
    }
  }
}
.input {
  background:white;
  border:1px solid #ddd;
  display:flex;
  input {
    margin-bottom:0;
    border:none!important;
    width:100%;
  }
}
</style>

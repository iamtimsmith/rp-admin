<template>
  <div>
    <div v-for="image in images" :key="image">
      <a href="javascript:void(0)" @click="showModal(image)" class="col-sm-2 img-thumbnail" :style="{ backgroundImage: `url(${image})`}"></a>
    </div>
    <sweet-modal ref="modal" width="60%" enable-mobile-fullscreen="true">
      <sweet-modal-tab v-for="(image, index) in images" :key="image" :title="`Image ${index+1}`" :id="image">
        <img class="modal-image" :src="image" alt="" />
      </sweet-modal-tab>
    </sweet-modal>
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
      
    }
  },
  components: {
    SweetModal, SweetModalTab
  },
  methods: {
    showModal(image) {
      this.$refs.modal.open(image);
    }
  }
}
</script>

<style lang="scss" scoped>
.sweet-modal-overlay {
  background:rgba(0,0,0,0.2);
}
.img-thumbnail {
  min-width:100px;
  width:100px;
  height:100px;
  overflow:hidden;
  padding:0;
  display:block;
  background-size:cover;
  background-position:center center;
}
.modal-image {
  max-width:100%;
}

@media (max-width:769px) {
  .img-thumbnail {
    width:100%;
    height:200px;
  }
}


</style>

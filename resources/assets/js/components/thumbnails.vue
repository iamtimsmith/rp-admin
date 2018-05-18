<template>
  <div>
    <a href="javascript:void(0)" @click="showModal" class="col-sm-2 img-thumbnail" :style="{ backgroundImage: `url(${image})`}"></a>
    <sweet-modal ref="modal" width="60%">
      <img class="modal-image" :src="image" alt="" />
    </sweet-modal>
  </div>
</template>

<script>
import { SweetModal, SweetModalTab } from 'sweet-modal-vue';
export default {
  props: [
    'image'
  ],
  components: {
    SweetModal, SweetModalTab
  },
  methods: {
    showModal() {
      this.$refs.modal.open();
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
</style>

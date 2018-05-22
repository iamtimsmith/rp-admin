<template>
  <div>
    <a href="javascript:void(0)" @click="showModal">{{ notes.title }}</a>
    <sweet-modal ref="encounter" class="max-height-500">
      <h1 class="mt-3">{{ notes.title }}</h1>
      <hr>
      <div v-html="notes.content" class="text-left"></div>
      <hr>
      <p class="pl-4 text-left text-capitalize"><strong>Monsters: </strong>{{ notes.monsters }}</p>
    </sweet-modal>
  </div>
</template>

<script>
import { SweetModal, SweetModalTab } from 'sweet-modal-vue';
export default {
  props: [
    'notes'
  ],
  components: {
    SweetModal, SweetModalTab
  },
  methods: {
    showModal() {
      this.$refs.encounter.open();
    }
  }
}
</script>

<style lang="scss" scoped>
.sweet-modal-overlay {
  background:rgba(0,0,0,0.2);
}
li {
  text-align:left;
}

</style>



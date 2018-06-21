<template>
  <div>
    <ul class="pl-0">
      <li v-for="note in notes">
        <a href="javascript:void(0)" @click="showModal(note.title)">{{ note.title }}</a>
      </li>
    </ul>
    <sweet-modal ref="encounter" class="max-height-500">
      <sweet-modal-tab v-for="note in notes" :key="note.title" :title="note.title" :id="note.title">
      <h1>{{ note.title }}</h1>
      <hr>
      <div v-html="note.content" class="text-left"></div>
      <hr>
      <p class="pl-4 text-left text-capitalize"><strong>Monsters: </strong>{{ note.monsters }}</p>
      </sweet-modal-tab>
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
    showModal(enc) {
      this.$refs.encounter.open(enc);
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



<template>
  <div>
    <ul class="pl-0">
    <li v-for="monster in stats" :key="monster.name">
      <a href="javascript:void(0)" @click="showModal(monster.name)">{{ monster.name }}</a>
    </li>
    </ul>
    <sweet-modal ref="monster" class="max-height-500">
      <sweet-modal-tab v-for="monster in stats" :key="monster.name" :title="monster.name" :id="monster.name">
      <h1 class="">{{ monster.name }}</h1>
      <p>{{ monster.size }} {{ monster.type }} {{ monster.subtype }}, {{ monster.alignment }}</p>
      
      <hr>
      
      <ul>
        <li><strong>Armor Class</strong> {{ monster.armor_class }}</li>
        <li><strong>Hit Points</strong> {{ monster.hit_points }}</li>
        <li><strong>Speed</strong> {{ monster.speed }}</li>
      </ul>
      
      <hr>
      
        <div class="row abilities">
          <div class="col-4 col-sm">
            <p><strong>STR</strong></p>
            <p>{{ monster.str }}</p>
          </div>
          <div class="col-4 col-sm">
            <p><strong>DEX</strong></p>
            <p>{{ monster.dex }}</p>
          </div>
          <div class="col-4 col-sm">
            <p><strong>CON</strong></p>
            <p>{{ monster.con }}</p>
          </div>
          <div class="col-4 col-sm">
            <p><strong>INT</strong></p>
            <p>{{ monster.int }}</p>
          </div>
          <div class="col-4 col-sm">
            <p><strong>WIS</strong></p>
            <p>{{ monster.wis }}</p>
          </div>
          <div class="col-4 col-sm">
            <p><strong>CHA</strong></p>
            <p>{{ monster.cha }}</p>
          </div>
        </div>
      
        <hr>
      
        <ul>
          <li class="saving-throws"><strong>Saving Throws</strong> 
            <span v-if="monster.str_save !== 0"> Str +{{monster.str_save}}</span>
            <span v-if="monster.dex_save !== 0"> Dex +{{monster.dex_save}}</span>
            <span v-if="monster.con_save !== 0"> Con +{{monster.con_save}}</span>
            <span v-if="monster.int_save !== 0"> Int +{{monster.int_save}}</span>
            <span v-if="monster.wis_save !== 0"> Wis +{{monster.wis_save}}</span>
            <span v-if="monster.cha_save !== 0"> Cha +{{monster.cha_save}}</span>
          </li>
          <li class="skills"><strong>Skills</strong> 
            <span v-if="monster.acrobatics !== 0"> Acrobatics +{{monster.acrobatics}}</span>
            <span v-if="monster.animal_handling !== 0"> Animal Handling +{{monster.animal_handling}}</span>
            <span v-if="monster.arcana !== 0"> Arcana +{{monster.arcana}}</span>
            <span v-if="monster.athletics !== 0"> Athletics +{{monster.athletics}}</span>
            <span v-if="monster.deception !== 0"> Deception +{{monster.deception}}</span>
            <span v-if="monster.history !== 0"> History +{{monster.history}}</span>
            <span v-if="monster.insight !== 0"> Insight +{{monster.insight}}</span>
            <span v-if="monster.intimidation !== 0"> Intimidation +{{monster.intimidation}}</span>
            <span v-if="monster.investigation !== 0"> Investigation +{{monster.investigation}}</span>
            <span v-if="monster.medicine !== 0"> Medicine +{{monster.medicine}}</span>
            <span v-if="monster.nature !== 0"> Nature +{{monster.nature}}</span>
            <span v-if="monster.perception !== 0"> Perception +{{monster.perception}}</span>
            <span v-if="monster.performance !== 0"> Performance +{{monster.performance}}</span>
            <span v-if="monster.persuasion !== 0"> Persuasion +{{monster.persuasion}}</span>
            <span v-if="monster.religion !== 0"> Religion +{{monster.religion}}</span>
            <span v-if="monster.sleight_of_hand !== 0"> Sleight of Hand +{{monster.sleight_of_hand}}</span>
            <span v-if="monster.stealth !== 0"> Stealth +{{monster.stealth}}</span>
            <span v-if="monster.survival !== 0"> Survival +{{monster.survival}}</span>
          </li>
          <li><strong>Damage Vulnerabilities</strong> {{ monster.damage_vulnerabilities }}</li>
          <li><strong>Damage Resistance</strong> {{ monster.damage_resistance }}</li>
          <li><strong>Damage Immmunities</strong> {{ monster.damage_immunities }}</li>
          <li><strong>Condition Immmunities</strong> {{ monster.condition_immunities }}</li>
          <li><strong>Senses</strong> {{ monster.senses }}</li>
          <li><strong>Languages</strong> {{ monster.languages }}</li>
          <li><strong>Challenge Rating</strong> {{ monster.challenge_rating }}</li>
        </ul>
      
        <hr>
      
        <div v-html="monster.special_abilities" class="text-left"></div>
      
        <br>
        <h5 class='border-bottom text-left'>ACTIONS</h5>
      
        <div v-html="monster.actions" class="text-left"></div>

        <hr class="mt-5 mb-2">
      <small>This is SRD material and falls under the <a href="/license">OGL License</a>.</small>
      </sweet-modal-tab>
    </sweet-modal>
  </div>
</template>

<script>
import { SweetModal, SweetModalTab } from 'sweet-modal-vue';
export default {
  props: [
    'stats'
  ],
  components: {
    SweetModal, SweetModalTab
  },
  methods: {
    showModal(name) {
      this.$refs.monster.open(name);
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
.max-height-500 .sweet-modal.has-content {
  max-height:100px;
}
</style>



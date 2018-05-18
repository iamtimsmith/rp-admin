<template>
  <div>
    <a href="javascript:void(0)" @click="showModal">{{ stats.name }}</a>
    <sweet-modal ref="monster" class="max-height-500">
      <h1 class="mt-3">{{ stats.name }}</h1>
      <p>{{ stats.size }} {{ stats.type }} {{ stats.subtype }}, {{ stats.alignment }}</p>
      
      <hr>
      
      <ul>
        <li><strong>Armor Class</strong> {{ stats.armor_class }}</li>
        <li><strong>Hit Points</strong> {{ stats.hit_points }}</li>
        <li><strong>Speed</strong> {{ stats.speed }}</li>
      </ul>
      
      <hr>
      
        <div class="row abilities">
          <div class="col-sm">
            <p><strong>STR</strong></p>
            <p>{{ stats.str }}</p>
          </div>
          <div class="col-sm">
            <p><strong>DEX</strong></p>
            <p>{{ stats.dex }}</p>
          </div>
          <div class="col-sm">
            <p><strong>CON</strong></p>
            <p>{{ stats.con }}</p>
          </div>
          <div class="col-sm">
            <p><strong>INT</strong></p>
            <p>{{ stats.int }}</p>
          </div>
          <div class="col-sm">
            <p><strong>WIS</strong></p>
            <p>{{ stats.wis }}</p>
          </div>
          <div class="col-sm">
            <p><strong>CHA</strong></p>
            <p>{{ stats.cha }}</p>
          </div>
        </div>
      
        <hr>
      
        <ul>
          <li class="saving-throws"><strong>Saving Throws</strong> 
            <span v-if="stats.str_save !== 0"> Str +{{stats.str_save}}</span>
            <span v-if="stats.dex_save !== 0"> Dex +{{stats.dex_save}}</span>
            <span v-if="stats.con_save !== 0"> Con +{{stats.con_save}}</span>
            <span v-if="stats.int_save !== 0"> Int +{{stats.int_save}}</span>
            <span v-if="stats.wis_save !== 0"> Wis +{{stats.wis_save}}</span>
            <span v-if="stats.cha_save !== 0"> Cha +{{stats.cha_save}}</span>
          </li>
          <li class="skills"><strong>Skills</strong> 
            <span v-if="stats.acrobatics !== 0"> Acrobatics +{{stats.acrobatics}}</span>
            <span v-if="stats.animal_handling !== 0"> Animal Handling +{{stats.animal_handling}}</span>
            <span v-if="stats.arcana !== 0"> Arcana +{{stats.arcana}}</span>
            <span v-if="stats.athletics !== 0"> Athletics +{{stats.athletics}}</span>
            <span v-if="stats.deception !== 0"> Deception +{{stats.deception}}</span>
            <span v-if="stats.history !== 0"> History +{{stats.history}}</span>
            <span v-if="stats.insight !== 0"> Insight +{{stats.insight}}</span>
            <span v-if="stats.intimidation !== 0"> Intimidation +{{stats.intimidation}}</span>
            <span v-if="stats.investigation !== 0"> Investigation +{{stats.investigation}}</span>
            <span v-if="stats.medicine !== 0"> Medicine +{{stats.medicine}}</span>
            <span v-if="stats.nature !== 0"> Nature +{{stats.nature}}</span>
            <span v-if="stats.perception !== 0"> Perception +{{stats.perception}}</span>
            <span v-if="stats.performance !== 0"> Performance +{{stats.performance}}</span>
            <span v-if="stats.persuasion !== 0"> Persuasion +{{stats.persuasion}}</span>
            <span v-if="stats.religion !== 0"> Religion +{{stats.religion}}</span>
            <span v-if="stats.sleight_of_hand !== 0"> Sleight of Hand +{{stats.sleight_of_hand}}</span>
            <span v-if="stats.stealth !== 0"> Stealth +{{stats.stealth}}</span>
            <span v-if="stats.survival !== 0"> Survival +{{stats.survival}}</span>
          </li>
          <li><strong>Damage Vulnerabilities</strong> {{ stats.damage_vulnerabilities }}</li>
          <li><strong>Damage Resistance</strong> {{ stats.damage_resistance }}</li>
          <li><strong>Damage Immmunities</strong> {{ stats.damage_immunities }}</li>
          <li><strong>Condition Immmunities</strong> {{ stats.condition_immunities }}</li>
          <li><strong>Senses</strong> {{ stats.senses }}</li>
          <li><strong>Languages</strong> {{ stats.languages }}</li>
          <li><strong>Challenge Rating</strong> {{ stats.challenge_rating }}</li>
        </ul>
      
        <hr>
      
        <div v-html="stats.special_abilities" class="text-left"></div>
      
        <br>
        <h5 class='border-bottom text-left'>ACTIONS</h5>
      
        <div v-html="stats.actions" class="text-left"></div>

        <hr class="mt-5 mb-2">
      <small>This is SRD material and falls under the <a href="/license">OGL License</a>.</small>
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
    showModal() {
      this.$refs.monster.open();
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



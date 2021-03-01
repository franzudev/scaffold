<template>
  <div
    class="form-group text-center"
    :class="customSize"
  >
    <label>{{ key }}{{ required ? '*' : '' }}</label><br>
    <div class="form-check form-check-inline">
      <input
        v-model="entity[slot]"
        class="form-check-input"
        :disabled="!isNew && !readonly ? true : null"
        type="checkbox"
      >
    </div>
  </div>
</template>

<script lang="ts">
import { Component } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInput from "$mixins/FormInput";


@Component({
    name: 'FormCheckbox'
})
export default class FormCheckbox extends mixins(FormInput) {

}
</script>

<style scoped>

</style>

<template>
  <div
    class="form-group text-center"
    :class="customSize"
  >
    <label>{{ key }}{{ required ? '*' : '' }}</label><br>
    <div
      v-for="(option, radioKey) in options"
      :key="radioKey"
      class="form-check form-check-inline"
    >
      <input
        :id="`${key}-${radioKey}`"
        v-model="entity[slot]"
        class="form-check-input"
        type="radio"
        :disabled="!isNew && readonly ? true : null"
        :value="option.value"
      >
      <label
        class="form-check-label"
        :for="`${key}-${radioKey}`"
      >
        {{ option.label }}
      </label>
    </div>
  </div>
</template>

<script lang="ts">
import { Component } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInput from "$mixins/FormInput";


@Component({
    name: 'FormRadio'
})
export default class FormRadio extends mixins(FormInput) {

}
</script>

<style scoped>

</style>

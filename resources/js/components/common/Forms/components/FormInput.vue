<template>
  <div
    v-if="show"
    class="form-group"
    :class="customSize"
  >
    <label :for="key">{{ key }}{{ required ? '*' : '' }}</label>
    <input
      :id="key"
      v-model="entity[slot]"
      :type="type"
      class="form-control"
      :class="{'is-invalid': errors[slot]}"
      :readonly="!isNew && readonly ? true : null"
    >
    <div
      v-if="errors[slot]"
      class="invalid-feedback"
    >
      {{ errors[slot][0] }}
    </div>
  </div>
</template>

<script lang="ts">
import { Component } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInputMixin from "$mixins/FormInput";


@Component({
    name: 'FormInput'
})
export default class FormInput extends mixins(FormInputMixin) {
}
</script>

<style scoped>

</style>

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
      @keypress.enter="focusNext"
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
    focusNext(e: Event) {
        const inputs: HTMLInputElement[] = Array.from((e.target as HTMLInputElement)!.form!.querySelectorAll('input'));
        const index = inputs.indexOf((e.target as HTMLInputElement));

        if (index < inputs.length) {
            inputs[index + 1].focus();
        }
    }
}
</script>

<style scoped>

</style>

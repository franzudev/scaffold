<template>
  <div class="form-group col">
    <label :for="key">{{ key }}{{ required ? '*' : '' }}</label>
    <vue-editor
      v-model="entity[slot]"
      :class="{'error_class': errors[slot]}"
    />
    <small
      v-if="errors[slot]"
      class="form-text text-danger"
    >{{ errors[slot][0] }}</small>
  </div>
</template>

<script lang="ts">
import { Component } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInputMixin from "$mixins/FormInput";
import { VueEditor } from "vue2-editor";

@Component({
  name: 'FormEditor',
  components: { VueEditor }
})
export default class FormEditor extends mixins(FormInputMixin) {
    private customToolbar: any =  [
        ["bold", "italic", "underline"]
    ]
}
</script>

<style scoped>
.error_class {
    border: 1px solid #f00;
}
</style>

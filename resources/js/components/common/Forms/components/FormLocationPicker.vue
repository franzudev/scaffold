<template>
  <div
    class="form-group mt-3"
    :class="customSize"
  >
    <label>{{ key }}{{ required ? '*' : '' }}</label>
    <location-picker
      :lang="lang"
      :options="pickerOptions"
      :saved-place="entity[slot]"
      :place.sync="entity[slot]"
    />
  </div>
</template>

<script lang="ts">
import { Component, Prop } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInput from "$mixins/FormInput";
import LocationPicker from '$common/LocationPicker/LocationPicker'


@Component({
    name: 'FormLocationPicker',
    components: { LocationPicker }
})
export default class FormLocationPicker extends mixins(FormInput) {
    @Prop({ required: true }) pickerOptions!: any
}
</script>

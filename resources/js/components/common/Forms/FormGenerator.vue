<template>
  <div class="card-body px-0">
    <form class="row">
      <template
        v-for="(val, key) in userInputs"
      >
        <form-multiselect
          v-if="val.type === 'multiselect'"
          :key="key"
          :config="val"
          :entity="entity"
          :errors="errors"
        />
        <form-radio
          v-else-if="val.type === 'radio'"
          :key="key"
          :is-new="isNew"
          :config="val"
          :entity="entity"
          :errors="errors"
        />
        <form-checkbox
          v-else-if="val.type === 'checkbox'"
          :key="key"
          :is-new="isNew"
          :config="val"
          :entity="entity"
          :errors="errors"
        />
        <form-download
          v-else-if="val.type === 'downloads'"
          :key="key"
          :config="val"
          :entity="entity"
          :errors="errors"
        />
        <form-image
          v-else-if="val.type === 'image'"
          :key="key"
          :config="val"
          :entity="entity"
          :errors="errors"
          :is-new="isNew"
          @disable-actions="$emit('disable-actions', $event)"
        />
        <form-location-picker
          v-else-if="val.type === 'location'"
          :key="key"
          :config="val"
          :entity="entity"
          :errors="errors"
          :picker-options="pickerOptions"
        />
        <form-editor
          v-else-if="val.type === 'editor'"
          :key="key"
          :config="val"
          :entity="entity"
          :errors="errors"
          :is-new="isNew"
        />
        <form-input
          v-else
          :key="key"
          :config="val"
          :entity="entity"
          :errors="errors"
          :is-new="isNew"
        />
      </template>
      <slot></slot>
    </form>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue, Watch } from 'vue-property-decorator'
import FormMultiselect from "$common/Forms/components/FormMultiselect.vue";
import FormRadio from "$common/Forms/components/FormRadio";
import FormCheckbox from "$common/Forms/components/FormCheckbox.vue";
import FormImage from "$common/Forms/components/FormImage.vue";
import FormInput from "$common/Forms/components/FormInput.vue";
import FormDownload from "$common/Forms/components/FormDownload.vue";
import { InputConfigObject } from "$types/InputConfig";
const FormLocationPicker = () => import("$common/Forms/components/FormLocationPicker.vue");
const LocationPicker = () => import("$common/LocationPicker/LocationPicker.vue");
const FormEditor = () => import("$common/Forms/components/FormEditor.vue");

@Component({
    name: 'FormGenerator',
    components: { FormDownload, FormEditor, FormInput, FormLocationPicker, FormImage, FormCheckbox, FormRadio, FormMultiselect, LocationPicker }
})
export default class FormGenerator extends Vue {
    @Prop({ required: true }) inputs!: InputConfigObject
    @Prop({ required: true }) value!: Object
    @Prop({ required: true }) errors!: Array<Object>
    @Prop({ required: true }) isNew!: Array<Object>
    @Prop({
        default: () => ({
            map: {
                center: { lat: 0, lng: 0 },
                /** other map options **/
            },
            marker: { /** marker options **/ },
            infoWindow: { /** info window options **/ },
            autocomplete: { /** autocomplete options **/ }
        })
    }) pickerOptions!: Object

    public userInputs: InputConfigObject = {}
    public entity: Object = {}

    @Watch('entity', {
        deep: true,
        immediate: true
    })
    public updateObject() {
        this.$emit('input', this.entity)
    }

    public created() {
        this.entity = this.value
        this.userInputs = Object.assign(this.userInputs, this.inputs)
    }
}
</script>

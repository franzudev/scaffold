<template>
  <div
    class="form-group col"
    :class="customSize"
  >
    <label :for="key">{{ key }}{{ required ? '*' : '' }}</label>
    <multiselect
      :id="key"
      v-model="entity[slot]"
      :options="list"
      placeholder="Scegli opzione"
      :multiple="multiple"
      open-direction="bottom"
      :track-by="track_by"
      :max="4"
      :label="label"
      :class="{'border border-danger rounded': errorSlot}"
    />
    <small
      v-if="errorSlot"
      class="form-text text-danger"
    >{{ errorSlot[0] }}</small>
  </div>
</template>

<script lang="ts">
import { Component } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInputMixin from "$mixins/FormInput";

@Component({
    name: 'FormMultiselect'
})
export default class FormMultiselect extends mixins(FormInputMixin) {
    public list: Object[] = []

    created() {
        this.getEntity();
    }

    public getEntity() {
        if (this.api){
            this.api.all()
                .then((response: any)  => {
                    this.list = response
                })
        }
    }

    public get errorSlot() {
        return this.errors[this.slot] || this.errors[this.slot + '_id'];
    }
}
</script>

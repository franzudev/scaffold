<template>
  <div
    class="form-group"
    :class="customSize"
  >
    <label>{{ key }}{{ required ? '*' : '' }}</label><br>
    <div class="custom-file">
      <input
        id="file"
        ref="file"
        type="file"
        class="custom-file-input"
        @change="handleFileUpload()"
      >
      <label
        class="custom-file-label"
        for="file"
      >{{ label }}</label>
    </div>
  </div>
</template>

<script lang="ts">
import { Component } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInputMixin from "$mixins/FormInput";
import { VueEditor } from "vue2-editor";

@Component({
    name: 'FormDownload',
    components: { VueEditor }
})
export default class FormDownload extends mixins(FormInputMixin) {
    public label: string = "Scegli un file"

    public created() {
        let obj = this.entity[this.slot]
        if (obj && obj[0]){
            let file = obj[0].file.split("/");
            this.label = file[file.length - 1];
        }
    }

    public handleFileUpload(){
        this.label = (<any>this.$refs).file.files[0].name
        this.entity[this.slot] = (<any>this.$refs).file.files[0];
    }
}
</script>

<style scoped>
.custom-file-label::after {
    content: "Scegli";
}
</style>

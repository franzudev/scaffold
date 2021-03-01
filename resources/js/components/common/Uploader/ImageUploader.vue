<template>
  <div
    class="col position-relative"
    style="height: 305px"
    :key="refresh"
  >
    <transition name="slide-fade">
      <vue2-dropzone
        v-if="!entity[sl][key]"
        :id="`dropzoneMultiple${key}`"
        :ref="`myVueDropzone${key}`"
        class="position-absolute"
        style="left: 0; right: 0; height: 300px;"
        :options="configImage"
        @vdropzone-success="dropzoneSuccess($event, sl)"
        @vdropzone-queue-complete="dropzoneQueueComplete"
        @vdropzone-file-added="$emit('disable-actions', true)"
        @vdropzone-error="dropzoneError"
      />
      <div
        v-else
        class="position-absolute"
        style="top:0; left: 0; height: 305px;"
      >
        <img
          class="img-fluid"
          style="max-height: 300px;"
          :src="imageUrl"
          alt="immagine"
        >
        <div
          class="position-absolute"
          style="top: 0; left: 0;"
        >
          <button
            class="btn btn-outline-danger"
            @click="change"
          >
            <i class="fas fa-trash-alt" />
          </button>
        </div>
      </div>
    </transition>
    <div class="clearfix" />
  </div>
</template>

<script lang="ts">
import { Component, Prop } from 'vue-property-decorator'
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import { mixins } from "vue-class-component";
import FormInput from "$mixins/FormInput";


@Component({
    name: 'ImageUploader',
    components: { vue2Dropzone }
})
export default class ImageUploader extends mixins(FormInput) {
    @Prop({ required: true }) sl!: any
    public changeImage: boolean = false
    public uploaded: boolean = false
    public refresh: number = 0;

    public get imageUrl() {
        if (this.isNew || (!this.isNew && this.uploaded)) {
            return `/storage/${this.entity[this.sl][<number>this.key].photo}`
        }
        if (!this.isNew)
            return `/storage/${this.entity[this.sl][<number>this.key].photo}`
        return ''
    }

    public dropzoneSuccess(event: any, property: string) {
        (<any>this.entity)[property][<number>this.key] = { photo: event.xhr.response }
        this.refresh++;
        this.uploaded = true
    }

    public dropzoneQueueComplete(event: any, property: string) {
        this.$emit('disable-actions', false)
        this.changeImage = false
        this.refresh++;
    }

    public change() {
        this.entity[this.sl][<number>this.key] = null;
        this.changeImage = true
        this.uploaded = false
        this.refresh++;
    }

    public dropzoneError(file: any, message: any, xhr: any) {
        this.toastError(message)
    }
}
</script>

<style scoped>

</style>

<template>
  <div
    class="position-relative"
    :class="customSize"
  >
    <label :for="key">{{ key }}{{ required ? '*' : '' }}</label>
    <div
      v-if="configImage.maxFiles === 1"
      class="col position-relative"
      style="height: 305px"
    >
      <transition name="slide-fade">
        <vue2-dropzone
          v-if="!entity[slot] || changeImage"
          id="dropzone"
          ref="myVueDropzone"
          class="position-absolute"
          style="left: 0; right: 0; height: 300px;"
          :options="configImage"
          @vdropzone-success="dropzoneSuccess($event, slot)"
          @vdropzone-queue-complete="dropzoneQueueComplete"
          @vdropzone-file-added="$emit('disable-actions', true)"
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
              <i class="fas fa-recycle" />
            </button>
          </div>
        </div>
      </transition>
      <div class="clearfix" />
    </div>
    <div v-else>
      <image-uploader
        v-for="index in configImage.maxFiles"
        :key="index - 1"
        :sl="slot"
        :config="config"
        :config-image="configImage"
        :errors="errors"
        :is-new="isNew"
        :entity="entity"
      />
    </div>
    <!--<div
      v-if="configImage.maxFiles === 1"
      class="col position-relative"
      style="height: 305px"
    >
      <transition name="slide-fade">
        <vue2-dropzone
          v-if="!entity[slot] || changeImage"
          id="dropzone"
          ref="myVueDropzone"
          class="position-absolute"
          style="left: 0; right: 0; height: 300px;"
          :options="configImage"
          @vdropzone-success="dropzoneSuccess($event, slot)"
          @vdropzone-queue-complete="dropzoneQueueComplete"
          @vdropzone-file-added="$emit('disable-actions', true)"
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
              <i class="fas fa-recycle" />
            </button>
          </div>
        </div>
      </transition>
      <div class="clearfix" />
    </div>-->
  </div>
</template>

<script lang="ts">
import { Component } from 'vue-property-decorator'
import { mixins } from "vue-class-component";
import FormInput from "$mixins/FormInput";
import ImageUploader from "$common/Uploader/ImageUploader.vue";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'


@Component({
    name: 'FormImage',
    components: { ImageUploader, vue2Dropzone },
})
export default class FormImage extends mixins(FormInput) {
    public changeImage: boolean = false
    public uploaded: boolean = false
    public refresh: number = 0;

    public get imageUrl() {
          if (this.isNew || (!this.isNew && this.uploaded)) {
              return `/storage/${this.entity[this.slot]}`
          }
          if (!this.isNew) {
              return this.entity.image_url
          }
          return ''
    }

    public dropzoneSuccess(event: any, property: string) {
        if (this.configImage.maxFiles > 1)
            (<any>this.entity)[property][<number>this.key] = event.xhr.response
        else
            (<any>this.entity)[property] = event.xhr.response
        this.uploaded = true
    }
    public dropzoneQueueComplete(event: any, property: string) {
        this.$emit('disable-actions', false)
        this.changeImage = false
        this.refresh++;
    }

    public change() {
        if (this.configImage.maxFiles > 1)
            this.entity[this.slot][<number>this.key].photo = '';
        else
            this.entity[this.slot] = ''
        this.changeImage = true
        this.uploaded = false
    }
}
</script>

<style scoped>
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 1s 0.2s;
}
.slide-fade-enter, .slide-fade-leave-active
    /* .slide-fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
.slide-fade-enter {
    transform: translateX(100px);
}
.slide-fade-leave-active {
    transform: translateX(-100px);
}
</style>

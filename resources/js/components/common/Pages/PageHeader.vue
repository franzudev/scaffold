<template>
  <div class="card-header px-0 mt-2 bg-transparent clearfix">
    <h4 class="float-left pt-2">
      {{ title }}
    </h4>
    <div class="card-header-actions mr-1">
      <slot name="buttons"></slot>
    </div>
  </div>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'

@Component({
    name: 'page-header'
})
export default class PageHeader extends Vue {
    @Prop({ required: true }) title!: string
}
</script>

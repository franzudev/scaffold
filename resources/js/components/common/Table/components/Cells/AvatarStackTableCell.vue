<template>
  <div class="avatars-stack">
    <div
      v-for="(entity, index) in entities.slice(0,4)"
      :key="index"
      class="avatar-sm"
    >
      <img
        class="img-avatar"
        :src="entity.image_url"
        alt="avatar"
      >
    </div>
    <div
      v-if="entities.length > 4"
      class="avatar-sm ml-3"
    >
      +{{ entities.length - 4 }}
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'

@Component({
    name: 'AvatarStackTableCell'
})
export default class AvatarStackTableCell extends Vue {
    @Prop({ required: true }) entities!: any[]
}
</script>

<style scoped>

</style>

<template>
  <div class="media">
    <div class="avatar float-left mr-3">
      <img
        class="img-avatar"
        :src="entity['image_url']"
        alt="avatar"
      >
      <span class="avatar-status badge-success" />
    </div>
    <div class="media-body">
      <div>{{ entity[cell['dbName']] }}</div>
      <div class="small text-muted">
        {{ entity['email'] }}
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'
import TCell from "$types/TableCell";

@Component({
    name: 'avatar-table-cell'
})
export default class AvatarTableCell extends Vue {
    @Prop({ required: true }) entity!: Object
    @Prop({ required: true }) cell!: TCell
}
</script>

<template>
  <div>
    {{ title }}
    <small class="text-muted float-right">{{ entitiesLenght }} di {{ entitiesCount }}</small>
    <div
      class="progress"
      style="height: 4px;"
    >
      <div
        class="progress-bar bg-info"
        role="progressbar"
        :style="`width: ${entitiesLenght * 100 / entitiesCount}%`"
        :aria-valuenow="entitiesLenght * 100 / entitiesCount"
        aria-valuemin="0"
        :aria-valuemax="entitiesCount"
      />
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'
import TCell from "$types/TableCell";


@Component({
    name: 'ProgressTableCell'
})
export default class ProgressTableCell extends Vue {
    @Prop({ default: 'Livello' }) title!: string
    @Prop({ required: true }) entity!: any
    @Prop({ required: true }) cell!: TCell

    get entitiesLenght() {
        return this.entity[this.cell.dbName].length
    }

    get entitiesCount() {
        return this.entity[this.cell.comparison]
    }
}
</script>

<style scoped>

</style>

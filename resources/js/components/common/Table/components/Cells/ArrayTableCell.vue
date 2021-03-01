<template>
  <div>
    <span
      v-for="(val, key) in elements"
      :key="key"
    >
      {{ val[valueLabel] }}{{ (key === elements.length - 1) ? '' : ',' }}
    </span>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'

@Component({
    name: 'array-table-cell'
})
export default class ArrayTableCell extends Vue {
    @Prop({ required: true }) entity!: any
    @Prop({ required: true }) cell!: any

    public elements: string[] = []
    public arrayLabel: string = ''
    public valueLabel: string = ''

    public created() {
        let labels = this.cell.dbName.split('.')
        this.arrayLabel = labels[0]
        this.valueLabel = labels[1]
        this.elements = this.entity[this.arrayLabel]
    }

}
</script>

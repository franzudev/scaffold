<template>
  <span>{{ cellValue }}</span>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'
import TCell from "$types/TableCell";


@Component({
    name: 'TextTableCell'
})
export default class TextTableCell extends Vue {
    @Prop({ required: true }) entity!: any
    @Prop({ required: true }) cell!: TCell

    public get cellValue() {
        if (this.entity[this.cell.dbName].length > 20)
            return this.entity[this.cell.dbName].slice(0, 40) + '...';
        return this.entity[this.cell.dbName];
    }
}
</script>

<style scoped>

</style>

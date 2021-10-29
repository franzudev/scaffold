<template>
  <avatar-table-cell
    v-if="cell.type === 'avatar'"
    :entity="entity"
    :cell="cell"
  />
  <avatar-stack-table-cell
    v-else-if="cell.type === 'avatar-stack'"
    :entities="entity[cell.dbName]"
  />
  <progress-table-cell
    v-else-if="cell.type === 'progress-bar'"
    :entity="entity"
    :cell="cell"
  />
  <date-table-cell
    v-else-if="cell.type === 'date'"
    :cell-value="cellValue"
  />
  <action-table-cell
    v-else-if="cell.type === 'actions'"
    :cell="cell"
    :entity-id="entity['id']"
  />
  <array-table-cell
    v-else-if="cell.type === 'array'"
    :entity="entity"
    :cell="cell"
  />
  <text-table-cell
    v-else-if="cell.type === 'long-text'"
    :entity="entity"
    :cell="cell"
  />
  <span v-else>{{ cellValue }}</span>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'
import TCell from '$types/TableCell'
import AvatarTableCell from "$components/common/Table/components/Cells/AvatarTableCell.vue";
import DateTableCell from "$components/common/Table/components/Cells/DateTableCell.vue";
import ActionTableCell from "$components/common/Table/components/Cells/ActionTableCell.vue";
import ArrayTableCell from "$components/common/Table/components/Cells/ArrayTableCell.vue";
import AvatarStackTableCell from "$components/common/Table/components/Cells/AvatarStackTableCell.vue";
import ProgressTableCell from "$components/common/Table/components/Cells/ProgressTableCell.vue";
import TextTableCell from "$common/Table/components/Cells/TextTableCell.vue";

@Component({
    name: 'table-cell',
    components: {
        TextTableCell,
        ProgressTableCell,
        AvatarStackTableCell,
        ArrayTableCell,
        ActionTableCell,
        DateTableCell,
        AvatarTableCell
    }
})
export default class TableCell extends Vue {
    @Prop({ required: false }) cell?: TCell
    @Prop({ required: false }) entity?: any

    get cellValue() {
        let value: any = this.cell!.dbName
        if (value.indexOf('.') !== -1) {
            value = value.split('.')
            if (this.entity[value[0]]) {
                return this.entity[value[0]][value[1]]
            }
            return null
        }
        return this.entity[value]
    }
}
</script>

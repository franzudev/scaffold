<template>
  <tbody v-if="!loading">
    <table-row
      v-for="(entity) in entities"
      :key="entity.id"
      :columns="columns"
      :head="false"
      :entity-name="entityName"
    >
      <template #column="{column}">
        <table-cell
          :cell="column"
          :entity="entity"
        />
      </template>
    </table-row>
  </tbody>
  <tbody v-else>
    <tr>
      <td colspan="5">
        <content-placeholders>
          <content-placeholders-text />
        </content-placeholders>
      </td>
    </tr>
  </tbody>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'
import TableCell from "$components/common/Table/components/TableCell.vue";
import TableRow from "$components/common/Table/components/TableRow.vue";

@Component({
    name: 'table-body',
    components: { TableRow, TableCell }
})
export default class TableBody extends Vue {
    @Prop({ required: true }) entities!: Object[]
    @Prop({ required: true }) columns!: Object[]
    @Prop({ required: true }) entityName!: string
    @Prop({ required: true }) loading!: boolean
}
</script>

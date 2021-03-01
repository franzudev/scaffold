<template>
  <tbody>
    <table-row
      v-for="(entity) in entities"
      :key="entity.id"
      :columns="columns"
      :head="false"
      :edit-entity="editEntity"
    >
      <template #column="{column}">
        <table-cell
          :cell="column"
          :entity="entity"
        />
      </template>
    </table-row>
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
    @Prop({ required: true }) editEntity!: Function
    @Prop({ required: true }) sort?: Function
}
</script>

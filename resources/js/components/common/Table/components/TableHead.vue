<template>
  <thead>
    <table-row
      :columns="columns"
      :head="true"
    >
      <template #column="{column}">
        <filterable-head
          :column="column"
          :orderable="column.orderable"
          :filters="filters"
        />
      </template>
    </table-row>
  </thead>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'
import TableRow from "$components/common/Table/components/TableRow.vue";
import FilterableHead from "$components/common/Table/components/FilterableHead.vue";

@Component({
    name: 'table-head',
    components: { FilterableHead, TableRow }
})
export default class TableHead extends Vue {
    @Prop({ required: true }) columns!: Object[]
    @Prop({ required: true }) filters!: Object
}
</script>

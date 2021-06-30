<template>
  <table class="table table-hover">
    <table-head
      :columns="columns"
      :sort="sort"
      :filters="filters"
    />
    <table-body
      :entities="entities"
      :columns="columns"
      :loading="loading"
      :sort="sort"
      :edit-entity="editEntity"
    />
  </table>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'
import TableBody from "$components/common/Table/components/TableBody.vue";
import TableHead from "$components/common/Table/components/TableHead.vue";

@Component({
    name: 'MyTable',
    components: {
        TableHead,
        TableBody
    }
})
export default class MyTable extends Vue {
    @Prop({ required: true }) loading!: boolean
    @Prop({ required: true }) columns!: Object[]
    @Prop({ required: true }) entities!: Object[]
    @Prop({ required: true }) filters!: Object
    @Prop({ required: true }) sort!: Function
    @Prop({ required: true }) editEntity!: Function
}
</script>

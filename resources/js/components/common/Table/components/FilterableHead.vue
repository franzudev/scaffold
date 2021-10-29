<template>
  <a
    v-if="column.orderable"
    href="#"
    @click.prevent="$bus.emit('sort', column.dbName)"
  >
    {{ column.name.charAt(0).toUpperCase() + column.name.slice(1) }}
    <i
      class="mr-1 fas"
      :class="resClass"
    />
  </a>
  <span v-else>
    {{ column.name }}
  </span>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'
import Filter from "$types/Filter";
import TCell from "$types/TableCell";

@Component({
    name: 'filterable-head'
})
export default class FilterableHead extends Vue {
    @Prop({ required: true }) column!: TCell
    @Prop({ required: true }) filters!: Filter

    public get resClass() {
        return {
            'fa-long-arrow-alt-down': this.filters.orderBy.column == this.column.dbName && this.filters.orderBy.direction == 'asc',
            'fa-long-arrow-alt-up': this.filters.orderBy.column == this.column.dbName && this.filters.orderBy.direction == 'desc'
        }
    }
}
</script>

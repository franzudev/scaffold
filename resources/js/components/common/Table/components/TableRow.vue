<template>
  <tr>
    <template v-if="head">
      <th
        v-for="(column, key) in columns"
        :key="key"
        :class="column.class"
      >
        <slot
          name="column"
          :column="column"
        >
          {{ column.name }}
        </slot>
      </th>
    </template>
    <template v-else>
      <td
        v-for="(column, key) in columns"
        :key="key"
        :class="column.class"
        @click="updateEntity"
      >
        <slot
          name="column"
          :column="column"
        >
          {{ column.name }}
        </slot>
      </td>
    </template>
  </tr>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'

@Component({
    name: "table-row"
})
export default class TableRow extends Vue {
    @Prop({ required: true }) columns!: Object[]
    @Prop({ required: true }) head!: boolean
    @Prop({ required: false }) entityName!: string

    public updateEntity() {
        if (this.$screen.width >= 768 || !this.entityName)
            return ;
        this.$bus.emit(`update-${this.entityName}`, this.$vnode.key)
    }
}
</script>

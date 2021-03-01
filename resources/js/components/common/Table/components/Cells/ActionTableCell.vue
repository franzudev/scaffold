<template>
  <div>
    <a
      v-for="(icon, key) in cell.icons"
      :key="key"
      href="#"
      class="text-muted text-decoration-none hover-action ml-1"
      :title="icon.title"
      @click="bus.emit(icon.event, entityId)"
    >
      <i :class="icon.class" />
    </a>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'
import { emitter } from "../../../../../services/EventBus";

@Component({
    name: 'action-table-cell'
})
export default class ActionTableCell extends Vue {
    @Prop({ required: true }) cell!: Object
    @Prop({ required: true }) entityId!: number

    get bus() {
        return emitter
    }
}
</script>

<style scoped lang="scss">
.hover-action:hover {
  i {
    transform: scale(1.1);
  }
}

.hover-action {
  i {
    transition: transform ease-in-out 50ms;
  }
}
</style>

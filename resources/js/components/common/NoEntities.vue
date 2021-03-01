<template>
  <div class="no-items-found text-center mt-5">
    <i class="icon-magnifier fa-3x text-muted" />
    <p class="mb-0 mt-3">
      <strong>Non ci sono elementi</strong>
    </p>
    <p class="text-muted">
      Prova a cambiare i filtri {{ buttonText || entityUrl ? 'o aggiungine uno' : ''}}
    </p>
    <a
      class="btn btn-success"
      :href="entityUrl"
      role="button"
    >
      <i class="fa fa-plus" />&nbsp;{{ buttonText }}
    </a>
  </div>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'

@Component({})
export default class NoEntities extends Vue {
    @Prop({ required: true }) entityUrl!: string
    @Prop({ required: true }) buttonText!: string
}
</script>

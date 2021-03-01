<template>
  <div class="card-header px-0 mt-2 bg-transparent clearfix">
    <h4 class="float-left pt-2">
      {{ isNew ? `Nuov${postfix} ${entity}` : `Modifica ${entity}` }}
    </h4>
    <div
      v-if="isNew"
      class="card-header-actions mr-1"
    >
      <button
        class="btn btn-primary"
        :disabled="submiting || disableAction"
        @click.prevent="$emit('save')"
      >
        <i
          v-if="submiting"
          class="fas fa-spinner fa-spin"
        />
        <i
          v-else
          class="fas fa-check"
        />
        <span class="ml-1">Salva</span>
      </button>
    </div>

    <div
      v-else
      class="card-header-actions mr-1 cursor-pointer"
    >
      <button
        class="btn btn-primary"
        :disabled="submiting || disableAction"
        @click.prevent="$emit('save')"
      >
        <i
          v-if="submiting"
          class="fas fa-spinner fa-spin"
        />
        <i
          v-else
          class="fas fa-check"
        />
        <span class="ml-1">Salva</span>
      </button>
      <a
        class="card-header-action ml-1"
        :disabled="submitingDestroy || disableAction"
        @click.prevent="$emit('destroy')"
      >
        <i
          v-if="submitingDestroy"
          class="fas fa-spinner fa-spin"
        />
        <i
          v-else
          class="far fa-trash-alt"
        />
        <span class="d-md-down-none ml-1">Cancella</span>
      </a>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'

@Component({
    name: 'FormActions'
})
export default class FormActions extends Vue {
    @Prop({ required: true }) loading!: boolean
    @Prop({ required: true }) submiting!: boolean
    @Prop({ required: true }) submitingDestroy!: boolean
    @Prop({ required: true }) disableAction!: boolean
    @Prop({ required: true }) entity!: string
    @Prop({ default: 'o' }) postfix!: string

    public get isNew() {
        return location.href.includes('create')
    }
}
</script>

<style scoped>
.cursor-pointer {
    cursor: pointer;
}
</style>

<template>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <select class="custom-select" id="inputGroupSelect01" v-model="type">
                <option v-for="option in options" :value="option[0]">{{option[1]}}</option>
            </select>
        </div>
        <input type="text" class="form-control" placeholder="Ricerca" v-model.trim="value"
               @keyup.enter="$emit('filter')">
    </div>
</template>

<script lang="ts">
import { Prop, Component, Vue, Watch } from 'vue-property-decorator'

@Component({
  name: 'search'
})
export default class Search extends Vue {
  @Prop({required: true}) searchFor!: string
  @Prop({required: true}) searchValue!: string
  @Prop({required: true}) options!: string[]

  private type: string = this.searchFor
  private value: string = this.searchValue

  @Watch('type')
  onTypeChange(val: string) {
    this.value = '';
    this.$emit('type-changed', val)
  }

  @Watch('value', { immediate: true })
  onValueChange(val: string) {
    this.$emit('value-changed', val)
  }
}
</script>

<template>
  <span><small>{{ cellValue | moment("LL") }}</small> - <small class="text-muted">{{ cellValue | moment("LT") }}</small></span>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'

@Component({
    name: 'date-table-cell'
})
export default class DateTableCell extends Vue {
    @Prop({ required: true }) cellValue!: any
}
</script>


<template>
    <div class="row justify-content-between">
        <div class="col-7 col-md-8 position-relative">
            <div class="d-flex align-items-center">
                <search
                    :search-for="filters.search.for"
                    :search-value="filters.search.value"
                    :options="searchOptions"
                    @value-changed="filters.search.value = arguments[0]"
                    @type-changed="filters.search.for = arguments[0]"
                    @filter="filter"
                />
            </div>
        </div>
        <slot name="extra-filters"></slot>
        <div class="col-auto">
            <multiselect
                v-model="filters.pagination.per_page"
                :options="[25,50,100,200]"
                :searchable="false"
                :show-labels="false"
                :allow-empty="false"
                @select="changeSize"
                placeholder="Search">
            </multiselect>
        </div>
    </div>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'
import Filter from "$types/Filter";
import Search from "$components/common/Search/Search.vue";
import ExportExcel from "$components/common/Table/components/ExportExcel.vue";

@Component({
  name: 'search-header',
  components: { ExportExcel, Search  }
})
export default class SearchHeader extends Vue {
  @Prop({required:true}) filters!: Filter
  @Prop({required:true}) searchOptions!: string[]
  @Prop({required:true}) changeSize!: Function
  @Prop({required:true}) filter!: Function
  @Prop({default:false}) excelSupport!: Boolean
}
</script>

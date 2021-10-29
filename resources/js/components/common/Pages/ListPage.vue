<template>
  <div class="container">
    <slot name="header"/>
    <div class="card-body px-0">
      <search-header
        :filters="filters"
        :search-options="searchOptions"
      >
        <template #extra-filters>
          <export-excel
            v-if="excelSupport"
            :rows="entities"
            :per-page="filters.pagination.per_page"
            :total-rows="filters.pagination.total"
            :header="excelHeader"
            :data-table="excelData"
            :change-size="changeSize"
          />
        </template>
      </search-header>
      <my-table
        :columns="columns"
        :loading="loading"
        :filters="filters"
        :entities="entities"
        :entity-name="entityName"
      />
      <filters-pagination
        v-if="!loading && filters.pagination.total > 0"
        :filters="filters"
      />
      <no-entities
        v-if="!loading && !entities.length > 0"
        :entity-url="`/${entityName}/create`"
        :button-text="entityNewButton"
      />
    </div>
  </div>
</template>

<script lang="ts">
import { Prop, Component } from 'vue-property-decorator'
import Filter from "$mixins/Filter"
import TCell from "../../../@types/TableCell";
import { mixins } from "vue-class-component";
import { AxiosError } from "axios";
import SearchHeader from "$components/common/Search/SearchHeader.vue";
import MyTable from "$components/common/Table/Index.vue";
import ExportExcel from "$components/common/Table/components/ExportExcel.vue";
const FiltersPagination = () => import("$components/common/Table/components/FiltersPagination.vue");

@Component({
    name: 'list-page',
    components: {
        FiltersPagination,
        ExportExcel,
        MyTable,
        SearchHeader
    },
})
export default class ListPage extends mixins(Filter) {
    @Prop({ required: true }) entities!: any[]
    @Prop({ required: true }) searchOptions!: string[]
    @Prop({ required: true }) columns!: TCell[]
    @Prop({ required: true }) entityName!: string
    @Prop({ required: true }) entityNewButton!: string
    @Prop({ required: true }) retrieveEntity!: Function
    @Prop({ default: () => [] }) excelHeader!: string[]
    @Prop({ default: () => null }) excelData!: Function
    @Prop({ default: () => false }) persistSearch!: boolean

    public get capitalizedEntity() {
        return this.entityName.charAt(0).toUpperCase() + this.entityName.slice(1)
    }

    public get filtersKey() {
        return `filtersTable${this.capitalizedEntity}`
    }

    public get excelSupport() {
        return this.excelHeader.length > 0 && this.excelData !== null
    }

    public created() {
        this.$bus.on('filter', this.filter)
        this.$bus.on('sort', this.sort as any)
        this.$bus.on('change-page', this.changePage as any)
        this.$bus.on('change-size', this.changeSize as any)
        try {
            this.initFilters(this.filtersKey, this.searchOptions[0][0])
        } catch (e) {
            this.initFilters(this.filtersKey)
        }
    }

    public destroyed() {
        this.$bus.off('filter', this.filter)
        this.$bus.off('sort', this.sort as any)
        this.$bus.off('change-page', this.changePage as any)
        this.$bus.off('change-size', this.changeSize as any)
    }

    public getEntity() {
        this.loading = true

        if (this.persistSearch)
          localStorage.setItem(this.filtersKey, JSON.stringify(this.filters));

        return this.retrieveEntity(this.filters)
            .then((pagination: any) => {
                this.filters.pagination = pagination
            })
            .catch((error: AxiosError) => console.log(error))
            .finally(() => (this.loading = false))
    }
}
</script>

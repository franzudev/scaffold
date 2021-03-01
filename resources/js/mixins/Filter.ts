import Vue from 'vue';
import Filter from '$types/Filter';
import Component from "vue-class-component";

@Component
export default class FilterMixin extends Vue{
  public filters: Filter = {
    pagination: {
      from: 0,
      to: 0,
      total: 0,
      per_page: 25,
      current_page: 1,
      last_page: 0
    },
    orderBy: {
      column: 'id',
      direction: 'asc'
    },
    search: {
      for: 'name',
      value: ''
    }
  }

  public loading: Boolean = true

  getEntity() {
    return
  }

  initFilters(entity: string, filter: string = 'name') {
    if (localStorage.getItem(entity)) {
      this.filters = JSON.parse(localStorage.getItem(entity)!)
    } else {
      this.filters.search.for = filter
      localStorage.setItem(entity, JSON.stringify(this.filters));
    }
    this.getEntity()
  }

  // filters
  filter() {
    this.filters.pagination.current_page = 1
    this.getEntity()
  }
  changeSize (perPage: number) {
    this.filters.pagination.current_page = 1
    this.filters.pagination.per_page = perPage
    return this.getEntity()
  }
  sort (column: string) {
    if(column == this.filters.orderBy.column) {
      this.filters.orderBy.direction = this.filters.orderBy.direction == 'asc' ? 'desc' : 'asc'
    } else {
      this.filters.orderBy.column = column
      this.filters.orderBy.direction = 'asc'
    }

    this.getEntity()
  }
  changePage (page: number) {
    this.filters.pagination.current_page = page
    this.getEntity()
  }
}




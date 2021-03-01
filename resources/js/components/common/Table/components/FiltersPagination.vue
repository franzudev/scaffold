<template>
  <div class="row">
    <div class="col pt-2">
      {{ filters.pagination.from }}-{{ filters.pagination.to }} di {{ filters.pagination.total }}
    </div>
    <div
      v-if="filters.pagination.last_page>1"
      class="col"
    >
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end">
          <li
            class="page-item"
            :class="{'disabled': filters.pagination.current_page <= 1}"
          >
            <a
              class="page-link"
              href="#"
              @click.prevent="changePage(filters.pagination.current_page - 1)"
            ><i
              class="fas fa-angle-left"
            /></a>
          </li>
          <li
            v-for="(page, key) in filters.pagination.last_page"
            :key="key"
            class="page-item"
            :class="{'active': filters.pagination.current_page === page}"
          >
            <span
              v-if="filters.pagination.current_page === page"
              class="page-link"
            >{{ page }}</span>
            <a
              v-else
              class="page-link"
              href="#"
              @click.prevent="changePage(page)"
            >{{ page }}</a>
          </li>
          <li
            class="page-item"
            :class="{'disabled': filters.pagination.current_page >= filters.pagination.last_page}"
          >
            <a
              class="page-link"
              href="#"
              @click.prevent="changePage(filters.pagination.current_page + 1)"
            ><i
              class="fas fa-angle-right"
            /></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script lang="ts">
import { Prop, Component, Vue } from 'vue-property-decorator'
import Filter from "$types/Filter";

@Component({
    name: "filters-pagination"
})
export default class FiltersPagination extends Vue {
    @Prop({ required: true }) filters!: Filter
    @Prop({ required: true }) changePage!: Function
}
</script>

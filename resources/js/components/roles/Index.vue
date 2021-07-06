<template>
  <list-page
    :search-options="searchOptions"
    :columns="columns"
    :entities="roles"
    :edit-entity="editRole"
    entity-name="roles"
    entity-new-button="Nuovo Ruolo"
    :retrieve-entity="getEntity"
  >
    <template #header>
      <page-header
        title="Ruoli"
      >
        <template #buttons>
          <a
            class="btn btn-success"
            href="/roles/create"
          >Nuovo Ruolo</a>
        </template>
      </page-header>
    </template>
  </list-page>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
import Filter from "$types/Filter";
import Role from '$types/entities/Role';
import roleTable from '$components/roles/table'
import { AxiosResponse } from "axios";
const ListPage = () =>  import(/* webpackPrefetch: true */ "$components/common/Pages/ListPage.vue");
const PageHeader = () =>  import(/* webpackPrefetch: true */ "$components/common/Pages/PageHeader.vue");
import Roles from "$api/Roles";

@Component({
    components: { PageHeader, ListPage }
})
export default class IndexRole extends Vue {
    public roles: Role[] = []
    public columns: Object[] = roleTable
    public permissionsCount = 0
    public searchOptions: any = [
        ['name', 'Ruolo'],
    ]

    created() {
        this.$bus.on('update-role', this.editRole as any)
    }

    destroyed() {
        this.$bus.off('update-role', this.editRole as any)
    }

    getEntity(filters: Filter) {
        this.roles = []

        localStorage.setItem('filtersTableRoles', JSON.stringify(filters));

        return Roles.list(filters)
            .then((response: AxiosResponse) => {
                this.roles = response.data
                delete response.data
                return response
            })
    }

    editRole(roleId: number) {
        location.href = `/roles/${roleId}/edit`
    }
}
</script>

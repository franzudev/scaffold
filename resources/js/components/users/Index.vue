<template>
  <list-page
    :search-options="searchOptions"
    :columns="columns"
    :entities="users"
    :edit-entity="editUser"
    entity-name="users"
    entity-new-button="Nuovo Utente"
    :persist-search="true"
    :retrieve-entity="getEntity"
    :excel-data="excelDataFilter"
    :excel-header="excelHeader"
  >
    <!--    for excel export-->
    <template #header>
      <page-header
        title="Utenti"
      >
        <template #buttons>
          <a
            class="btn btn-success"
            href="/users/create"
          >Nuovo utente</a>
        </template>
      </page-header>
    </template>
  </list-page>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
import Users from "$api/Users"
import userTable from "$components/users/table"
import { AxiosResponse } from "axios";
const ListPage = () => import(/* webpackPrefetch: true */ "$components/common/Pages/ListPage.vue")
const PageHeader = () => import(/* webpackPrefetch: true */ "$components/common/Pages/PageHeader.vue");
import Filter from '$types/Filter';
import User from "$types/entities/User";
import TCell from "$types/TableCell";

@Component({
    components: { PageHeader, ListPage },
})
export default class UsersIndex extends Vue {
    public users: User[] = []
    public columns: TCell[] = userTable
    public searchOptions: Array<Array<String>> = [
        ['username', 'Utente'],
        ['email', 'Email']
    ]

    public get excelHeader() {
        return [
            'Nome',
            'Email',
            'Registrato il'
        ]
    }

    public excelDataFilter(u: User) {
        return [
            u.username,
            u.email,
            this.$moment(u.created_at).format("LL")
        ]
    }

    created() {
        this.$bus.on('update-users', this.editUser as any)
    }

    destroyed() {
        this.$bus.off('update-users', this.editUser as any)
    }

    public getEntity(filters: Filter) {
        this.users = []

        return Users.list(filters)
            .then((response: AxiosResponse) => {
                this.users = response.data;
                delete response.data;
                return response
            })
    }

    public editUser(userId: number) {
        location.href = `/users/${userId}/edit`
    }

}
</script>

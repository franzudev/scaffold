<template>
  <list-page
    :search-options="searchOptions"
    :columns="columns"
    :entities="users"
    :edit-entity="editUser"
    entity-name="users"
    entity-new-button="Nuovo Utente"
    :retrieve-entity="getEntity"
  >
    <!--    for excel export-->
    <!--    :excel-data="excelDataFilter"-->
    <!--    :excel-header="excelHeader"-->
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
import ListPage from "$components/common/Pages/ListPage.vue";
import PageHeader from "$components/common/Pages/PageHeader.vue";
import Filter from '$types/Filter';
import { emitter } from "../../services/EventBus";
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
            u.created_at
        ]
    }

    created() {
        this.emit.on('update-user' as any, this.editUser as any)
    }

    get emit() {
        return emitter
    }

    public getEntity(filters: Filter) {
        this.users = []

        localStorage.setItem('filtersTableUsers', JSON.stringify(filters));

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

# list-page

Component used principally for the Index.vue of any entity.

### Example usage
```vue
<template>
  <list-page
    :search-options="searchOptions"
    :columns="columns"
    :entities="users"
    :edit-entity="editUser"
    entity-name="users"
    entity-new-button="Nuovo Utente"
    :persist-search="false"
    :retrieve-entity="getEntity"
    :excel-data="excelDataFilter"
    :excel-header="excelHeader"
  >
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

```

## Props

<!-- @vuese:list-page:props:start -->
|Name|Description|Type|Required|Default|
|---|---|---|---|---|
|entities|The entities|any[]|`true`|-|
|searchOptions|Filters for the generated table, with label of the filter and the db column mapping ['name', 'Nome']|Array[Array[String]]|`true`|-|
|columns|The columns to be generated|TCell[]|`true`|-|
|entityName|The entity name|String|`true`|-|
|entityNewButton|Shows the new button when there's no entities|boolean|`true`|-|
|retrieveEntity|The function to request the entities|Function|`true`|-|
|editEntity|The function to edit the entity|Function|`true`|-|
|persistSearch|If you want to persist the search even after a refresh|boolean|`false`|false|
|excelHeader|The list of columns for the excel file NOTE both excelHeader and excelData are needed to give excel support to the table|String[]|`false`|[]|
|excelData|Function that filters the needed fields to create the excel file NOTE both excelHeader and excelData are needed to give excel support to the table|Function|`false`|null|

<!-- @vuese:list-page:props:end -->


## Slots

<!-- @vuese:list-page:slots:start -->
|Name|Description|Default Slot Content|
|---|---|---|
|header|Slot to generate the correct entitiess name and to add custom functionalities to the table header|-|

<!-- @vuese:list-page:slots:end -->



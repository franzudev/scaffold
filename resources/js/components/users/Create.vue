<template>
  <div class="container">
    <div
      v-if="!loading"
      class="row justify-content-md-center"
    >
      <div class="col-md-9 col-xl-7">
        <form-actions
          :loading="loading"
          :submiting="submiting"
          :submiting-destroy="submitingDestroy"
          :disable-action="disableAction"
          entity="utente"
          @save="saveOrCreate"
          @destroy="destroy"
        />
        <div class="card-body px-0">
          <form-generator
            v-model="user"
            :inputs="inputs"
            :errors="errors"
            :is-new="isNew"
            @disable-actions="disableAction = $event"
          />
        </div>
      </div>
    </div>
    <div
      v-else
      class="row"
    >
      <div class="col-md-12">
        <content-placeholders>
          <content-placeholders-text />
        </content-placeholders>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
import Users from "$api/Users";
import { AxiosError } from "axios";
import User from "$types/entities/User";
import Roles from "$api/Roles";
import Role from "$types/entities/Role";
import { SweetAlertResult } from "sweetalert2";
import FormGenerator from "$components/common/Forms/FormGenerator.vue";
import FormActions from "$components/common/Forms/FormActions.vue";

@Component({
    components: { FormActions, FormGenerator }
})
export default class Create extends Vue {
    private user: User = {} as User;
    public roles: Role[] = []
    public loading: boolean = true
    public submiting: boolean = false
    public submitingDestroy: boolean = false
    public disableAction: boolean = false
    public errors: any = {}

    protected created() {
        this.getRoles()
        if (!this.isNew) {
            this.getUser()
        }
    }

    public get isNew() {
        return location.href.includes('create')
    }

    public get inputs() {
        return {
            "Username": {
                type: 'text',
                slot: 'username',
                required: true,
                readonly: !this.isNew,
                size: 12
            },
            "Nome": {
                type: 'text',
                slot: 'name',
                required: true,
                size: 6,
            },
            "Cognome": {
                type: 'text',
                slot: 'surname',
                required: true,
                size: 6,
            },
            "Email": {
                type: 'email',
                slot: 'email',
                required: true,
                size: 6,
            },
            "Data di Nascita": {
                type: 'date',
                slot: 'birth_date',
                required: true,
                size: 6,
            },
            "Password": {
                type: 'password',
                slot: 'password',
                show: this.isNew,
                required: true,
                size: 6
            },
            "Conferma Password": {
                type: 'password',
                slot: 'password_confirmation',
                show: this.isNew,
                required: true,
                size: 6
            },
            "Telefono": {
                type: 'tel',
                slot: 'phone',
                required: true,
            },
            "Residenza": {
                type: 'text',
                slot: 'residence',
                required: true,
            },
            "Ruoli": {
                type: 'multiselect',
                slot: 'roles',
                required: true,
                api: Roles,
                multiOpenDirection: 'top',
                multiPlaceHolder: 'Scegli ruoli',
                label: 'display_name',
                track_by: 'id'
            }
        }
    }

    public saveOrCreate() {
        if (!this.submiting) {
            this.submiting = true
            Users.createOrUpdate(this.user, {})
                .then(() => {
                    this.toastSuccess(this.isNew ? 'Utente creato' : 'Utente aggiornato')
                    location.href = '/users'
                })
                .catch((error: AxiosError) => {
                    this.errors = error?.response!.data.errors
                    this.submiting = false
                })
        }
    }

    getUser() {
        this.loading = true
        let str = window.location.pathname
        let res = str.split("/")
        Users.byId(res[2])
            .then((response: User) => {
                this.user = response
            })
            .catch(() => {
                this.toastWarning('L\'utente non esiste...')
                location.href = '/users'
            })
            .finally(() => {
                this.loading = false
            })
    }

    public getRoles() {
        Roles.all()
            .then((response: Role[]) => {
                this.roles = response
                this.toastSuccess('Ruoli caricati');
            })
            .catch((error: AxiosError) => {
                this.errors = error.response!.data.errors
                this.toastError('Qualcosa è andato storto, riprova!')
            })
            .finally(() => {
                return this.isNew? (this.loading = false) : null
            })
    }

    destroy() {
        if (!this.submitingDestroy) {
            this.submitingDestroy = true
            this.areYouSure("Una volta cancellato non potrai recuperare questo utente!")
                .then((result: SweetAlertResult) => {
                    if (result.value) {
                        Users.delete(`${this.user.id}`)
                            .then(() => {
                                this.toastSuccess('Utente cancellato!')
                                location.href = '/users'
                            })
                            .catch((error: any) => {
                                this.errors = error.response.data.errors
                            })
                    }
                    this.submitingDestroy = false
                })
        }
    }
}
</script>

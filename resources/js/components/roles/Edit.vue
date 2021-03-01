<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-12 col-xl-9">
        <div class="card-header px-0 mt-2 bg-transparent clearfix">
          <h4 class="float-left pt-2">
            Modifica ruolo
          </h4>
          <div class="card-header-actions mr-1">
            <a
              class="btn btn-primary"
              href="#"
              :disabled="submiting"
              @click.prevent="update"
            >
              <i
                v-if="submiting"
                class="fas fa-spinner fa-spin"
              />
              <i
                v-else
                class="fas fa-check"
              />
              <span class="ml-1">Salva</span>
            </a>
            <a
              class="card-header-action ml-1"
              href="#"
              :disabled="submitingDestroy"
              @click.prevent="destroy"
            >
              <i
                v-if="submitingDestroy"
                class="fas fa-spinner fa-spin"
              />
              <i
                v-else
                class="far fa-trash-alt"
              />
              <span class="d-md-down-none ml-1">Cancella</span>
            </a>
          </div>
        </div>
        <div class="card-header px-0 bg-transparent">
          <strong>Generale</strong><br>
          <small class="text-muted">Aggiorna nome e permessi del ruolo</small>
        </div>
        <div class="card-body px-0">
          <div
            v-if="!loading"
            class="row"
          >
            <div class="form-group col-sm-9">
              <label>Nome ruolo</label>
              <input
                v-model="role.display_name"
                type="text"
                class="form-control"
                :class="{'is-invalid': errors.display_name}"
                placeholder="Admin"
                autofocus
              >
              <div
                v-if="errors.display_name"
                class="invalid-feedback"
              >
                {{ errors.display_name[0] }}
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label>ID Ruolo</label>
              <input
                v-model="role.id"
                type="text"
                class="form-control"
                readonly
              >
            </div>
            <div class="form-group col-sm-12">
              <label>Slug ruolo</label>
              <input
                v-model="role.name"
                type="text"
                class="form-control"
                :class="{'is-invalid': errors.name}"
                placeholder="admin"
                readonly
              >
              <div
                v-if="errors.name"
                class="invalid-feedback"
              >
                {{ errors.name[0] }}
              </div>
            </div>
          </div>
          <content-placeholders v-else>
            <content-placeholders-heading />
          </content-placeholders>
        </div>
        <div class="card-header px-0 bg-transparent">
          <strong>Permessi</strong><br>
          <small class="text-muted">Abilita o disabilita i permessi e consenti l'accesso alle tab.</small>
          <div class="card-header-actions">
            <div
              v-if="role.permissions"
              class="float-left mr-2 d-sm-down-none"
            >
              <small class="text-muted">{{ role.permissions.length }} di {{ permissionsCount }}</small>
              <div
                class="progress"
                style="height: 4px;"
              >
                <div
                  class="progress-bar bg-info"
                  role="progressbar"
                  :style="`width: ${role.permissions.length*100/permissionsCount}%`"
                  :aria-valuenow="role.permissions.length*100/permissionsCount"
                  aria-valuemin="0"
                  :aria-valuemax="permissionsCount"
                />
              </div>
            </div>
            <a
              class="card-header-action btn-minimize"
              href="#"
              data-toggle="collapse"
              data-target="#collapsePermissions"
              aria-expanded="true"
            >
              <i class="icon-arrow-up" />
            </a>
          </div>
        </div>
        <div
          id="collapsePermissions"
          class="card-body collapse"
        >
          <form class="form-horizontal">
            <div
              v-for="(module, index) in role.modulesPermissions"
              :key="index"
              class="form-group row"
            >
              <label class="col-md-3">
                <i
                  class="mr-2"
                  style="font-size: 22pt;"
                  :class="[module.icon]"
                />
                <strong>{{
                  module.display_name
                }}</strong>
              </label>
              <div class="col-md-9">
                <div
                  v-for="(permission, key) in module.permissions"
                  :key="key"
                  class="clearfix"
                >
                  <span>{{ permission.display_name }}</span>
                  <label class="switch switch-pill switch-outline-success-alt float-right">
                    <input
                      v-model="permission.allow"
                      class="switch-input"
                      type="checkbox"
                    >
                    <span class="switch-slider" />
                  </label>
                  <hr>
                </div>
              </div>
            </div>
          </form>
        </div>
        <content-placeholders
          v-if="loading"
          class="card-body"
        >
          <content-placeholders-heading :img="true" />
        </content-placeholders>
        <div class="card-header px-0 bg-transparent">
          <strong>Utenti</strong><br>
          <small class="text-muted">Questa è la lista degli utenti che utilizzano questo ruolo.</small>
          <div
            v-if="role.users"
            class="card-header-actions"
          >
            <small class="text-muted mr-1 d-sm-down-none">{{ role.users.length }}</small>
            <a
              class="card-header-action btn-minimize"
              href="#"
              data-toggle="collapse"
              data-target="#collapseUsers"
              aria-expanded="true"
            >
              <i class="icon-arrow-up" />
            </a>
          </div>
        </div>
        <div
          id="collapseUsers"
          class="card-body collapse"
        >
          <ul class="list-unstyled">
            <li
              v-for="(user, index) in role.users"
              :key="index"
              class="media border-bottom border-light pb-2 mb-2"
            >
              <a :href="`/users/${user.id}/edit`">
                <div class="avatar float-left mr-3">
                  <img
                    class="img-avatar"
                    :src="user.image_url"
                    alt="avatar"
                  >
                </div>
                <div class="media-body float-left">
                  <div>{{ user.name }}</div>
                  <div class="small text-muted">
                    {{ user.email }}
                  </div>
                </div>
                <div class="clearfix" />
              </a>
            </li>
          </ul>
        </div>
        <content-placeholders
          v-if="loading"
          class="card-body"
        >
          <content-placeholders-heading :img="true" />
        </content-placeholders>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue, Watch } from 'vue-property-decorator'
import Role from "../../@types/entities/Role";
import { SweetAlertResult } from "sweetalert2";
import Roles from "$api/Roles";
import Permissions from "$api/Permissions";

@Component
export default class EditRole extends Vue {
    public role: Role = {} as Role
    public permissionsCount: number = 0
    public errors: any = {}
    public loading: boolean = true
    public submiting: boolean = false
    public submitingDestroy: boolean = false

    mounted() {
        this.getPermissionsCount()
        this.getRole()
    }

    getRole() {
        this.loading = true
        let str = window.location.pathname
        let res = str.split("/")
        Roles.getModulePermissions(`/getRoleModulesPermissions/${res[2]}`)
            .then((result: Role) => {
                this.role = result
            })
            .catch(() => {
                this.toastWarning('Il ruolo non esiste...')
                location.href = '/roles'
            })
            .finally(() => {
                this.loading = false
            })
    }

    update() {
        if (!this.submiting) {
            this.submiting = true
            Roles.update(this.role.id, this.role)
                .then(() => {
                    this.toastSuccess('Ruolo aggiornato!')
                    location.href = '/roles'
                })
                .catch((error: any) => {
                    this.errors = error.response.data.errors
                    this.submiting = false
                })
        }
    }

    destroy() {
        if (!this.submitingDestroy) {
            this.submitingDestroy = true
            this.areYouSure("Una volta cancellato non potrai recuperare questo ruolo!")
                .then((result: SweetAlertResult) => {
                    if (result.value) {
                        Roles.delete(`${this.role.id}`)
                            .then(() => {
                                this.toastSuccess('Ruolo cancellato!')
                                location.href = '/roles'
                            })
                            .catch((error: any) => {
                                this.errors = error.response.data.errors
                            })
                    }
                    this.submitingDestroy = false
                })
        }
    }

    getPermissionsCount() {
        Permissions.count()
            .then((result: number) => {
                this.permissionsCount = result
            })
    }
}
</script>

<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9 col-xl-7">
        <div class="card-header px-0 mt-2 bg-transparent clearfix">
          <h4 class="float-left pt-2">
            Nuovo ruolo
          </h4>
          <div class="card-header-actions mr-1">
            <a
              class="btn btn-primary"
              href="#"
              :disabled="submiting"
              @click.prevent="create"
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
          </div>
        </div>
        <div class="card-header px-0 bg-transparent">
          <strong>Generale</strong><br>
          <small class="text-muted">Crea un nuovo ruolo e scegli i permessi.</small>
        </div>
        <div class="card-body px-0">
          <div class="form-group">
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
          <div class="form-group">
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
        <div class="card-header px-0 bg-transparent">
          <strong>Permessi</strong><br>
          <small class="text-muted">Abilita o disabilita i permessi e consenti l'accesso alle tab.</small>
        </div>
        <div class="card-body">
          <form
            v-if="!loading"
            class="form-horizontal"
          >
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
          <content-placeholders v-else>
            <content-placeholders-heading :img="true" />
            <content-placeholders-heading :img="true" />
          </content-placeholders>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue, Watch } from 'vue-property-decorator'
import { AxiosError } from "axios";
import Role from "$types/entities/Role";
import Roles from "$api/Roles";
import Modules from "$api/Modules";

@Component
export default class CreateRole extends Vue {
    public role: Role = {} as Role
    public errors: any = {}
    public loading: Boolean = true
    public submiting: Boolean = false

    @Watch('role.display_name')
    public roleDisplayName(val: string) {
        this.role.name = val.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w-]+/g, '')       // Remove all non-word chars
            .replace(/--+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');
    }

    mounted() {
        this.getModulesPermissions()
    }

    create() {
        if (!this.submiting) {
            this.submiting = true
            Roles.create(this.role)
                .then(() => {
                    this.toastSuccess('Ruolo creato!')
                    location.href = '/roles'
                })
                .catch((error: AxiosError) => {
                    this.errors = error.response?.data.errors
                    this.submiting = false
                })
        }
    }

    getModulesPermissions() {
        this.loading = true
        Modules.getPermissions('/getModulesPermissions')
            .then((result: any) => {
                this.role.modulesPermissions = result
                this.loading = false
            })
    }
}
</script>

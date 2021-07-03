<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9 col-xl-7">
        <div class="card-header px-0 mt-2 bg-transparent clearfix">
          <h4 class="float-left pt-2">
            Modifica Profilo
          </h4>
          <div class="card-header-actions mr-1">
            <a
              class="btn btn-primary"
              href="#"
              :disabled="submiting"
              @click.prevent="updateAuthUser"
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
        <div class="card-body px-0">
          <form
            v-if="!loading"
            class="form-horizontal"
          >
            <div class="form-group row justify-content-md-center">
              <div class="col-md-3">
                Avatar
              </div>
              <div class="col-md-9">
                <small class="form-text text-muted mb-3">Puoi cambiare il tuo avatar qui</small>
                <avatar :user="user" />
              </div>
            </div>
            <hr class="my-3">
            <div class="form-group row justify-content-md-center">
              <label class="col-md-3">Username</label>
              <div class="col-md-9">
                <input
                  v-model="user.username"
                  class="form-control"
                  type="text"
                  readonly
                >
              </div>
            </div>
            <div class="form-group row justify-content-md-center">
              <label class="col-md-3">Email</label>
              <div class="col-md-9">
                <input
                  v-model="user.email"
                  class="form-control"
                  :class="{'is-invalid': errors.email}"
                  type="email"
                >
                <div
                  v-if="errors.email"
                  class="invalid-feedback"
                >
                  {{ errors.email[0] }}
                </div>
              </div>
            </div>
          </form>
          <div
            v-else
            class="row justify-content-md-center"
          >
            <div class="col-md-12">
              <content-placeholders>
                <content-placeholders-heading :img="true" />
                <content-placeholders-text />
              </content-placeholders>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import avatar from './Avatar.vue'

export default {
  components: {
    avatar
  },
  data () {
    return {
      user: {},
      errors: {},
      loading: true,
      submiting: false,
    }
  },
  mounted () {
    this.getAuthUser()
  },
  methods: {
    getAuthUser () {
      this.loading = true
      axios.get(`/api/profile/getAuthUser`)
      .then(response => {
        this.user = response.data
        this.loading = false
      })
    },
    updateAuthUser () {
      if (!this.submiting) {
        this.submiting = true
        axios.put(`/user/profile-information`, this.user)
        .then(response => {
          this.errors = {}
          this.submiting = false
          this.toastSuccess('Profilo aggiornato!');
        })
        .catch(error => {
          this.errors = error.response.data.errors
          this.submiting = false
        })
      }
    }
  }
}
</script>

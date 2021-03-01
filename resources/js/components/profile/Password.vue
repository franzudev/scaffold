<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9 col-xl-7">
        <div class="card-header px-0 mt-2 bg-transparent clearfix">
          <h4 class="float-left pt-2">Modifica password</h4>
          <div class="card-header-actions mr-1">
            <a class="btn btn-primary" href="#" :disabled="submiting" @click.prevent="updatePasswordAuthUser">
              <i class="fas fa-spinner fa-spin" v-if="submiting"></i>
              <i class="fas fa-check" v-else></i>
              <span class="ml-1">Salva</span>
            </a>
          </div>
        </div>
        <div class="card-body px-0">
          <form class="form-horizontal">
            <div class="form-group row justify-content-md-center">
              <label class="col-md-3">Password corrente</label>
              <div class="col-md-9">
                <input class="form-control" :class="{'is-invalid': errors.current_password}" type="password" v-model="password.current_password">
                <small class="form-text text-muted">Devi inserire la tua password corrente per poterla cambiare.</small>
                <div class="invalid-feedback" v-if="errors.current_password">{{errors.current_password[0]}}</div>
              </div>
            </div>
            <div class="form-group row justify-content-md-center">
              <label class="col-md-3">Nuova password</label>
              <div class="col-md-9">
                <input class="form-control" :class="{'is-invalid': errors.password}" type="password" v-model="password.password">
                <div class="invalid-feedback" v-if="errors.password">{{errors.password[0]}}</div>
              </div>
            </div>
            <div class="form-group row justify-content-md-center">
              <label class="col-md-3">Conferma Password</label>
              <div class="col-md-9">
                <input class="form-control" :class="{'is-invalid': errors.password_confirmation}" type="password" v-model="password.password_confirmation">
                <div class="invalid-feedback" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      password: {},
      errors: {},
      submiting: false
    }
  },
  methods: {
    updatePasswordAuthUser () {
      if (!this.submiting) {
        this.submiting = true
        axios.put(`/user/password`, this.password)
        .then(response => {
          this.password = {}
          this.errors = {}
          this.submiting = false
          this.toastSuccess('Password changed!');
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

<template>
  <section id="auth-login" class="row flexbox-container">
    <div class="col-xl-8 col-11">
      <div class="card bg-authentication mb-0">
        <div class="row m-0">
          <!-- left section-login -->
          <div class="col-md-6 col-12 px-0">
            <div
              class="
                card
                disable-rounded-right
                mb-0
                p-2
                h-100
                d-flex
                justify-content-center
              "
            >
              <div class="card-header pb-1">
                <div class="card-title">
                  <h4 class="text-center mb-2">Bienvenido</h4>
                </div>
              </div>
              <div class="card-body" id="form">
                <div class="divider">
                  <div class="divider-text text-uppercase text-muted">
                    <small>Login</small>
                  </div>
                </div>
                <form action="index.html">
                  <div class="form-group mb-50">
                    <label class="text-bold-600" for="exampleInputEmail1"
                      >Usuario</label
                    >
                    <input
                      type="email"
                      v-model="usuario"
                      :class="{
                        error: typeof errorArray.usuario !== 'undefined',
                      }"
                      class="form-control"
                      id="exampleInputEmail1"
                      placeholder="Nombre de usuario"
                    />
                    <span class="error" v-if="errorArray.usuario">{{
                      errorArray.usuario
                    }}</span>
                  </div>
                  <div class="form-group">
                    <label class="text-bold-600" for="exampleInputPassword1"
                      >Password</label
                    >
                    <input
                      type="password"
                      v-model="password"
                      class="form-control"
                      :class="{
                        error: typeof errorArray.password !== 'undefined',
                      }"
                      id="exampleInputPassword1"
                      placeholder="Password"
                    />
                    <span class="error" v-if="errorArray.password">{{
                      errorArray.password
                    }}</span>
                  </div>
                  <div
                    class="
                      form-group
                      d-flex
                      flex-md-row flex-column
                      justify-content-between
                      align-items-center
                    "
                  >
                    <div class="text-left">
                      <div class="checkbox checkbox-sm">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="exampleCheck1"
                        />
                      </div>
                    </div>
                  </div>
                  <button
                    type="submit"
                    @click.prevent="validarLogin"
                    class="btn btn-primary glow w-100 position-relative"
                  >
                    Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                  </button>
                </form>
                <hr />
              </div>
            </div>
          </div>
          <!-- right section image -->
          <div
            class="col-md-6 d-md-block d-none text-center align-self-center p-3"
          >
            <img class="img-fluid" src="img/login.png" alt="branding logo" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      usuario: "",
      password: "",
      listRolPermiso:[],
      listRolPermisoFilter:[],
      errorArray: [{ usuario: "", password: "" }],
    };
  },
  methods: {
    validarLogin() {
      this.errorArray = [];
      var error = 0;
      if (!this.usuario) {
        this.errorArray.usuario = "El campo usuario es requerido!";
        error = 1;
      }
      if (!this.password) {
        this.errorArray.password = "El campo password es requerido! ";
        error = 1;
      }

      if (!error) {
        this.enviarLoggin();
      }
    },
    enviarLoggin() {
      let me = this;
      this.$loading(true);
      axios
        .post("/C-login", { email: this.usuario, password: this.password })
        .then((response) => {
          if (response.data.code == 401) {
            this.$loading(false);
          }
          if (response.data.code == 200) {
           
            me.getListarRolPermiso(response.data.authUser.rol);
            
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getListarRolPermiso(rol) {
      axios
        .get("/C-rol/getListRolPermiso", { params: { rol: rol } })
        .then((response) => {
         this.listRolPermiso = response.data.rolpermiso;
          this.getListarRolPermisoFilter();
        
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getListarRolPermisoFilter(){
      let me = this;
      me.listRolPermiso.map(function (x,y){
        me.listRolPermisoFilter.push(x.slug)
      })
      
        sessionStorage.setItem("ListRolPermiso", JSON.stringify(me.listRolPermisoFilter ));
            this.$router.push({ name: "home" });
             location.reload();
    }
  },
};
</script>
<style scoped>
.flexbox-container {
  display: flex;
  align-items: center;
  height: 100vh;
  justify-content: center;
}
</style>
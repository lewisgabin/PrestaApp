<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Rol</h5>
          <div class="breadcrumb-wrapper d-none d-sm-block">
            <ol class="breadcrumb p-0 mb-0 pl-1">
              <li class="breadcrumb-item">
                <a href="index.html"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </div>
          <router-link
            :to="'/rol'"
            type="button"
            style="float: right"
            class="btn btn-light-primary mr-1 mb-1"
          >
            <i class="bx bx-undo"></i
            ><span class="align-middle ml-25">Volver</span>
          </router-link>
        </div>
      </div>
    </div>
    <div class="card collapse-icon accordion-icon-rotate">
      <div class="card-header">
        <div class="col-md-4">
          <h2 class="card-title">{{ textoComponet }}</h2>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div
              class="card collapse-icon accordion-icon-rotate"
              style="border: 1px solid #dfe6f5"
            >
              <div
                class="card-header"
                style="
                  border-bottom: 1px solid #dfe6f5;
                  padding-left: 0px;
                  padding-top: 13px;
                  padding-bottom: 13px;
                "
              >
                <div class="col-md-12" style="display: flex">
                  <i
                    class="bx bx-data"
                    style="color: #5a8deede; font-size: 2rem"
                  ></i>
                  <h5 class="" style="margin-top: 4px">
                    Formularios Crear Roles
                  </h5>
                </div>
              </div>
              <div class="card-body" id="form">
                <div class="row mt-2">
                  <div class="col-md-10 col-12">
                    <label for="first-name-icon">NOMBRE</label>
                    <div class="form-label-group has-icon-left">
                      <input
                        v-model="rol.nombre"
                        type="text"
                        :class="{
                          error: typeof errorArray.nombre !== 'undefined',
                        }"
                        placeholder="Nombre"
                        class="form-control"
                      />
                      <span class="error" v-if="errorArray.nombre">{{
                        errorArray.nombre[0]
                      }}</span>
                      <div class="form-control-position">
                        <i class="bx bx-data"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-10 col-12">
                    <label for="first-name-icon">URL AMIGABLE</label>
                    <div class="form-label-group has-icon-left">
                      <input
                        v-model="rol.slug"
                        type="text"
                        placeholder="Slug"
                        :class="{
                          error: typeof errorArray.slug !== 'undefined',
                        }"
                        class="form-control"
                      />
                      <span class="error" v-if="errorArray.slug"
                        >{{ errorArray.slug[0] }}.</span
                      >
                      <div class="form-control-position">
                        <i class="bx bx-code-block"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div
              class="card collapse-icon accordion-icon-rotate"
              style="border: 1px solid #dfe6f5"
            >
              <div
                class="card-header"
                style="
                  border-bottom: 1px solid #dfe6f5;
                  padding-left: 0px;
                  padding-top: 13px;
                  padding-bottom: 13px;
                "
              >
                <div class="col-md-12" style="display: flex">
                  <i
                    class="bx bx-list-ul"
                    style="color: #5a8dee; font-size: 2rem"
                  ></i>
                  <h5 class="" style="margin-top: 4px">Lista De Permisos</h5>
                </div>
              </div>
              <div class="card-body">
                <div
                  class="accordion collapse-icon accordion-icon-rotate mt-2"
                  id="accordionWrapa2"
                  data-toggle-hover="true"
                >
                  <div
                    class="card collapse-header"
                    v-for="item in listModulo"
                    :key="item.id"
                  >
                    <div
                      id="heading5"
                      class="card-header collapsed"
                      data-toggle="collapse"
                      :data-target="'#' + item.modulo"
                      aria-expanded="false"
                      aria-controls="accordion5"
                      role="tablist"
                    >
                      <span class="collapse-title">
                        <i class="bx bxs-layer align-middle"></i>
                        <span class="align-middle">{{ item.modulo }}</span>
                      </span>
                    </div>
                    <div
                      :id="item.modulo"
                      role="tabpanel"
                      data-parent="#accordionWrapa2"
                      aria-labelledby="heading5"
                      class="collapse"
                      style=""
                    >
                      <div class="card-body" style="padding-top: 5px">
                        <div v-for="per in listaCheck" :key="per.id">
                          <div
                            style="display: flex"
                            class="checkbox-primary checkbox-glow mt-1"
                            v-if="item.modulo == per.modulo"
                          >
                            <input
                              class="che mr-1"
                              type="checkbox"
                              :id="per.slug"
                              v-model="per.checked"
                              :value="per.id"
                            />
                            <label>{{ per.nombre }}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 d-flex">
            <button
              type="reset"
              @click.prevent="limpiaCampos()"
              class="btn btn-light-secondary mr-1"
            >
              Limpiar
            </button>
            <button
              type="submit"
              @click.prevent="guardarRol()"
              class="btn btn-primary"
            >
              Guardar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rol: {
        nombre: "",
        slug: "",
      },
      idRol: 0,
      idPermisos: [],
      textoComponet: "Crear Rol",
      errorArray: [],
      listPermisos: [],
      listModulo: [],
      form: new FormData(),
      errorArray: [],
      listaCheck: [],
      rolWithPermisos: [],
    };
  },
  mounted() {
    if (this.$route.params.metodo == "editar") {
      this.textoComponet = "Editar Rol";
      this.idRol = this.$route.params.idRol;
      this.getRolWithPermision(this.$route.params.idRol);
    }
    this.getListPermisos();
  },
  methods: {
    //obtener lista de permisos
    getListPermisos() {
      let me = this;
      this.$loading(true);
      var url = "/rol/GetPermisos";
      axios.get(url).then((response) => {
        me.listPermisos = response.data.permisos;
        me.listModulo = response.data.modulos;
        me.setListaPermisoCheck();
        me.$loading(false);
      });
    },
    //guardar y editar rol
    guardarRol() {
      let me = this;
      this.errorArray = [];
      this.form.append("nombre", this.rol.nombre);
      this.form.append("slug", this.rol.slug);
      this.form.append("listPermiso", this.listaCheck);
      let count = false;
      var count1 = this.listaCheck.forEach((item) => {
        
        if (item.checked) {
          count = true;
        }
      });

      if (count) {
        this.$loading(true);
        if (this.$route.params.metodo == "editar") {
          axios
            .post("/C-rols/editar", {
       
                nombre: this.rol.nombre,
                slug: this.rol.slug,
                permisos: this.listaCheck,
                id: this.idRol,
              },
            )
            .then((response) => {
              me.$router.push({ name: "rolIndex", params: { estado: 2 } });
            })
            .catch((error) => {
              if (error.response.data.errors) {
                me.errorArray = error.response.data.errors;
                me.$loading(false);
              }
            });
        } else {
          axios
            .post("/C-rols", {
              nombre: this.rol.nombre,
              slug: this.rol.slug,
              permisos: this.listaCheck,
            })
            .then((response) => {
              me.$router.push({ name: "rolIndex", params: { estado: 1 } });
            })
            .catch((error) => {
              if (error.response.data.errors) {
                me.errorArray = error.response.data.errors;
                me.$loading(false);
              }
            });
        }
      } else {
        this.$swal({
          icon: "error",
          title: "Oops...",
          text: "Debes agregar al menos un permiso!",
        });
      }
    },
    //Limpia campo
    limpiaCampos() {
      this.rol.nombre = "";
      this.rol.slug = "";
      this.listaCheck = [];
    },
    //get rol con sus permisos
    getRolWithPermision(id) {
      let me = this;
      axios
        .get("/rol/GetRol/" + id)
        .then((response) => {
          me.rolWithPermisos = response.data.rolP;
          me.rol = response.data.rol;
        })
        .catch((error) => {
          consoleg.log(error);
        });
    },
    //organizar array permisos
    setListaPermisoCheck() {
      this.listPermisos.forEach((item, index) => {
        this.listaCheck.push({
          id: item.id,
          nombre: item.nombre,
          slug: item.slug,
          modulo: item.modulo,
          checked: 0,
        });
      });

      if (this.$route.params.metodo == "editar") {
        this.listaCheck.forEach((item, index) => {
          this.rolWithPermisos.forEach((per) => {
            if (item.id == per.id_permiso) {
              item.checked = 1;
            }
          });
        });
      }
    },
  },
};
</script>

<style>
.che {
  width: 19px;
  height: 19px;
}
</style>
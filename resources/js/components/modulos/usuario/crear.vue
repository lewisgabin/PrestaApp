<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-1 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Usuarios</h5>
          <div class="breadcrumb-wrapper d-none d-sm-block">
            <ol class="breadcrumb p-0 mb-0 pl-1">
              <li class="breadcrumb-item">
                <a href="index.html"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </div>
          <router-link
            :to="'/usuario'"
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
          <div class="col-md-3">
            <div class="avatar-upload">
              <div class="avatar-edit">
                <input
                  type="file"
                  id="imageUpload"
                  name="profile_pic"
                  accept=".png, .jpg, .jpeg"
                  @change="getFile"
                />
                <label for="imageUpload">
                  <i class="bx bxs-pencil"></i>
                </label>
              </div>
              <div class="avatar-preview">
                <div
                  class="profile-user-img img-responsive img-circle"
                  id="imagePreview"
                  style="
                    background-image: url('../images/sin.png');
                    background-size: 100% 100%;
                    height: 100%;
                  "
                ></div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-12">
            <label for="first-name-icon">NOMBRE</label>
            <div class="form-label-group has-icon-left">
              <input
                type="text"
                v-model="usuario.nombre"
                class="form-control"
                placeholder="Nombre"
              />
              <div class="form-control-position">
                <i class="bx bx-user"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">APELLIDO</label>
            <div class="form-label-group has-icon-left">
              <input
                type="text"
                v-model="usuario.apellido"
                class="form-control"
                placeholder="Apellido"
              />
              <div class="form-control-position">
                <i class="bx bx-user"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">EMAIL</label>
            <div class="form-label-group has-icon-left">
              <input
                type="email"
                v-model="usuario.email"
                class="form-control"
                placeholder="Usuario"
              />
              <div class="form-control-position">
                <i class="bx bx-mail-send"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">USUARIO</label>
            <div class="form-label-group has-icon-left">
              <input
                type="text"
                v-model="usuario.usuario"
                class="form-control"
                placeholder="Usuario"
              />
              <div class="form-control-position">
                <i class="bx bx-user-check"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">PASSWORD</label>
            <div class="form-label-group has-icon-left">
              <input
                type="password"
                v-model="usuario.password"
                class="form-control"
                placeholder="Clave"
              />
              <div class="form-control-position">
                <i class="bx bx-lock"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">ROL</label>
            <div class="form-label-group has-icon-left">
             
              <v-select v-model="usuario.rol"  label="nombre" :reduce="nombre => nombre.id" :options="listRol"></v-select>
            
            </div>
          </div>

          <div class="col-12 d-flex justify-content-end">
            <button
              type="reset"
              @click="limpiaCampo"
              class="btn btn-light-secondary mr-1"
            >
              Reset
            </button>
            <button
              type="submit"
              @click.prevent="registrarUsuario"
              class="btn btn-primary"
            >
              Guardar
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- modal de errores -->
    <div
      class="modal fade text-left"
      id="danger "
      tabindex="-1"
      :class="{ show: modalShow }"
      :style="modalShow ? mostrarModal : ocultarModal"
      aria-labelledby="myModalLabel120"
      style="display: none"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        id="modalError"
      >
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <h5 class="modal-title white" id="myModalLabel120">
              !Error, Debe completar los campos.
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click="abrirCerrarModal"
            >
              <i class="bx bx-x"></i>
            </button>
          </div>
          <div class="modal-body">
            <div
              class="alert bg-rgba-danger alert-dismissible mb-2"
              role="alert"
              v-for="item in mensajeError"
              :key="item"
            >
              <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close"
              >
                <span aria-hidden="true">×</span>
              </button>
              <div class="d-flex align-items-center">
                <i class="bx bx-error"></i>
                <span>{{ item }} </span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-danger ml-1"
              data-dismiss="modal"
              @click="abrirCerrarModal"
            >
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Cerrar</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";

import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
  props: ["ruta"],
  components: {
    vueDropzone: vue2Dropzone,
  },
  data: function () {
    return {
      dropzoneOptions: {
        url: "https://httpbin.org/post4",
        thumbnailWidth: 200,
        maxFilesize: 3,
        headers: { "My-Awesome-Header": "header value" },
        addRemoveLinks: true,
      },
      usuario: {
        nombre: "",
        apellido: "",
        estado: 1,
        email: "",
        usuario: "",
        image: "",
        rol: "",
        password: "",
      },
      mensajeError: [],
      listRol:[],
      error: 0,
      textoComponet: "Crear Usuario",
      modalShow: false,
      isLoading: false,
      fullPage: true,
      mostrarModal: {
        display: "block",
        background: "#0000006b",
      },
      ocultarModal: {
        display: "none",
      },
      form: new FormData(),
      usuarioId: 0,
      metodo: "crear",
    };
  },
  components: {},
  mounted() {
    this.getRol();
    if (this.$route.params.metodo == "editar") {
      this.$loading(true);
      this.textoComponet = "Editar Usuario";
      this.metodo = this.$route.params.metodo;
      this.obtenerUsuario(this.$route.params.idUsuario);
    }
    
  },
  methods: {
    //presenta la imagen en image input
    getFile(e) {
      this.usuario.image = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#imagePreview").css(
          "background-image",
          "url(" + reader.result + ")"
        );
        $("#imagePreview").show();
        $("#imagePreview").fadeIn(650);
      };
      reader.readAsDataURL(e.target.files[0]);
    },
    //metodo validar envio de datosnpm uninstall
    validarRegistrarUsuario() {
      this.error = 0;
      this.mensajeError = [];
      if (!this.usuario.nombre) {
        this.mensajeError.push("El Nombre es un campo obligatorio");
      }
      if (!this.usuario.email) {
        this.mensajeError.push("El E-mail es un campo obligatorio");
      }
      if (!this.usuario.usuario) {
        this.mensajeError.push("El Usuario es un campo obligatorio");
      }
      if (!this.usuario.password && this.metodo == "crear") {
        this.mensajeError.push("La Contraseña es un campo obligatorio");
      }
      if (!this.usuario.rol) {
        this.mensajeError.push("Debe seleccionar un rol para el usuario");
      }
      if (this.mensajeError.length) {
        this.error = 1;
      }
      return this.error;
    },
    // valida el envio al metodo guardar
    registrarUsuario() {
      if (this.validarRegistrarUsuario() == 1) {
        this.modalShow = true;
        return;
      } else {
        this.guardarUsuario();
      }
    },
    // abrir o cerrar el modal
    abrirCerrarModal() {
      this.modalShow = !this.modalShow;
    },
    //limiar campos
    limpiaCampo() {
      this.usuario.nombre = "";
      this.usuario.apellido = "";
      this.usuario.email = "";
      this.usuario.usuario = "";
      this.usuario.image = "";
      this.usuario.rol = "";
      this.usuario.password = "";
    },
    //guarda y editar el usuario
    guardarUsuario() {
      this.$loading(true);
      this.form.append("usuario", this.usuario.usuario);
      this.form.append("apellido", this.usuario.apellido);
      this.form.append("rol", this.usuario.rol);
      this.form.append("password", this.usuario.password);
      this.form.append("nombre", this.usuario.nombre);
      this.form.append("email", this.usuario.email);
      this.form.append("estado", this.usuario.estado);
      this.form.append("file", this.usuario.image);
      this.form.append("id", this.$route.params.idUsuario);

      const config = { headers: { "Content-Type": "multipart/form-data" } };
      var url = "/C-usuarios/editar";
      let me = this;
      if (this.metodo == "crear") {
        axios
          .post("/C-usuarios", this.form, config)
          .then((response) => {
            //

            me.$router.push({ name: "usuarioIndex", params: { estado: 1 } });
          })
          .catch((error) => {
            console.log(error);
            me.$loading(false);
          });
      }
      if (this.metodo == "editar") {
        axios
          .post(url, this.form, config)
          .then((response) => {
            //

            me.$router.push({ name: "usuarioIndex", params: { estado: 2 } });
          })
          .catch((error) => {
            console.log(error);
            me.$loading(false);
          });
      }
    },
    // buscar el usuario que se va a editar
    obtenerUsuario(idU) {
      var url = "/C-usuarios/" + idU;
      let me = this;
      axios
        .get(url)
        .then((response) => {
          me.usuario = response.data.usuario;
          me.usuario.rol = parseInt(me.usuario.rol);
          $("#imagePreview").css(
            "background-image",
            "url('" + "../storage/img/users/" + me.usuario.image + "')"
          );
          me.usuario.password = "";
          me.$loading(false);
          me.usuario.image = false;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    //obtener todos los roles
    getRol() {
      let me = this;
      axios
        .post("/C-usuarios/getRol")
        .then((response) => {
          me.listRol = response.data.rol;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style>
.avatar-upload {
  position: relative;
  max-width: 95%;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 8%;
  z-index: 1;
  top: -13px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  color: white;
  border-radius: 100%;
  background: #5a8dee;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  padding: 7px;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #e0e4e9;
  border-color: #d6d6d6;
  color: #5a8dee;
}

.avatar-upload .avatar-preview {
  width: 90%;
  height: 120px;
  position: relative;
  border-radius: 5%;
  border: 2px dashed #5a8dee;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
  border-radius: 5%;
}
.avatar-upload .avatar-preview > div {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>
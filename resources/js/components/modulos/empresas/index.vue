<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Empresas</h5>
          <div class="breadcrumb-wrapper d-none d-sm-block">
            <ol class="breadcrumb p-0 mb-0 pl-1">
              <li class="breadcrumb-item">
                <a href="index.html"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="card collapse-icon accordion-icon-rotate">
      <div class="card-header">
        <div class="col-md-4">
          <h2 class="card-title">Lista de empresas</h2>
        </div>

        <div class="col-md-3">         
          <label for="users-list-role">Filtro</label>
          <fieldset class="form-group shadow">
            <v-select
              v-model="filtroBusquedad"
              @input="getListEmpresa"
              :options="['nombre', 'slug']"
            ></v-select>
          </fieldset>
        </div>
        <section class="search-bar-wrapper col-md-5">
          <div class="search-bar">
            <form>
              <fieldset
                class="page-search-input form-group position-relative"
                style="margin-top: 22px !important"
              >
                <input
                  type="search"
                  class="form-control rounded-right form-control shadow pl-2"
                  id="searchbar"
                  @click="inicializarPage"
                  v-model="valorBusquedad"
                  placeholder="Buscar"
                  v-on:keyup="getListEmpresa"
                />
              </fieldset>
            </form>
          </div>
        </section>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-striped" id="table">
            <thead>
              <tr role="row" class="bg-primary">
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>RNC</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in listEmpresa.data" :key="item.id">
                <td>{{ item.nombre }}</td>
                <td>{{ item.telefono }}</td>
                <td>{{ item.rnc }}</td>
                <td>
                  <div v-if="!item.estado" class="badge badge-light-danger">
                    Desact
                  </div>
                  <div v-else class="badge badge-light-success">Activo</div>
                </td>
                <td>
                  <div style="display: flex">
                    <button
                      type="button"
                      v-tooltip.top="'Editar empresa.'"
                      class="btn btn-icon btn-light-warning glow mr-1"
                      @click="
                        abrirCerrarModal('Editar empresa', 'warning', item.id)
                      "
                    >
                      <i class="bx bxs-edit-alt"></i>
                    </button>
                    <button
                      v-if="item.estado"
                      @click="
                        activarDesactivar(
                          item.id,
                          'Desactivar',
                          'Desactivado'
                        )
                      "
                      type="button"
                      v-tooltip.top="'Desactivar empresa.'"
                      class="btn btn-icon btn-light-danger glow"
                    >
                      <i class="bx bxs-trash"></i>
                    </button>
                    <button
                      v-else
                      type="button"
                      @click="activarDesactivar(item.id, 'Activar', 'Activado')"
                      v-tooltip.top="'Activar empresa.'"
                      class="btn btn-icon btn-light-success glow"
                    >
                      <i class="bx bx-power-off"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <div
              class="dataTables_info"
              id="users-list-datatable_info"
              role="status"
              aria-live="polite"
            >
              Mostrando {{ listEmpresa.from }} a {{ listEmpresa.to }} de
              {{ listEmpresa.total }} rutas.
            </div>
          </div>
          <div class="col-md-8">
            <input
              type="text"
              v-model="pagination.per_page"
              class="form-control"
              id="basicInput"
              style="
                float: right;
                width: 15%;
                width: 49px;
                height: 30px;
                color: #5a8dee;
              "
              placeholder=""
              @change="getListEmpresa()"
            />
            <span for="" class="dataTables_info mr-1" style="float: right">
              Cant por pagina</span
            >
          </div>
          <nav class="col-md-12" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li
                class="page-item previous"
                :class="{ disabled: pagination.page == 1 }"
              >
                <a
                  class="page-link"
                  href="javascript:void(0);"
                  @click="
                    pagination.page--;
                    getListEmpresa();
                  "
                >
                  <i class="bx bx-chevron-left"></i>
                </a>
              </li>

              <li
                class="page-item"
                :class="{ active: n == pagination.page }"
                v-for="n in arrayPageN"
                :key="n"
              >
                <a
                  class="page-link"
                  href="javascript:void(0);"
                  @click="
                    pagination.page = n;
                    getListEmpresa();
                  "
                  >{{ n }}</a
                >
              </li>
              <li
                class="page-item next"
                :class="{ disabled: pagination.page == listEmpresa.last_page }"
              >
                <a
                  class="page-link"
                  href="javascript:void(0);"
                  @click="
                    pagination.page++;
                    getListEmpresa();
                  "
                >
                  <i class="bx bx-chevron-right"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <button
      class="
        btn btn-warning btn-icon
        floatBotton
        rounded-circle
        glow
        tooltip-light
      "
      @click="abrirCerrarModal('Crear empresa', 'primary', 0)"
      v-tooltip.left="'Crear empresa.'"
    >
      <i class="bx bx-plus" style="font-size: 1.9rem"></i>
    </button>

    <!-- modal de crear y editar -->
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
          <div :class="'modal-header bg-' + metodo">
            <h5 class="modal-title white" id="myModalLabel120">
              {{ this.titleModal }}
            </h5>
            <button
              type="button"
              class="close"
              aria-label="Close"
              @click="modalShow = 0"
            >
              <i class="bx bx-x"></i>
            </button>
          </div>
          <div class="modal-body" id="form">
            <div class="row" style="justify-content: center">
              <div class="col-sm-12 col-md-4 col-10" style="margin-top: 27px">
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
            </div>

            <div class="row">
              <div class="col-md-12 col-12">
                <label for="first-name-icon">NOMBRE</label>
                <div class="form-label-group has-icon-left">
                  <input
                    v-model="empresa.nombre"
                    type="text"
                    :class="{error:typeof errorArray.nombre !== 'undefined'}"
                    placeholder="Nombre"
                    class="form-control"
                  />
                  <span class="error" v-if=" errorArray.nombre">{{ errorArray.nombre[0]}}</span>
                  <div class="form-control-position">
                    <i class="bx bx-data"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-12">
                <label for="first-name-icon">RNC</label>
                <div class="form-label-group has-icon-left">
                  <input
                    v-model="empresa.rnc"
                    type="text"
                    :class="{error:typeof errorArray.rnc !== 'undefined'}"
                    placeholder="RNC"
                    class="form-control"
                  />
                  <span class="error" v-if=" errorArray.rnc">{{ errorArray.rnc[0]}}</span>
                  <div class="form-control-position">
                    <i class="bx bx-data"></i>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6 col-12">
                <label for="first-name-icon">Teléfono</label>
                <div class="form-label-group has-icon-left">
                  <input
                    v-model="empresa.telefono"
                    type="text"
                    :class="{error:typeof errorArray.telefono !== 'undefined'}"
                    placeholder="Teléfono"
                    class="form-control"
                  />
                  <span class="error" v-if=" errorArray.telefono">{{ errorArray.telefono[0]}}</span>
                  <div class="form-control-position">
                    <i class="bx bx-data"></i>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-12">
                <label for="first-name-icon">Teléfono 2</label>
                <div class="form-label-group has-icon-left">
                  <input
                    v-model="empresa.telefono2"
                    type="text"
                    :class="{error:typeof errorArray.telefono2 !== 'undefined'}"
                    placeholder="Teléfono 2"
                    class="form-control"
                  />
                  <span class="error" v-if=" errorArray.telefono2">{{ errorArray.telefono2[0]}}</span>
                  <div class="form-control-position">
                    <i class="bx bx-data"></i>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 col-12">
                  <label for="first-name-icon">Eslogan</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      v-model="empresa.eslogan"
                      type="text"
                      :class="{error:typeof errorArray.eslogan !== 'undefined'}"
                      placeholder="Eslogan"
                      class="form-control"
                    />
                    <span class="error" v-if=" errorArray.eslogan">{{ errorArray.eslogan[0]}}</span>
                    <div class="form-control-position">
                      <i class="bx bx-data"></i>
                    </div>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-12">
                  <label for="first-name-icon">Dirección</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      v-model="empresa.direccion"
                      type="text"
                      :class="{error:typeof errorArray.direccion !== 'undefined'}"
                      placeholder="Dirección"
                      class="form-control"
                    />
                    <span class="error" v-if=" errorArray.direccion">{{ errorArray.direccion[0]}}</span>
                    <div class="form-control-position">
                      <i class="bx bx-data"></i>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-light-secondary"
              data-dismiss="modal"
              @click="modalShow = 0"
            >
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Cerrar</span>
            </button>
            <button
              type="button"
              :class="'btn btn-' + metodo + ' ml-1'"
              @click="guardarEditarEmpresa()"
            >
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Guardar</span>
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
  components: {
    vueDropzone: vue2Dropzone,
  },
  data: function() {
    return {
      dropzoneOptions: {
        url: "https://httpbin.org/post4",
        thumbnailWidth: 200,
        maxFilesize: 3,
        headers: { "My-Awesome-Header": "header value" },
        addRemoveLinks: true,
      },
      empresa: {
        nombre: "",
        telefono: "",
        telefono2: "",
        direccion: "",
        rnc: "",
        eslogan: "",
        logo: "",
        id: 0,
      },
      listEmpresa: [],
      metodo: "",
      idEmpresa: 0,
      filtroBusquedad: "nombre",
      valorBusquedad: "",
      pagination: {
        per_page: 10,
        page: 1,
      },
      arrayPageN: [],
      errorArray:[],
      listEstado: [
        { value: 0, label: "Inactivo" },
        { value: 1, label: "Activo" },
      ],
      modalShow: false,
      mostrarModal: {
        display: "block",
        background: "#0000006b",
      },
      form: new FormData(),
      titleModal: "",
      ocultarModal: {
        display: "none",
      },
    };
  },
  mounted() {
    this.getListEmpresa();
  },
  methods: {
    // metodo para paginar
    paginacion() {
      let n = 3;
      let arrayN = [];
      let number = this.pagination.page;
      let ini = number - n;
      if (ini <= 1) {
        ini = 1;
      }

      let fin = this.pagination.page + n;
      if (fin > this.listEmpresa.last_page) {
        fin = this.listEmpresa.last_page;
      }

      for (let i = ini; i <= fin; i++) {
        arrayN.push(i);
      }

      this.arrayPageN = arrayN;
    },
    // inicializa a zero la variable page
    inicializarPage() {
      this.pagination.page = 1;
    },
    //limpiar busquedad
    LimpiarBusquedad() {
      this.valorBusquedad == "";
      this.opcionesB = "";
    },
    //lista de permiso
    getListEmpresa() {
      let me = this;
      this.$loading(true);
      var url = "/C-empresa";
      axios
        .get(url, {
          params: {
            filtro: this.filtroBusquedad,
            busquedad: this.valorBusquedad,
            per_page: this.pagination.per_page,
            page: this.pagination.page,
          },
        })
        .then((response) => {
          me.listEmpresa = response.data.empresas;
          me.paginacion();
          me.$loading(false);
        });
    },
    //activar o desactivar
    activarDesactivar(id, metodo, metodo2) {
      let me = this;
      this.$swal({
        title: "Esta seguro?",
        text: "Que desea '" + metodo + "' la empresa!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#ff5b5c",
        confirmButtonColor: "#5a8dee",
        confirmButtonText: "Si, " + metodo + "!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete("/C-empresa/" + id).then((response) => {
            me.$swal(
              "" + metodo2 + "!",
              "La empresa ha sido " + metodo2 + ".",
              "success"
            );
            me.getListEmpresa();
          });
        }
      });
    },
    //abrir y cerrar modal
    abrirCerrarModal(titulo, metodo, idEmpresa) {
      let me = this; 
      this.errorArray = [];
      this.titleModal = titulo;
      this.metodo = metodo;
      this.idEmpresa = idEmpresa;
      this.modalShow = !this.modalShow;

      if (metodo == "primary") {
        this.empresa.nombre = "";
        this.empresa.telefono = "";
        this.empresa.telefono2 = "";
        this.empresa.direccion = "";
        this.empresa.eslogan = "";
        this.empresa.logo = "";
        this.empresa.rnc = "";
        this.empresa.id = 0;
         $("#imagePreview").css(
            "background-image",
            "url('img/user.png')"
          );
      }
      if (metodo == "warning") {
        axios
          .get("C-empresa/" + idEmpresa)
          .then((response) => {
            me.empresa = _(response.data.empresa).mapValues((value) => (_.isNull(value) ? "" : value)).value();
            $("#imagePreview").css(
            "background-image",
            "url('" + "../storage/img/users/" + me.empresa.logo + "')"
          );
         // me.empresa.logo = false;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    getFile(e) {
      this.empresa.logo = e.target.files[0];
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
    guardarEditarEmpresa(){
      let me = this;
      this.errorArray = [];
      this.form.append("nombre", this.empresa.nombre);
      this.form.append("rnc", this.empresa.rnc);
      this.form.append("telefono", this.empresa.telefono);
      this.form.append("telefono2", this.empresa.telefono2);
      this.form.append("eslogan", this.empresa.eslogan);
      this.form.append("direccion", this.empresa.direccion);
      this.form.append("logo", this.empresa.logo);
      this.form.append("id_empresa", this.idEmpresa);

      const config = { headers: { "Content-Type": "multipart/form-data" } };

      if (this.metodo == "primary" && this.errorArray.length == 0) {
        axios
          .post("C-empresa", this.form, config)
          .then((response) => {
            me.modalShow = 0;
            me.getListEmpresa();
             this.$toast.open({
              message: "Empresa creada con exito!",
              type: "success",
              duration: 2000,
              dismissible: true,
              position: "top-right",
            });
          })
          .catch((error) => {
        
              if(error.response.data.errors){
                me.errorArray = error.response.data.errors; 
              }
          });
      }

      if (this.metodo == "warning" && this.errorArray.length == 0) {
        axios
          .post("C-empresa/editar", this.form, config)
          .then((response) => {
            me.modalShow = 0;
            me.getListEmpresa();
            this.$toast.open({
              message: "Empresa editada con exito!",
              type: "success",
              duration: 2000,
              dismissible: true,
              position: "top-right",
            });
          })
          .catch((error) => {
            if(error.response.data.errors){
                me.errorArray = error.response.data.errors; 
              }
          });
      }
    },
  },
};
</script>

<style scoped>
.btn-light-warning {
  background-color: #f2f4f4;
  color: #9797a6;
}

.btn-light-danger {
  background-color: #f2f4f4;
  color: #9797a6;
}
.btn-light-success {
  background-color: #f2f4f4;
  color: #9797a6;
}
</style>
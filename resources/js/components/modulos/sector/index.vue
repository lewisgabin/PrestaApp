<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Sector</h5>
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
          <h2 class="card-title">Lista de sectores</h2>
        </div>

        <div class="col-md-3">         
          <label for="users-list-role">Filtro</label>
          <fieldset class="form-group shadow">
            <v-select
              v-model="filtroBusquedad"
              @input="getListSector"
              :options="['nombre', 'municipio']"
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
                  v-on:keyup="getListSector"
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
                <th>#</th>
                <th>Sector</th>
                <th>Municipio</th>
                <th>Provincia</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item,numero in listSector.data" :key="item.id">
                <td>{{numero+1}}</td>
                <td>{{ item.nombre }}</td>
                <td>{{ item.municipio.nombre }}</td>
                <td>{{ item.municipio.provincia.nombre }}</td>
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
                      v-tooltip.top="'Editar sector.'"
                      class="btn btn-icon btn-light-warning glow mr-1"
                      @click="
                        abrirCerrarModal('Editar sector', 'warning', item.id)
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
                      v-tooltip.top="'Desactivar sector.'"
                      class="btn btn-icon btn-light-danger glow"
                    >
                      <i class="bx bxs-trash"></i>
                    </button>
                    <button
                      v-else
                      type="button"
                      @click="activarDesactivar(item.id, 'Activar', 'Activado')"
                      v-tooltip.top="'Activar sector.'"
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
              Mostrando {{ listSector.from }} a {{ listSector.to }} de
              {{ listSector.total }} rutas.
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
              @change="getListSector()"
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
                    getListSector();
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
                    getListSector();
                  "
                  >{{ n }}</a
                >
              </li>
              <li
                class="page-item next"
                :class="{ disabled: pagination.page == listSector.last_page }"
              >
                <a
                  class="page-link"
                  href="javascript:void(0);"
                  @click="
                    pagination.page++;
                    getListSector();
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
      @click="abrirCerrarModal('Crear sector', 'primary', 0)"
      v-tooltip.left="'Crear sector.'"
    >
      <i class="bx bx-plus" style="font-size: 1.9rem"></i>
    </button>

    <!-- modal de crear y editar Sector -->
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
              Crear nuevo sector
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
            <div class="row">
              <div class="col-md-12 col-12">
                <label for="first-name-icon">NOMBRE:</label>
                <div class="form-label-group has-icon-left">
                  <input
                    v-model="sector.nombre"
                    type="text"
                    placeholder="Nombre"
                    class="form-control"
                  />
                  <div class="form-control-position">
                    <i class="bx bx-home"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                  <label for="first-name-icon">PROVINCIA:</label>
                  <fieldset class="form-group">
                    <v-select
                      v-model="sector.provincia"
                      :options="listProvincia"
                      label="nombre"
                      placeholder="Provincia"
                      @input="getMunicipio"
                    ></v-select>
                  </fieldset>
                </div>
            </div>
            <div class="row">              
                <div class="col-md-12 col-12">
                  <label for="first-name-icon">MUNICIPIO:</label>
                  <fieldset class="form-group">
                    <v-select
                      v-model="sector.municipio"
                      :options="listMunicipio"
                      label="nombre"
                      placeholder="Municipio"
                    ></v-select>
                  </fieldset>
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
              class="btn btn-primary ml-1"
              @click="guardarEditarSector()"
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
export default {
  data() {
    return {
      sector: {
        id: 0,
        nombre: "",
        municipio: "",
        provincia: "",
      },
      listSector: [],
      listMunicipio: [],
      listProvincia: [],
      metodo: "",
      idSector: 0,
      provinciaSeleccionada: "",
      municipioSeleccionado: "",
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
    this.getListSector();
    this.getProvincias();
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
      if (fin > this.listSector.last_page) {
        fin = this.listSector.last_page;
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
    getListSector() {
      let me = this;
      this.$loading(true);
      var url = "/C-sector";
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
          me.listSector = response.data.sectores;
          me.listMunicipio = response.data.municipio_Sectores;
          me.paginacion();
          me.$loading(false);
        });
    },
    //activar o desactivar
    activarDesactivar(id, metodo, metodo2) {
      let me = this;
      this.$swal({
        title: "Esta seguro?",
        text: "Que desea '" + metodo + "' el sector!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#ff5b5c",
        confirmButtonColor: "#5a8dee",
        confirmButtonText: "Si, " + metodo + "!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete("/C-sector/" + id).then((response) => {
            me.$swal(
              "" + metodo2 + "!",
              "El sector ha sido " + metodo2 + ".",
              "success"
            );
            me.getListSector();
          });
        }
      });
    },
    //abrir y cerrar modal
    abrirCerrarModal(titulo, metodo, idSector) {
      let me = this; 
      this.errorArray = [];
      this.titleModal = titulo;
      this.metodo = metodo;
      this.idSector = idSector;
      this.modalShow = !this.modalShow;

      if (metodo == "primary") {
        this.sector.nombre = "";
        this.sector.id = 0;
        this.sector.provincia = "";
        this.sector.municipio = "";
      }
      if (metodo == "warning") {
        axios
          .get("C-sector/" + idSector)
          .then((response) => {
            me.sector = response.data.sector;
            me.sector.provincia = response.data.provincia;
            this.getMunicipio(this.sector.provincia);//Busco los municipios que pertenecen a la provincia seleccionada
            me.sector.municipio = response.data.municipio;//Como el getMunicipio me borra el nombre del municipio, lo coloco despues de haber traido todo
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    guardarEditarSector(){
      let me = this;
      this.errorArray = [];
      this.form.append("nombre", this.sector.nombre);
      this.form.append("municipio", this.sector.municipio.id);
      
      if (this.metodo == "primary" && this.errorArray.length == 0) {
        axios
          .post("C-sector", this.form)
          .then((response) => {
            me.modalShow = 0;
            me.getListSector();
            this.$toast.open({
              message: "Sector creado con exito!",
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
        this.form.append("id", this.idSector);
        axios
          .post("C-sector/editar", this.form)
          .then((response) => {
            me.modalShow = 0;
            me.getListSector();
            this.$toast.open({
              message: "Sector editado con exito!",
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
    getProvincias() {
      this.$loading(true);
      var url = "/GetProvincias";
      axios.get(url).then((response) => {
        this.listProvincia = response.data.provincias;
        this.$loading(false);
      });
    },
    getMunicipio(provinciaSeleccionada) {
      if(this.sector.provincia != ""){
        this.sector.municipio = "";

        var url = "/GetMunicipios/" + provinciaSeleccionada.id;
        axios.get(url).then((response) => {
          this.listMunicipio = response.data.municipios;
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
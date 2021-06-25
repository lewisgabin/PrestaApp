<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Rol</h5>
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
          <h2 class="card-title">Lista de rol</h2>
        </div>

        <div class="col-md-3">
          <label for="users-list-role">Filtro</label>
          <fieldset class="form-group shadow">
            <v-select
              v-model="filtroBusquedad"
              @input="getListRol"
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
                  v-on:keyup="getListRol"
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
                <th>Nombre</th>
                <th>Url Amigable</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, numero) in listRol.data" :key="item.id">
                <td>{{ numero + 1 }}</td>
                <td>{{ item.nombre }} {{ item.apellido }}</td>
                <td>{{ item.slug }}</td>
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
                      v-tooltip.top="'Editar Rol.'"
                      class="btn btn-icon btn-light-warning glow mr-1"
                      @click="editar(item.id)"
                    
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
                      v-tooltip.top="'Desactivar Rol.'"
                      class="btn btn-icon btn-light-danger glow"
                    >
                      <i class="bx bxs-trash"></i>
                    </button>
                    <button
                      v-else
                      type="button"
                      @click="activarDesactivar(item.id, 'Activar', 'Activado')"
                      v-tooltip.top="'Activar Rol.'"
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
              Mostrando {{ listRol.from }} a {{ listRol.to }} de
              {{ listRol.total }} rol.
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
              @change="getListRol()"
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
                    getListRol();
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
                    getListRol();
                  "
                  >{{ n }}</a
                >
              </li>
              <li
                class="page-item next"
                :class="{ disabled: pagination.page == listRol.last_page }"
              >
                <a
                  class="page-link"
                  href="javascript:void(0);"
                  @click="
                    pagination.page++;
                    getListRol();
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

    <router-link
      :to="'/crear/rol'"
      class="
        btn btn-warning btn-icon
        floatBotton
        rounded-circle
        glow
        tooltip-light
      "
      v-tooltip.left="'Crear Rol.'"
    >
      <i class="bx bx-plus" style="font-size: 1.9rem; top: 6px"></i>
    </router-link>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rol: {
        nombre: "",
        slug: "",
        id: 0,
      },
      listRol: [],
      metodo: "",
     idRol: 0,
      filtroBusquedad: "nombre",
      valorBusquedad: "",
      pagination: {
        per_page: 10,
        page: 1,
      },
      arrayPageN: [],
      errorArray: [],
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
    this.getListRol();
     if (this.$route.params.estado == 1) {
      this.$toast.open({
        message: "Rol ah sido creado con exito!",
        type: "success",
        duration: 4000,
        dismissible: true,
        position: "top-right",
      });
    }
    if (this.$route.params.estado == 2) {
      this.$toast.open({
        message: "Rol editado con exito!",
        type: "success",
        duration: 4000,
        dismissible: true,
        position: "top-right",
      });
    }
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
      if (fin > this.listRol.last_page) {
        fin = this.listRol.last_page;
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
    //lista de rol
    getListRol() {
      let me = this;
      this.$loading(true);
      var url = "/C-rols";
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
          me.listRol = response.data.rol;
          me.paginacion();
          me.$loading(false);
        });
    },
    //activar o desactivar
    activarDesactivar(id, metodo, metodo2) {
      let me = this;
      this.$swal({
        title: "Esta seguro?",
        text: "Que desea '" + metodo + "' el rol!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#ff5b5c",
        confirmButtonColor: "#5a8dee",
        confirmButtonText: "Si, " + metodo + "!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete("/C-rols/" + id).then((response) => {
            me.$swal(
              "" + metodo2 + "!",
              "El rol a sido " + metodo2 + ".",
              "success"
            );
            me.getListRol();
          });
        }
      });
    },
    //editar Rol
        editar(id) {
      this.$router.push({
        name: "rolEditar",
        params: { idRol: id, metodo: "editar" },
      });
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
</style>t

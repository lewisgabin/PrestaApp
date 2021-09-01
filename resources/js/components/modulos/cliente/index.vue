<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Clientes</h5>
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
          <h2 class="card-title">Lista de clientes</h2>
        </div>

        <div class="col-md-3">
          <label for="users-list-role">Filtro</label>
          <fieldset class="form-group shadow">
            <v-select
              v-model="filtroBusquedad"
              @input="getListUsuarios"
              :options="['nombre', 'usuario', 'email', 'estado']"
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
                  v-on:keyup="getListUsuarios"
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
                <th>id</th>
                <th>Fotografia</th>
                <th>Nombre</th>

                <th>Usuario</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in listUsuario.data" :key="item.id">
                <td>{{ item.id }}</td>
                <td>
                  <img
                    v-if="item.image == 'sin.png' || item.image == null"
                    class="media-object rounded-circle"
                    :src="'/images/sin.png'"
                    height="64"
                    width="64"
                  />

                  <img
                    v-else
                    class="media-object rounded-circle"
                    :src="'storage/img/users/' + item.image"
                    height="64"
                    width="64"
                  />
                </td>
                <td>{{ item.nombre }} {{ item.apellido }}</td>

                <td>{{ item.usuario }}</td>
                <td>{{ item.rol }}</td>

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
                      v-tooltip.top="'Editar Usuario.'"
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
                          'Desactivarado'
                        )
                      "
                      type="button"
                      v-tooltip.top="'Desactivar Usuario.'"
                      class="btn btn-icon btn-light-danger glow"
                    >
                      <i class="bx bxs-trash"></i>
                    </button>
                    <button
                      v-else
                      type="button"
                      @click="activarDesactivar(item.id, 'Activar', 'Activado')"
                      v-tooltip.top="'Activar Usuario.'"
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
              Mostrando {{ listUsuario.from }} a {{ listUsuario.to }} en
              {{ listUsuario.total }} usuarios.
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
              @change="getListUsuarios()"
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
                    getListUsuarios();
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
                    getListUsuarios();
                  "
                  >{{ n }}</a
                >
              </li>
              <li
                class="page-item next"
                :class="{ disabled: pagination.page == listUsuario.last_page }"
              >
                <a
                  class="page-link"
                  href="javascript:void(0);"
                  @click="
                    pagination.page++;
                    getListUsuarios();
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
      :to="'/crear/cliente'"
      class="
        btn btn-warning btn-icon
        floatBotton
        rounded-circle
        glow
        tooltip-light
      "
      v-tooltip.left="'Crear Cliente.'"
    >
      <i class="bx bx-plus" style="font-size: 1.9rem; top: 6px"></i>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ["ruta"],
  data() {
    return {
      listUsuario: [],
      filtroBusquedad: "nombre",
      valorBusquedad: "",
      pagination: {
        per_page: 10,
        page: 1,
      },
      arrayPageN: [],
      listEstado: [
        { value: 0, label: "Inactivo" },
        { value: 1, label: "Activo" },
      ],
    };
  },
  mounted() {
    this.getListUsuarios();

    if (this.$route.params.estado == 1) {
      this.$toast.open({
        message: "Usuario creado con exito!",
        type: "success",
        duration: 4000,
        dismissible: true,
        position: "top-right",
      });
    }
    if (this.$route.params.estado == 2) {
      this.$toast.open({
        message: "Usuario editado con exito!",
        type: "success",
        duration: 4000,
        dismissible: true,
        position: "top-right",
      });
    }
    if (this.$route.params.estado == 3) {
      this.$toast.open({
        message: "Problema para guardar el usuario",
        type: "error",
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
      if (fin > this.listUsuario.last_page) {
        fin = this.listUsuario.last_page;
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
    //Obtener lista de usuario
    getListUsuarios() {
      let me = this;
      this.$loading(true);
      var url = "/C-usuarios";
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
          me.listUsuario = response.data.usuarios;
          me.paginacion();
          me.$loading(false);
          
        });
    },
    // navegar hacia editar
    editar(id) {
      this.$router.push({
        name: "usuarioCrear",
        params: { idUsuario: id, metodo: "editar" },
      });
    },
    //activar o desactivar
    activarDesactivar(id, metodo, metodo2) {
      let me = this;
      this.$swal({
        title: "Esta seguro?",
        text: "Que desea '" + metodo + "' el usuario!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#ff5b5c",
        confirmButtonColor: "#5a8dee",
        confirmButtonText: "Si, " + metodo + "!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete("/C-usuarios/" + id).then((response) => {
            me.$swal(
              "" + metodo2 + "!",
              "El usuario a sido " + metodo2 + ".",
              "success"
            );
            me.getListUsuarios();
          });
        }
      });
    },
  },
};
</script>

<style  scoped>
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
#vs1__combobox {
  height: 37px;
}
</style>



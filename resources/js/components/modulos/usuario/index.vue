<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Usuarios</h5>
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
          <h2 class="card-title">Lista de usuario</h2>
        </div>

        <div class="col-md-3">
          <label for="users-list-role">Filtro</label>
          <fieldset class="form-group shadow">
            <v-select
              v-model="filtroBusquedad"
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
          <table class="table table-hover table-striped">
            <thead>
              <tr role="row" class="bg-primary">
                <th>Fotografia</th>
                <th>Nombre</th>

                <th>Usuario</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in listUsuario" :key="item.id">
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
                      type="button"
                      v-tooltip.top="'Desactivar Usuario.'"
                      class="btn btn-icon btn-light-danger glow"
                    >
                      <i class="bx bxs-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <router-link
      :to="'/crear/usuario'"
      class="
        btn btn-warning btn-icon
        floatBotton
        rounded-circle
        glow
        tooltip-light
      "
      v-tooltip.left="'Crear Usuario.'"
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
    //limpiar busquedad
    LimpiarBusquedad() {
      this.valorBusquedad == "";
      this.opcionesB = "";
    },
    //Obtener lista de usuario
    getListUsuarios() {
      let me = this;
   
      var url = "/C-usuarios";
      axios
        .get(url, {
          params: {
            filtro: this.filtroBusquedad,
            busquedad: this.valorBusquedad,
          },
        })
        .then((response) => {
          me.listUsuario = response.data.usuarios;
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
#vs1__combobox {
  height: 37px;
}
</style>



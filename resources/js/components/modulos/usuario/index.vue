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
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in listUsuario" :key="item.id">
                <td>prube</td>
                <td>{{ item.nombre }}</td>
                <td>{{ item.apellido }}</td>
                <td>{{ item.usuario }}</td>
                <td>{{ item.rol }}</td>
                <td>{{ item.estado }}</td>
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
        });
    },
  },
};
</script>

<style>
#vs1__combobox {
  height: 37px;
}
</style>

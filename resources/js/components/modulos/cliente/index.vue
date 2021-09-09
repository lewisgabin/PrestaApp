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
      <div class="card-body">
        <div class="table-responsive">
             <div class="btn-group mr-1 mb-1">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="editar(10)">
                                                Primary
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="javascript:void(0);">Option 1</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Option 2</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Option 3</a>
                                            </div>
                                        </div>
                                    </div>
          <table
            class="table dataTable table-striped"
            style="width: 98% !important"
            id="userDatatable1"
          >
            <thead>
              <tr>
                <th>CLIENTE</th>
                <th># DOCUMENTO</th>
                <th>CONTACTO</th>
                <th>RUTA</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="cliente in listClientes" :key="cliente.id">
                <td>{{ cliente.nombre }}</td>
                <td>{{ cliente.cedula }}</td>
                <td>{{ cliente.whatsapp }}</td>
                <td>{{ cliente.id_ruta }}</td>
                <td>
                  <div class="btn-group mr-1 mb-1">
                    <div class="dropdown">
                      <button
                        class="btn btn-secondary dropdown-toggle btn-sm"
                        type="button"
                        id="dropdownMenuButtonIcon"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="bx bx-error-circle mr-50"></i> OPCIONES
                      </button>
                      <div
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButtonIcon"
                        style=""
                      >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-bar-chart-alt-2 mr-50"></i> Option
                          1</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-bell mr-50"></i> Option 2</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-time mr-50"></i> Option 3</a
                        >
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th rowspan="1" colspan="1">Cliente</th>
                <th rowspan="1" colspan="1"># Documento</th>
                <th rowspan="1" colspan="1">Contacto</th>
                <th rowspan="1" colspan="1">Ruta</th>
                <th rowspan="1" colspan="1">Acciones</th>
              </tr>
            </tfoot>
          </table>
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
      listClientes: [],
      listEstado: [
        { value: 0, label: "Inactivo" },
        { value: 1, label: "Activo" },
      ],
    };
  },
  mounted() {
    this.getListCliente();

    if (this.$route.params.estado == 1) {
      this.$toast.open({
        message: "Cliente creado con exito!",
        type: "success",
        duration: 4000,
        dismissible: true,
        position: "top-right",
      });
    }
    if (this.$route.params.estado == 2) {
      this.$toast.open({
        message: "Cliente editado con exito!",
        type: "success",
        duration: 4000,
        dismissible: true,
        position: "top-right",
      });
    }
    if (this.$route.params.estado == 3) {
      this.$toast.open({
        message: "Problema para guardar el Cliente",
        type: "error",
        duration: 4000,
        dismissible: true,
        position: "top-right",
      });
    }
  },
  methods: {
    //Obtener lista de Cliente
    dataTable() {
      this.$nextTick(() => {
        $("#userDatatable1").DataTable({
          language: {
            url: "http://prestaapp.test/css/es.json",
          },
          processing: true,
          scrollY: false,
          scrollX: false,
          processing: true,
          autoFill: true,
          dom: "Blfrtip",
          buttons: ["copy", "pdf", "print", "excel"],
        });
      });
    },
    getListCliente() {
      let me = this;
      this.$loading(true);
      var url = "/C-clientes";
      axios.get(url).then((response) => {
        me.listClientes = response.data.data;
        me.dataTable();
        me.$loading(false);
      });
    },
    // navegar hacia editar
    editar(id) {
      this.$router.push({
        name: "clienteEditar",
        params: { idCliente: id, metodo: "editar" },
      });
    },
    //activar o desactivar
    activarDesactivar() {
      alert("lenady");
      /* let me = this;
      this.$swal({
        title: "Esta seguro?",
        text: "Que desea '" + metodo + "' el cliente!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#ff5b5c",
        confirmButtonColor: "#5a8dee",
        confirmButtonText: "Si, " + metodo + "!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete("/C-clientes/" + id).then((response) => {
            me.$swal(
              "" + metodo2 + "!",
              "El cliente a sido " + metodo2 + ".",
              "success"
            );
            me.getListCliente();
          });
        }
      });*/
    },
  },
};
</script>

<style  scoped>
#vs1__combobox {
  height: 37px;
}
.table thead th {
  color: #475f7b;
}
</style>



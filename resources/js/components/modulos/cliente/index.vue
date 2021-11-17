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
                <th>ESTADO</th>
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
                  <div v-if="!cliente.estado" class="text-danger">Inactivo</div>
                  <div v-else class="text-success">Activo</div>
                </td>
                <td>
                    <div style="display: flex">
                  <button
                      type="button"
                      v-tooltip.top="'Editar Usuario.'"
                      class="btn btn-icon btn-light-secondary glow mr-1"
                      @click="
                        editar(cliente.id)
                      "
                    >
                      <i class="bx bxs-edit-alt"></i>
                    </button>
                    <button
                      v-if="cliente.estado"
                      @click="
                        activarDesactivar(
                          cliente.id,
                          'Desactivar',
                          'Desactivado'
                        )
                      "
                      type="button"
                      v-tooltip.top="'Desactivar Usuario.'"
                      class="btn btn-icon btn-light-secondary glow"
                    >
                      <i class="bx bxs-trash"></i>
                    </button>
                    <button
                      v-else
                      type="button"
                      @click="activarDesactivar(cliente.id, 'Activar', 'Activado')"
                      v-tooltip.top="'Activar Usuario.'"
                      class="btn btn-icon btn-light-secondary glow"
                    >
                      <i class="bx bx-power-off"></i>
                    </button>
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
                <th rowspan="1" colspan="1">Estado</th>
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
      inicial: 0,
    };
  }, created () {
            document.title = "Listado de clientes";
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
        if (me.inicial == 0) {
          me.dataTable();
          me.inicial = 1;
        }

        me.$loading(false);
      });
    },
    prueba(event) {
    document.getElementById("myDropdown").classList.toggle("show");
    },

    // navegar hacia editar
    editar(id) {
      this.$router.push({
        name: "clienteEditar",
        params: { idCliente: id, metodo: "editar" },
      });
    },
    //activar o desactivar
    activarDesactivar(id, metodo, metodo2) {
      let me = this;
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
      });
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



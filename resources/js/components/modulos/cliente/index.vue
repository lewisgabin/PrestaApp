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
          <table class="table" id="userDatatable1" v-once>
            <thead>
              <tr>
                <th>CLIENTE</th>
                <th># DOCUMENTO</th>
              </tr>
            </thead>
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
      listUsuario: [],
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
    //Obtener lista de usuario
    getListUsuarios() {
      let me = this;
      this.$loading(true);
      var url = "/prueba";
      axios.get(url).then((response) => {
        me.listUsuario = response.data.data;

        me.$loading(false);

        $("#userDatatable1").DataTable({
          language: {
            url: "http://prestaapp.test/css/es.json",
          },
          processing: true,
          scrollY: false,
             scrollX: false,
          processing: true,
          autoFill: true,
             dom: 'Blfrtip',
          buttons: ["copy","pdf","print","excel"],
          
          data: me.listUsuario,
          columns: [{ data: "nombre" }, { data: "apellido" }],
        });
       
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
.table thead th {
  color: #475f7b;
}



</style>



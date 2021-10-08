<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-1 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">
            Nuevo Prestamo
          </h5>
          <div class="breadcrumb-wrapper d-none d-sm-block">
            <ol class="breadcrumb p-0 mb-0 pl-1">
              <li class="breadcrumb-item">
                <a href="index.html"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </div>
          <router-link
            :to="'/cliente'"
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
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 col-12">
            <label for="first-name-icon">CLIENTE:</label>
            <div class="form-label-group has-icon-left shadow">
              <v-select
                class=""
                v-model="prestamo.clienteId"
                label="nombre"
                :options="listCliente"
                placeholder="Seleccione..."
              ></v-select>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">MONTO A PRESTAR:</label>
            <div class="input-group form-label-group shadow">
              <div class="input-group-prepend">
                <span class="input-group-text">$RD</span>
              </div>
              <input
                type="number"
                class="form-control"
                v-model="prestamo.monto"
              />
              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12">
            <label for="first-name-icon">NUMERO DE CUOTAS:</label>
            <div class="input-group form-label-group shadow">
              <input
                type="number"
                class="form-control"
                v-model="prestamo.numeroCuota"
              />
              <div class="input-group-append">
                <span class="input-group-text">CUOTAS</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">PORSENTAJE INTERES (TASA):</label>
            <div class="input-group form-label-group shadow">
              <div class="input-group-prepend">
                <span class="input-group-text">%</span>
              </div>
              <input v-model="prestamo.tasa" class="form-control" />
            </div>
          </div>

          <div class="col-md-4 col-12">
            <label class="form__label">MODALIDAD DE PAGO:</label>
            <div class="form-label-group shadow">
              <v-select
                v-model="prestamo.modalidadPago"
                class="form__input"
                style="color: #475f7b !important"
                :options="['Mensual', 'Semanal', 'Quincenal', 'Diario']"
                placeholder="Seleccione..."
              >
              </v-select>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label class="form__label">FECHA PRIMER PAGO</label>
            <div class="form-group form-label-group">
              <datepicker
                class="shadow"
                v-model="prestamo.fechaPrimerPago"
                :format="'YYYY-MM-DD'"
                :value-type="'format'"
              ></datepicker>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label class="form__label">AMORTIZACION:</label>
            <div class="form-label-group shadow">
              <v-select
                v-model="prestamo.amortizacion"
                class="form__input"
                style="color: #475f7b !important"
                :options="[
                  'Disminuir Cuotas (Metodo Aleman)',
                  'Cuotas Fijas (Metodo Frances)',
                  'Capital al Final (Metodo Americano)',
                  'Interes Fijo'
                ]"
                placeholder="Seleccione..."
              >
              </v-select>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">MONTO DE CUOTA:</label>
            <div class="input-group shadow">
              <div class="input-group-prepend">
                <span class="input-group-text">$RD</span>
              </div>
              <input
                type="number"
                class="form-control"
                v-model="prestamo.cuota"
              />
              <div class="input-group-append">
                <span class="input-group-text"
                  ><div
                    class="checkbox checkbox-primary checkbox-glow bg-primar"
                  >
                    <input
                      type="checkbox"
                      id="checkboxGlow1"
                      class="bg-primar"
                    />
                    <label
                      for="checkboxGlow1"
                      style="margin-left: 29px; font-size: 0.8rem !important"
                    >
                      FIJAR CUOTA</label
                    >
                  </div></span
                >
              </div>
            </div>
          </div>
        </div>

        <div v-if="verOpcion">
          <div class="divider ">
            <div class="divider-text" style="color: #5a8dee;">Mas Opciones</div>
          </div>
          <div class="row">
            <div class="col-md-3 col-12">
              <label for="first-name-icon">MORA LUEGO:</label>
              <div class="input-group form-label-group shadow">
                <input
                  type="number"
                  class="form-control"
                  v-model="prestamo.moraLuego"
                />
                <div class="input-group-append">
                  <span class="input-group-text">DIAS</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-12">
              <label for="first-name-icon">MORA DIARIA:</label>
              <div class="input-group form-label-group shadow">
                <input
                  type="number"
                  class="form-control"
                  v-model="prestamo.moraDiaria"
                />
                <div class="input-group-append">
                  <span class="input-group-text">%</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <label for="first-name-icon">PRESTAMOS VIEJOS:</label>
              <div class="input-group shadow">
                <div class="input-group-prepend">
                  <span class="input-group-text"
                    ><div
                      class="checkbox checkbox-primary checkbox-glow bg-primar"
                    >
                      <input
                       v-model="checkCuotas"
                        type="checkbox"
                      
                        class="bg-primar"
                      />
                      <label
                        for="checkboxGlow1"
                        style="margin-left: 29px; font-size: 0.8rem !important"
                      >
                       CUOTAS COBRADAS</label
                      >
                    </div></span
                  >
                </div>
                <input
                  type="number"
                  class="form-control"
                  :readonly="checkCuotas == 0"
                  v-model="prestamo.cuotasCobrada"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <button
          v-on:click="verOpciones()"
          type="button"
          class="btn btn-light-secondary mr-1 mb-1 col-md-12"
        >
          <i class="bx bx-plus"></i> <span class="ml-25">MAS OPCIONES</span>
        </button>
      </div>
      <div class="col-md-12">
        <button type="button" class="btn btn-light-primary mr-1 mb-1 col-md-12">
          <i class="bx bxs-calculator"></i> <span class="ml-25">CALCULAR</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import datepicker from "vue2-datepicker";
var moment = require("moment");
export default {
  data: function() {
    return {
      listCliente: [],
      prestamo: {
        clienteId: "",
        fechaPrimerPago: moment().format("YYYY-MM-DD"),
        monto: 0,
        tasa: 0,
        cuota: 0,
        numeroCuota: 0,
        amortizacion: "",
        modalidadPago: "Semanal",
        moraDiara: 0,
        moraLuego: 0,
        cuotasCobrada:0,
      },
      checkCuotas:0,
      checkFijar:0,
      verOpcion: 0
    };
  },
  components: {
    datepicker
  },
  mounted() {
    this.getClientes();
  },
  methods: {
    //obtener todos los clientes
    getClientes() {
      axios.get("/C-prestamo/getClientes").then(response => {
        this.listCliente = response.data.data;
      });
    },
    verOpciones() {
      this.verOpcion = !this.verOpcion;
    }
  }
};
</script>

<style>
.vs__search {
  color: #475f7b !important;
}
</style>

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
                :class="{ error1: $v.clienteId.$error }"
                class=""
                v-model="clienteId"
                label="nombre"
                :options="listCliente"
                placeholder="Seleccione..."
              ></v-select>
            </div>
            <div class="error" v-if="!$v.clienteId.required">
              Cliente es requerido!
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">MONTO A PRESTAR:</label>
            <div class="input-group form-label-group shadow">
              <div class="input-group-prepend">
                <span
                  class="input-group-text"
                  :class="{ error1: $v.monto.$error }"
                  >$RD</span
                >
              </div>
              <input
                type="number"
                class="form-control"
                v-model="monto"
                onclick="select()"
                :class="{ error1: $v.monto.$error }"
              />

              <div class="input-group-append">
                <span
                  class="input-group-text"
                  :class="{ error1: $v.monto.$error }"
                  >.00</span
                >
              </div>
            </div>
            <div class="error" v-if="!$v.monto.required">
              Cuota es requerida!
            </div>
            <div class="error" v-if="!$v.monto.minValue">
              La Cuota debe ser mayor a 999 pesos!.
            </div>
          </div>

          <div class="col-md-4 col-12">
            <label for="first-name-icon">NUMERO DE CUOTAS:</label>
            <div class="input-group form-label-group shadow">
              <input
                type="number"
                class="form-control"
                onclick="select()"
                v-model="numeroCuota"
                :class="{ error1: $v.numeroCuota.$error }"
              />
              <div class="input-group-append">
                <span
                  class="input-group-text"
                  :class="{ error1: $v.numeroCuota.$error }"
                  >CUOTAS</span
                >
              </div>
            </div>
            <div class="error" v-if="!$v.numeroCuota.required">
              Numero de Cuota es requerida!
            </div>
            <div class="error" v-if="!$v.numeroCuota.minValue">
              El numero de Cuota debe ser mayor a 1!.
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">PORSENTAJE INTERES (TASA):</label>
            <div class="input-group form-label-group shadow">
              <div class="input-group-prepend">
                <span
                  class="input-group-text"
                  :class="{ error1: $v.tasa.$error }"
                  >%</span
                >
              </div>
              <input
                v-model="tasa"
                class="form-control"
                onclick="select()"
                :class="{ error1: $v.tasa.$error }"
              />
            </div>
            <div class="error" v-if="!$v.tasa.minValue">
              El porsiento de la tasa debe ser igual o mayor a 0!.
            </div>
            <div class="error" v-if="!$v.tasa.required">
              El porsiento de la tasa es requerido!.
            </div>
          </div>

          <div class="col-md-4 col-12">
            <label class="form__label">MODALIDAD DE PAGO:</label>
            <div class="form-label-group shadow">
              <v-select
                v-model="modalidadPago"
                :class="{ error1: $v.modalidadPago.$error }"
                class="form__input"
                style="color: #475f7b !important"
                :options="['Mensual', 'Semanal', 'Quincenal', 'Diario']"
                placeholder="Seleccione..."
              >
              </v-select>
            </div>
            <div class="error" v-if="!$v.modalidadPago.required">
              Modalidad de pago es requerido!.
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label class="form__label">FECHA PRIMER PAGO</label>
            <div class="form-group form-label-group">
              <datepicker
                class="shadow"
                :class="{ error1: $v.fechaPrimerPago.$error }"
                v-model="fechaPrimerPago"
                :format="'YYYY-MM-DD'"
                :value-type="'format'"
              ></datepicker>
            </div>
            <div class="error" v-if="!$v.fechaPrimerPago.required">
              La fecha es requerida!.
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label class="form__label">AMORTIZACION:</label>
            <div class="form-label-group shadow">
              <v-select
                v-model="amortizacion"
                class="form__input"
                style="color: #475f7b !important"
                :options="[
                  'INSOLUTO',
                  'INSOLUTO (Cuotas Fijas)',
                  'CAPITAL AL FINAL (Linea de credito)',
                  'ABSOLUTO',
                ]"
                placeholder="Seleccione..."
              >
              </v-select>
            </div>
            <div class="error" v-if="!$v.amortizacion.required">
              La amortizacion es requerida!.
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">MONTO DE CUOTA:</label>
            <div class="input-group form-label-group shadow">
              <div class="input-group-prepend">
                <span class="input-group-text">$RD</span>
              </div>
              <input
                type="number"
                class="form-control"
                onclick="select()"
                v-model="cuota"
                :readonly="checkFijar == 0"
              />
              <div class="input-group-append">
                <span class="input-group-text"
                  ><div
                    class="checkbox checkbox-primary checkbox-glow bg-primar"
                    v-on:click="checkbox(1)"
                  >
                    <input
                      type="checkbox"
                      v-model="checkFijar"
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
          <div class="col-md-4 col-12">
            <label for="first-name-icon">RUTA:</label>
            <fieldset class="form-label-group shadow">
              <v-select
                v-model="ruta"
                :options="listRutas"
                label="nombre"
              ></v-select>
            </fieldset>
          </div>
        </div>

        <div v-if="verOpcion">
          <div class="divider">
            <div class="divider-text" style="color: #5a8dee">Mas Opciones</div>
          </div>
          <div class="row">
            <div class="col-md-4 col-12">
              <label for="first-name-icon">MORA LUEGO:</label>
              <div class="input-group form-label-group shadow">
                <input
                  :class="{ error1: $v.moraLuego.$error }"
                  type="number"
                  class="form-control"
                  v-model="moraLuego"
                  onclick="select()"
                />
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    :class="{ error1: $v.moraLuego.$error }"
                    >DIAS</span
                  >
                </div>
              </div>
              <div class="error" v-if="!$v.moraLuego.required">
                Este campo es requerido requerida!
              </div>
            </div>
            <div class="col-md-4 col-12">
              <label for="first-name-icon">MORA DIARIA:</label>
              <div class="input-group form-label-group shadow">
                <input
                  :class="{ error1: $v.moraDiara.$error }"
                  type="number"
                  class="form-control"
                  v-model="moraDiara"
                  onclick="select()"
                />
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    :class="{ error1: $v.moraDiara.$error }"
                    >%</span
                  >
                </div>
              </div>
              <div class="error" v-if="!$v.moraDiara.required">
                Este campo es requerido requerida!
              </div>
            </div>
            <div class="col-md-4 col-12">
              <label for="first-name-icon">PRESTAMOS VIEJOS:</label>
              <div class="input-group form-label-group shadow">
                <div class="input-group-prepend">
                  <span class="input-group-text"
                    ><div
                      v-on:click="checkbox(2)"
                      class="checkbox checkbox-primary checkbox-glow bg-primar"
                    >
                      <input
                        v-model="checkCuotas"
                        type="checkbox"
                        class="bg-primar"
                        id="colorCheckbox2"
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
                  onclick="select()"
                  v-model="cuotasCobrada"
                />
              </div>
            </div>
            <div class="col-md-4 col-12">
              <label for="first-name-icon">GARANTE:</label>
              <div class="form-label-group has-icon-left shadow">
                <v-select
                  class=""
                  v-model="garante"
                  label="nombre"
                  :options="listCliente"
                  placeholder="Seleccione..."
                ></v-select>
              </div>
            </div>

            <div class="col-md-4 col-12">
              <label class="form__label">CARTERA:</label>
              <div class="form-label-group shadow">
                <v-select
                  v-model="cartera"
                  class="form__input"
                  style="color: #475f7b !important"
                  :options="['Sin cartera']"
                  placeholder="Seleccione..."
                >
                </v-select>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <label class="form__label">TIPO DE GARANTIA:</label>
              <div class="form-label-group shadow">
                <v-select
                  v-model="garantia"
                  class="form__input"
                  style="color: #475f7b !important"
                  :options="[
                    'CON GARANTIA',
                    'SIN GARANTIA',
                    'VEHICULO',
                    'MOTOR',
                  ]"
                  placeholder="Seleccione..."
                >
                </v-select>
              </div>
            </div>

            <div class="col-md-4 col-12">
              <label for="first-name-icon">GASTO DE CIERRE:</label>
              <div style="float: right">
                <div class="checkbox checkbox-primary" v-on:click="checkbox(3)">
                  <input type="checkbox" v-model="checkPorcentaje" />
                  <label
                    for="colorCheckbox1"
                    style="font-size: 0.9rem !important"
                    >Porcentaje?</label
                  >
                </div>
              </div>
              <div class="input-group form-label-group shadow">
                <div class="input-group-prepend">
                  <span class="input-group-text" v-if="checkPorcentaje == 0"
                    >$RD</span
                  >
                  <span class="input-group-text" v-else>%</span>
                </div>
                <input
                  v-model="gastoCierre"
                  class="form-control"
                  onclick="select()"
                />
              </div>
            </div>

            <div class="col-md-2 col-12">
              <label for="first-name-icon">PAGO MINIMO:</label>
              <div class="form-label-group shadow">
                <select class="form-control" id="" v-model="pagoMinimo">
                  <option :value="true">SI</option>
                  <option :value="false">NO</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 col-12" v-if="pagoMinimo == 1">
              <label for="first-name-icon">TIPO DE PAGO MINIMO:</label>
              <div class="form-label-group shadow">
                <select class="form-control" id="" v-model="tipoPagoMinimo">
                  <option value="Pago al Interes">Pago al Interes</option>
                  <option value="Pago al Capital">Pago al Capital</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 col-12" v-if="pagoMinimo == 1">
              <label for="first-name-icon">PORCENTAJE DE PAGO MINIMO:</label>
              <div class="form-label-group shadow">
                <input
                  class="form-control"
                  :class="{ error1: $v.porcentajePagoMinimo.$error }"
                  id=""
                  v-model="porcentajePagoMinimo"
                  onclick="select()"
                />
              </div>
              <div class="error" v-if="!$v.porcentajePagoMinimo.between">
                Debe estar dentro de 1 y 100!.
              </div>
              <div class="error" v-if="!$v.porcentajePagoMinimo.required">
                Este campo es requerido!.
              </div>
            
            </div>
            <div class="col-md-12">
              <label for="">COMENTARIOS:</label>
              <textarea
                name="comment"
                class="form-control shadow"
                id=""
                cols="10"
                style="width: 100%"
              ></textarea>
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
        <button
          type="button"
          v-on:click="checkInput"
          class="btn btn-light-primary mr-1 mb-1 col-md-12"
        >
          <i class="bx bxs-calculator"></i> <span class="ml-25">CALCULAR</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import datepicker from "vue2-datepicker";
import { required, minValue, requiredIf ,between,maxValue} from "vuelidate/lib/validators";
var moment = require("moment");
export default {
  data: function () {
    return {
      listCliente: [],
      clienteId: 0,
      fechaPrimerPago: moment().format("YYYY-MM-DD"),
      monto: 1000,
      tasa: 0,
      cuota: 0,
      numeroCuota: 1,
      amortizacion: "ABSOLUTO",
      modalidadPago: "Semanal",
      moraDiara: 0,
      moraLuego: 0,
      cuotasCobrada: 0,
      gastoCierre: 0,
      cartera: "Sin Cartera",
      garantia: "SIN GARANTIA",
      garante: "",
      porcentajePagoMinimo: 100,
      pagoMinimo: true,
      tipoPagoMinimo: "Pago al Interes",
      ruta: "",
      checkCuotas: false,
      checkFijar: false,
      verOpcion: 0,
      checkPorcentaje: 0,
      listRutas: [],
    };
  },
  components: {
    datepicker,
  },
  validations: {
    monto: {
      minValue: minValue(1000),
      required,
    },
    clienteId: {
      required,
    },
    tasa: {
      minValue: minValue(0),
      required,
    },
    numeroCuota: {
      minValue: minValue(1),
      required,
    },
    modalidadPago: {
      required,
    },
    amortizacion: {
      required,
    },
    fechaPrimerPago: {
      required,
    },
    moraDiara: {
      required,
    },
    moraLuego: {
      required,
    },
    porcentajePagoMinimo: {
     between:between(1, 100),
     required
    },
  },
  mounted() {
    this.getClientes();
    this.getRutas();
  },
  methods: {
    //obtener todos los clientes
    getClientes() {
      axios.get("/C-prestamo/getClientes").then((response) => {
        this.listCliente = response.data.data;
      });
    },
    // para ver opciones
    verOpciones() {
      this.verOpcion = !this.verOpcion;
    },
    //funcionamiento de todos lo checkbock
    checkbox(nombre) {
      if (nombre == 1) {
        this.checkFijar = !this.checkFijar;
      }
      if (nombre == 2) {
        this.checkCuotas = !this.checkCuotas;
      }
      if (nombre == 3) {
        this.checkPorcentaje = !this.checkPorcentaje;
      }
    },
    //get lista de rutas
    getRutas() {
      var url = "/GetRutas";
      axios.get(url).then((response) => {
        this.listRutas = response.data.rutas;
      });
    },
    //activar validacion
    checkInput() {
      if (this.clienteId == 0) {
        this.clienteId = "";
      }
      this.$v.$touch();
      if (!this.$v.$error) {
      }
    },
  },
};
</script>

<style>
.vs__search {
  color: #475f7b !important;
}
</style>

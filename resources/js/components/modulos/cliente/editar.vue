<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-1 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Clientes</h5>
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

    <div class="row">
      <div class="col-md-6 col-12 col-sm-12">
        <div class="card collapse-icon accordion-icon-rotate">
          <div
            class="card-header border-bottom d-flex"
            style="padding-bottom: 15px; padding-top: 15px"
          >
            <div class="col-md-12">
              <h2 class="card-title" style="font-size: 1.1rem">
                DATOS GENERALES
              </h2>
            </div>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li>
                  <a
                    data-action="collapse"
                    style="color: white"
                    class=""
                    @click="openClose($event)"
                  >
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand" @click="zoomCard($event)">
                    <i class="bx bx-fullscreen"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body" style="" id="card-body-1">
              <div class="row" style="justify-content: center">
                <div class="col-sm-12 col-md-4 col-10" style="margin-top: 27px">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input
                        type="file"
                        id="imageUpload"
                        name="profile_pic"
                        accept=".png, .jpg, .jpeg"
                        @change="getFile"
                      />
                      <label for="imageUpload">
                        <i class="bx bxs-pencil"></i>
                      </label>
                    </div>
                    <div class="avatar-preview">
                      <div
                        class="profile-user-img img-responsive img-circle"
                        id="imagePreview"
                        style="
                          background-image: url('../images/sin.png');
                          background-size: 100% 100%;
                          height: 100%;
                        "
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="first-name-icon">NOMBRE:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.nombre"
                      placeholder="Nombre"
                      class="form-control shadow"
                      :class="{
                        error: typeof errorArray.nombre !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="errorArray.nombre">
                      {{ errorArray.nombre[0] }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="first-name-icon">APELLIDOS:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.apellidos"
                      placeholder="Apellidos"
                      class="form-control shadow"
                      :class="{
                        error: typeof errorArray.apellidos !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="errorArray.apellidos">
                      {{ errorArray.apellidos[0] }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">APODO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.apodo"
                      placeholder="Apodo"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">DOC.IDENTIDAD:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.cedula"
                      placeholder="Ej: Numero de cedula"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">OCUPACION:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.ocupacion"
                      placeholder="Ocupacion"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">FECHA NACIMIENTO:</label>
                  <fieldset class="form-group position-relative has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.fecha_nacimiento"
                      class="form-control shadow pickadate-months-year"
                      placeholder="Select Date"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">NACIONALIDAD:</label>
                  <div class="form-label-group has-icon-left">
                    <select
                      class="form-control shadow"
                      id="basicSelect"
                      v-model="cliente.nacionalidad"
                      :class="{
                        error: typeof errorArray.nacionalidad !== 'undefined',
                      }"
                    >
                      <option>Americana</option>
                      <option selected>Dominicana</option>
                      <option>Ecuatoriana</option>
                      <option>Haitiana</option>
                      <option>Venezolana</option>
                      <option>Latino-America</option>
                      <option>Nicaraguense</option>
                    </select>
                    <span class="error" v-if="errorArray.nacionalidad">
                      {{ errorArray.nacionalidad[0] }}
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">SEXO:</label>
                  <ul class="list-unstyled mb-0" style="margin-top: 5px">
                    <li class="d-inline-block mr-2 mb-1">
                      <fieldset>
                        <div class="radio radio-info radio-glow">
                          <input
                            type="radio"
                            id="radioGlow1"
                            name="radioGlow"
                            checked=""
                          />
                          <label for="radioGlow1">MASCULINO</label>
                        </div>
                      </fieldset>
                    </li>
                    <li class="d-inline-block mr-2 mb-1">
                      <fieldset>
                        <div class="radio radio-danger radio-glow">
                          <input
                            type="radio"
                            id="radioGlow2"
                            name="radioGlow"
                          />
                          <label for="radioGlow2">FEMENINO</label>
                        </div>
                      </fieldset>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12 col-sm-12">
        <div class="card collapse-icon accordion-icon-rotate">
          <div
            class="card-header border-bottom d-flex"
            style="padding-bottom: 15px; padding-top: 15px"
          >
            <div class="col-md-12">
              <h2 class="card-title" style="font-size: 1.1rem">OTROS DATOS</h2>
            </div>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li>
                  <a
                    data-action="collapse"
                    style="color: white"
                    class=""
                    @click="openClose($event)"
                  >
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand" @click="zoomCard($event)">
                    <i class="bx bx-fullscreen"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body" style="">
              <div class="row" style="margin-top: 25px">
                <div class="col-md-6">
                  <label for="first-name-icon">WHATSAPP:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.whatsapp"
                      placeholder="(000)-000-0000"
                      class="form-control shadow"
                      :class="{
                        error: typeof errorArray.whatsapp !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="errorArray.whatsapp">
                      {{ errorArray.whatsapp[0] }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-mobile"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">TEL.PRINCIPAL:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.tel_principal"
                      placeholder="(000)-000-0000"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-mobile"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">TEL.OTRO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.tel_otro"
                      placeholder="(000)-000-0000"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-mobile"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">EMAIL:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.email"
                      placeholder="Email"
                      class="form-control shadow"
                      :class="{
                        error: typeof errorArray.email !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="errorArray.email">
                      {{ errorArray.email[0] }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-mail-send"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="first-name-icon">DIRECCION:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.direccion"
                      placeholder="Direccion"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-home"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">PROVINCIA:</label>
                  <fieldset class="form-group shadow">
                    <v-select
                      v-model="provincia"
                      :options="listProvincias"
                      label="nombre"
                      @input="getMunicipio(provincia, 'select')"
                    ></v-select
                    ><!-- lewis-->
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">MUNICIPIO:</label>

                  <fieldset class="form-group shadow">
                    <v-select
                      v-model="municipio"
                      :options="listMunicipios"
                      label="nombre"
                    ></v-select>
                  </fieldset>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">SECTOR:</label>
                  <fieldset class="form-group shadow">
                    <v-select
                      v-model="sector"
                      :options="['sector', 'slug']"
                    ></v-select>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">RUTA:</label>

                  <fieldset class="form-group shadow">
                    <v-select
                      v-model="rutaa"
                      :options="['ruta', 'slug']"
                    ></v-select>
                  </fieldset>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">DIRECCION DE TRABAJO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.direccion_trabajo"
                      placeholder="Donde trabaja"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-buildings"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">RECOMENDADO POR:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="cliente.recomendado_por"
                      placeholder="Quien recomendor"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-user-voice"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="first-name-icon">COMENTARIO / NOTAS:</label>
                  <fieldset class="form-group">
                    <textarea
                      class="form-control"
                      id="basicTextarea"
                      rows="3"
                      placeholder="Textarea"
                      v-model="cliente.comentario"
                    ></textarea>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12 col-sm-12">
        <div class="card collapse-icon accordion-icon-rotate">
          <div
            class="card-header border-bottom d-flex"
            style="padding-bottom: 15px; padding-top: 15px"
          >
            <div class="col-md-12">
              <h2 class="card-title" style="font-size: 1.1rem">
                DATOS DEL FIADOR (OPCIONAL)
              </h2>
            </div>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li>
                  <a
                    data-action="collapse"
                    style="color: white"
                    class=""
                    @click="openClose($event)"
                  >
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand" @click="zoomCard($event)">
                    <i class="bx bx-fullscreen"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div
            class="card-content collapse"
            :class="{ show: fiador.nombre !== '' }"
          >
            <div class="card-body" style="">
              <div class="row" style="margin-top: 25px">
                <div class="col-md-6">
                  <label for="first-name-icon">NOMBRE:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="fiador.nombre"
                      placeholder="Nombre"
                      class="form-control shadow"
                      :class="{
                        error: typeof mensajeError.nombre !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="mensajeError.nombre">
                      {{ mensajeError.nombre }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">APELLIDO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="fiador.apellidos"
                      placeholder="Apellido"
                      class="form-control shadow"
                      :class="{
                        error: typeof mensajeError.apellidos !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="mensajeError.apellidos">
                      {{ mensajeError.apellidos }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="first-name-icon">APODO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="fiador.apodo"
                      placeholder="Apodo"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">DOC.IDENTIDAD:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="fiador.cedula"
                      placeholder="Cedula"
                      class="form-control shadow"
                      :class="{
                        error: typeof mensajeError.cedula !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="mensajeError.cedula">
                      {{ mensajeError.cedula }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="first-name-icon">TELEFONO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="fiador.telefono"
                      placeholder="(000)-000-0000"
                      class="form-control shadow"
                      :class="{
                        error: typeof mensajeError.telefono !== 'undefined',
                      }"
                    />
                    <span class="error" v-if="mensajeError.telefono">
                      {{ mensajeError.telefono }}
                    </span>
                    <div class="form-control-position">
                      <i class="bx bx-phone"></i>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="first-name-icon">CELULAR:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="fiador.celular"
                      placeholder="(000)-000-0000"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-phone"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="first-name-icon">DIRECCION:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      v-model="fiador.direccion"
                      placeholder="Direccion"
                      class="form-control shadow"
                    />
                    <div class="form-control-position">
                      <i class="bx bx-home"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="card collapse-icon accordion-icon-rotate">
          <div
            class="card-header border-bottom d-flex"
            style="padding-bottom: 15px; padding-top: 15px"
          >
            <div class="col-md-12">
              <h2 class="card-title" style="font-size: 1.1rem">
                REFERENCIAS PERSONALES
              </h2>
            </div>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li>
                  <a
                    data-action="collapse"
                    style="color: white"
                    class=""
                    @click="openClose($event)"
                  >
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand" @click="zoomCard($event)">
                    <i class="bx bx-fullscreen"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse">
            <div class="card-body" style="">
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 offset-md-1 card envio" style="text-align: center">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button
            type="button"
            @click="registrarCliente"
            class="btn btn-2 btn-success glow"
          >
            <i class="bx bx-2 bx-save"></i
            ><span class="align-middle ml-25">Guardar</span>
          </button>
          <button type="button" class="btn btn-2 btn-light-secondary">
            <i class="bx bx-user-plus" style="font-size: 1.7rem !important"></i
            ><span class="align-middle ml-25">Guardar y Nuevo Cliente</span>
          </button>
          <button type="button" class="btn btn-2 btn-light-primary">
            <i class="bx bx-2 bx-dollar"></i
            ><span class="align-middle ml-25">Guardar y Nuevo Prestamo</span>
          </button>
        </div>
      </div>
    </div>
    <!-- modal de errores -->
  </div>
</template>

    
<script>
import vue2Dropzone from "vue2-dropzone";

import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
  props: ["ruta"],
  components: {
    vueDropzone: vue2Dropzone,
  },
  data: function () {
    return {
      dropzoneOptions: {
        url: "https://httpbin.org/post4",
        thumbnailWidth: 200,
        maxFilesize: 3,
        headers: { "My-Awesome-Header": "header value" },
        addRemoveLinks: true,
      },
      idCliente: 0,
      municipio: "",
      provincia: "",
      rutaa: "ruta",
      sector: "sector",
      cliente: {
        nombre: "",
        apellidos: "",
        apodo: "",
        cedula: "",
        fecha_nacimiento: "",
        ocupacion: "",
        nacionalidad: "",
        sexo: "1",
        whatsapp: "",
        tel_principal: "",
        tel_otro: "",
        email: "",
        direccion: "",
        sector: "",
        id_ruta: 1,
        direccion_trabajo: "",
        foto: "",
        recomendado_por: "",
        comentario: "",
      },
      fiador: {
        nombre: "",
        apellidos: "",
        apodo: "",
        cedula: "",
        direccion: "",
        telefono: "",
        celular: "",
      },
      mensajeError: {},
      listRol: [],
      errorArray: [],
      textoComponet: "Crear Cliente",
      modalShow: false,
      isLoading: false,
      fullPage: true,
      mostrarModal: {
        display: "block",
        background: "#0000006b",
      },
      ocultarModal: {
        display: "none",
      },
      form: new FormData(),
      clienteId: 0,
      metodo: "crear",
      listProvincias: [],
      listMunicipios: [],
      estado:true
    };
  },
  mounted() {
    this.getProvincias();

    if (this.$route.params.metodo == "editar") {
      this.$loading(true);
      this.metodo = this.$route.params.metodo;
      this.idCliente = this.$route.params.idCliente;
      this.obtenerCliente(this.$route.params.idCliente);
    }
  },
  methods: {
    //metodo validar envio de datos
    validarRegistrarCliente() {
      this.mensajeError = { dev: "dev" };
     this.estado = true;

      if (!this.fiador.nombre) {
        this.mensajeError.nombre = "El Nombre es un campo obligatorio";
        this.estado = false;
      }
      if (!this.fiador.apellidos) {
        this.mensajeError.apellidos = "El Apellido es un campo obligatorio";
        this.estado = false;
      }
      if (!this.fiador.cedula) {
        this.mensajeError.cedula = "La Cédula es un campo obligatorio";
        this.estado = false;
      }
      if (!this.fiador.telefono) {
        this.mensajeError.telefono = "El Teléfono es un campo obligatorio";
        this.estado = false;
      }
    
     this.guardarCliente();
    },
    //presenta la imagen en image input
    getFile(e) {
      this.cliente.foto = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#imagePreview").css(
          "background-image",
          "url(" + reader.result + ")"
        );
        $("#imagePreview").show();
        $("#imagePreview").fadeIn(650);
      };
      reader.readAsDataURL(e.target.files[0]);
    },
    //abrir y cerrar card
    openClose(event) {
      var div =
        event.target.parentNode.parentNode.parentNode.parentNode.parentNode
          .parentNode;
      div.querySelector(".card-content").classList.toggle("show");
      div.querySelector(".list-inline li a").classList.toggle("rotate");
    },
    //amplia el card
    zoomCard(event) {
      var div =
        event.target.parentNode.parentNode.parentNode.parentNode.parentNode
          .parentNode;
      console.log(div);
      //   div.querySelector('.card-content').classList.toggle('show');
      div.classList.toggle("card-fullscreen");
    },
    getProvincias() {
      this.$loading(true);
      var url = "/GetProvincias";
      axios.get(url).then((response) => {
        this.listProvincias = response.data.provincias;
        this.$loading(false);
      });
    },
    getMunicipio(provinciaSeleccionada, metodo) {
      if (!this.provincia == "") {
        // metodo recibe el nombre ddel componete de donde a sido llamado el metodo --lewis
        if (metodo == "select") {
          provinciaSeleccionada = provinciaSeleccionada.id;
        }
        this.municipio = "";
        var url = "/GetMunicipios/" + provinciaSeleccionada;
        axios.get(url).then((response) => {
          this.listMunicipios = response.data.municipios;
        });
      }
    },
    // valida el envio al metodo guardar 
    registrarCliente() {
  
      if (
        this.fiador.nombre  ||
        this.fiador.apellidos  ||
        this.fiador.apodo  ||
        this.fiador.cedula  ||
        this.fiador.telefono  ||
        this.fiador.celular  ||
        this.fiador.direccion 
      ) {
        this.validarRegistrarCliente();
      } else {
        this.estado = true;
        this.mensajeError = { dev: "dev" };
        this.guardarCliente();
           
      }
    },
    guardarCliente() {
      this.errorArray = [];

      this.$loading(true);
      //Datos Cliente
      this.form.append("estado", this.estado);
      this.form.append("id_cliente", this.idCliente);
      this.form.append("nombre", this.cliente.nombre);
      this.form.append("apellidos", this.cliente.apellidos);
      this.form.append("apodo", this.cliente.apodo);
      this.form.append("cedula", this.cliente.cedula);
      this.form.append("fecha_nacimiento", this.cliente.fecha_nacimiento);
      this.form.append("ocupacion", this.cliente.ocupacion);
      this.form.append("nacionalidad", this.cliente.nacionalidad);
      this.form.append("sexo", this.cliente.sexo);
      this.form.append("whatsapp", this.cliente.whatsapp);
      this.form.append("tel_principal", this.cliente.tel_principal);
      this.form.append("tel_otro", this.cliente.tel_otro);
      this.form.append("email", this.cliente.email);
      this.form.append("direccion", this.cliente.direccion);
      //por que si no se selecionan no de error --lewis
      if (!this.provincia == "") {
        this.form.append("id_provincia", this.provincia.id);
      } else {
        this.form.append("id_provincia", "");
      }
      if (!this.municipio == "") {
        this.form.append("id_municipio", this.municipio.id);
      } else {
        this.form.append("id_municipio", "");
      }
       if (!this.fiador == "") {
        this.form.append("fiador_id", this.fiador.id);
      }

      this.form.append("sector", this.sector);
      this.form.append("id_ruta", this.cliente.id_ruta);
      this.form.append("direccion_trabajo", this.cliente.direccion_trabajo);
      this.form.append("recomendado_por", this.cliente.recomendado_por);
      this.form.append("comentario", this.cliente.comentario);
      this.form.append("file", this.cliente.foto);
      this.form.append("id", this.$route.params.idCliente);
      //Datos Fiador
      this.form.append("F_nombre", this.fiador.nombre);
      this.form.append("F_apellidos", this.fiador.apellidos);
      this.form.append("F_apodo", this.fiador.apodo);
      this.form.append("F_cedula", this.fiador.cedula);
      this.form.append("F_telefono", this.fiador.telefono);
      this.form.append("F_celular", this.fiador.celular);
      this.form.append("F_direccion", this.fiador.direccion);

      const config = { headers: { "Content-Type": "multipart/form-data" } };
      var url = "/C-clientes/editar";
      let me = this;
      if (this.metodo == "editar") {
        axios
          .post(url, this.form, config)
          .then((response) => {
             if (response.data.estado == false) {
                 me.$loading(false);
            } else {
                 me.$router.push({ name: "clienteIndex", params: { estado: 2 } });

             }
          })
          .catch((error) => {
            if (error.response.data.errors) {
              me.errorArray = error.response.data.errors;
              me.$loading(false);
            }
          });
      }
    },
    //Limpia campo
    limpiaCampos() {
      (this.cliente.nombre = ""),
        (this.cliente.apellidos = ""),
        (this.cliente.apodo = ""),
        (this.cliente.cedula = ""),
        (this.cliente.fecha_nacimiento = Date.now()),
        (this.cliente.ocupacion = ""),
        (this.cliente.nacionalidad = ""),
        (this.cliente.sexo = "1"),
        (this.cliente.whatsapp = ""),
        (this.cliente.tel_principal = ""),
        (this.cliente.tel_otro = ""),
        (this.cliente.email = ""),
        (this.cliente.direccion = ""),
        (this.cliente.id_provincia = 1),
        (this.cliente.id_municipio = 1),
        (this.cliente.sector = ""),
        (this.cliente.id_ruta = 1),
        (this.cliente.direccion_trabajo = ""),
        (this.cliente.foto = ""),
        (this.cliente.recomendado_por = ""),
        (this.cliente.comentario = ""),
        (this.errorArray = []);
    },
    obtenerCliente(idC) {
      var url = "/C-clientes/" + idC;
      let me = this;
      axios
        .get(url)
        .then((response) => {
          me.cliente = response.data.cliente;
          me.provincia = response.data.provincia;

          if (response.data.fiador) {
            me.fiador = response.data.fiador;
          }
          me.getMunicipio(response.data.provincia.id, "obtenerCliente");
          me.municipio = me.cliente.municipio; //--lewis
          me.$loading(false);

          // $("#imagePreview").css(
          //   "background-image",
          //   "url('" + "../storage/img/users/" + me.cliente.foto + "')"
          // );
          // me.cliente.foto = false;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
.vs__search {
  padding: 2px 7px !important;
}
.vs__dropdown-toggle {
  border: 1px solid #dfe3e7 !important;
}

@media (max-width: 1563px) {
  #card-body-1 {
    padding-bottom: 61px !important;
  }
}

@media (min-width: 1563px) {
  #card-body-1 {
    padding-bottom: 85px !important;
  }
}
.envio {
  text-align: center;
  background: white;
  padding: 21px;
  border-radius: 0.267rem;

  border: 0px solid #dfe3e7;
}
.card-header {
  background-image: linear-gradient(
    to right,
    #5a8dee,
    #5a8dee,
    #5a8dee,
    #5a8dee,
    #5a8dee,
    #5687f0,
    #5481f2,
    #537bf4,
    #586bf6,
    #6359f5,
    #7342f1,
    #8518e9
  );
  color: white !important;
}
.card-title {
  color: white !important;
}

.avatar-upload .avatar-edit input + label {
  background-image: linear-gradient(
    to right top,
    #5a8dee,
    #5a8dee,
    #5a8dee,
    #5a8dee,
    #5a8dee,
    #5687f0,
    #5481f2,
    #537bf4,
    #586bf6,
    #6359f5,
    #7342f1,
    #8518e9
  );
}
.btn-2 {
  padding: 0.567rem 1.6rem !important;
  font-size: 1.3rem !important;
}
.bx-2 {
  font-size: 1.5rem !important;
}
.error {
  color: #ff5b5c;
  font-size: small;
  border-color: #ff5b5c;
}
</style>
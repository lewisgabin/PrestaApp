<template>
  <div>
    <div class="content-header row">
      <div class="content-header-left col-12 mb-1 mt-1">
        <div class="breadcrumbs-top">
          <h5 class="content-header-title float-left pr-1 mb-0">Usuarios</h5>
          <div class="breadcrumb-wrapper d-none d-sm-block">
            <ol class="breadcrumb p-0 mb-0 pl-1">
              <li class="breadcrumb-item">
                <a href="index.html"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </div>
          <router-link
            :to="'/usuario'"
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
                  <a data-action="collapse" class="">
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand">
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
                  <label for="first-name-icon">NOMBRE*:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      placeholder="Nombre"
                      class="form-control shadow"
                    />
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
                      placeholder="Apellidos"
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
                  <label for="first-name-icon">APODO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
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
                    <select class="form-control shadow" id="basicSelect">
                      <option>Americana</option>
                      <option selected>Dominicana</option>
                      <option>Ecuatoriana</option>
                      <option>Haitiana</option>
                      <option>Venezolana</option>
                      <option>Latino-America</option>
                      <option>Nicaraguense</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">FECHA NACIMIENTO:</label>
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
                  <a data-action="collapse" class="">
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand">
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
                      placeholder="(000)-000-0000"
                      class="form-control shadow"
                    />
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
                      placeholder="Email"
                      class="form-control shadow"
                    />
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
                      @input="getListRol"
                      :options="['provincia', 'slug']"
                    ></v-select>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">MUNICIPIO:</label>

                  <fieldset class="form-group shadow">
                    <v-select
                      v-model="municipio"
                      @input="getListRol"
                      :options="['municipio', 'slug']"
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
                      @input="getListRol"
                      :options="['sector', 'slug']"
                    ></v-select>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">RUTA:</label>

                  <fieldset class="form-group shadow">
                    <v-select
                      v-model="ruta"
                      @input="getListRol"
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
                  <a data-action="collapse" class="rotate" style="color: white">
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand">
                    <i class="bx bx-fullscreen"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse">
            <div class="card-body" style="">
              <div class="row" style="margin-top: 25px">
                <div class="col-md-6">
                  <label for="first-name-icon">NOMBRE*:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      placeholder="Nombre"
                      class="form-control shadow"
                    />
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
                      placeholder="Apellido"
                      class="form-control shadow"
                    />
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
                      placeholder="Cedula"
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
                  <label for="first-name-icon">TELEFONO:</label>
                  <div class="form-label-group has-icon-left">
                    <input
                      type="text"
                      placeholder="(000)-000-0000"
                      class="form-control shadow"
                    />
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
                  <a data-action="collapse" class="rotate" style="color: white">
                    <i class="bx bx-chevron-down"></i>
                  </a>
                </li>
                <li>
                  <a data-action="expand">
                    <i class="bx bx-fullscreen"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse">
            <div class="card-body" style="">
              <div class="row" style="margin-top: 25px">
                <form class="form repeater-default">
                  <div data-repeater-list="group-a">
                    <div data-repeater-item="">
                      <div class="row justify-content-between">
                        <div class="col-md-4 col-sm-12 form-group">
                          <label for="Nombre">NOMBRE </label>
                          <input
                            type="text"
                            class="form-control"
                            id="Nombre"
                            placeholder="Enter Nombre"
                          />
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                          <label> APELLIDO</label>
                          <input
                            type="text"
                            class="form-control"
                            id="apellido"
                            placeholder="Enter Apellido"
                          />
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                          <label>TELEFONO</label>
                          <input
                            type="text"
                            class="form-control"
                            id="telefono"
                            placeholder="(000)-000-0000"
                          />
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                          <label>DIRECCION</label>
                          <input
                            type="text"
                            class="form-control"
                            id="direccion"
                            placeholder="Enter Direccion"
                          />
                        </div>
                        <div class="col-md-3 col-sm-12 form-group">
                          <label for="gender">PARENTESCO</label>
                          <select
                            name="group-a[0][gender]"
                            id="parentesco"
                            class="form-control"
                          >
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Tio">Tio</option>
                            <option value="Amigo">Amigo</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Conyugue">Conyugue</option>
                          </select>
                        </div>

                        <div
                          class="
                            col-md-3 col-sm-12
                            form-group
                            d-flex
                            align-items-center
                            pt-2
                          "
                        >
                          <button
                            class="btn btn-danger text-nowrap px-1"
                            data-repeater-delete=""
                            type="button"
                          >
                            <i class="bx bx-x"></i>
                            Borrar
                          </button>
                        </div>
                      </div>
                      <hr />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col p-0">
                      <button
                        class="btn btn-success"
                        data-repeater-create=""
                        type="button"
                      >
                        <i class="bx bx-plus"></i>
                        Agregar Otra
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 offset-md-1 card envio" style="text-align: center" >
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-2 btn-success glow">
            <i class="bx bx-2 bx-save"></i
            ><span class="align-middle ml-25">Guardar</span>
          </button>
          <button type="button" class="btn btn-2 btn-light-secondary ">
            <i class="bx  bx-user-plus" style="font-size: 1.7rem !important;"></i
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
export default {
  data: function () {
    return {
      dropzoneOptions: {
        url: "https://httpbin.org/post4",
        thumbnailWidth: 200,
        maxFilesize: 3,
        headers: { "My-Awesome-Header": "header value" },
        addRemoveLinks: true,
      },
      municipio: "municipio",
      provincia: "provincia",
      ruta: "ruta",
      sector: "sector",
    };
  },
  mounted() {},
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
.envio{
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
</style>
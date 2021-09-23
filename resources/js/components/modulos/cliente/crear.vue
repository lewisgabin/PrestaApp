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
                            v-model="cliente.sexo"
                            id="radioGlow1"
                            name="radioGlow"
                            value="1"
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
                            v-model="cliente.sexo"
                            id="radioGlow2"
                            value="0"
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
                      @input="getMunicipio"
                    ></v-select>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <label for="first-name-icon">MUNICIPIO:</label>

                  <fieldset class="form-group shadow">
                    <v-select
                      v-model="municipio"
                      :options="listMunicipios"
                      label="nombre"
                      @input="getSector"
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
                      :options="listSectores"
                      label="nombre"
                    ></v-select>
                  </fieldset>
                  <button class="btn btn-primary" style="padding: 10px;" @click="abrirCerrarModal"><i class="bx bx-plus"></i></button>
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
          <div class="card-content collapse">
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
              <div class="row" style="margin-top: 10px">
                <div
                  class="row justify-content-between"
                  v-for="(input, i) in inputs"
                  :key="i"
                  style="margin-top: 15px"
                >
                  <div class="col-md-4 col-sm-12 form-group">
                    <label for="Nombre">NOMBRE </label>
                    <input
                      v-model="input.nombre"
                      class="form-control shadow"
                      placeholder="Enter Nombre"
                      :class="{
                        error: mensajeErrorR[i].nombre !== '',
                      }"
                    />
                    <span class="error" v-if="mensajeErrorR[i].nombre">
                      {{ mensajeErrorR[i].nombre }}
                    </span>
                  </div>
                  <div class="col-md-4 col-sm-12 form-group">
                    <label> APELLIDO</label>
                    <input
                      v-model="input.apellido"
                      class="form-control shadow"
                      placeholder="Enter Apellido"
                      :class="{
                        error: mensajeErrorR[i].apellido !== '',
                      }"
                    />
                    <span class="error" v-if="mensajeErrorR[i].apellido">
                      {{ mensajeErrorR[i].apellido }}
                    </span>
                  </div>
                  <div class="col-md-4 col-sm-12 form-group">
                    <label>TELEFONO</label>
                    <input
                      v-model="input.telefono"
                      class="form-control shadow"
                      placeholder="(000)-000-0000"
                    />
                  </div>
                  <div class="col-md-6 col-sm-12 form-group">
                    <label>DIRECCION</label>
                    <input
                      v-model="input.direccion"
                      class="form-control shadow"
                      placeholder="Enter Direccion"
                    />
                  </div>
                  <div class="col-md-4 col-sm-12 form-group">
                    <label for="gender">PARENTESCO</label>
                    <select
                      v-model="input.parentesco"
                      class="form-control shadow"
                      :class="{
                        error: mensajeErrorR[i].parentesco !== '',
                      }"
                    >
                      <option value="Padre">Padre</option>
                      <option value="Madre">Madre</option>
                      <option value="Tio">Tio</option>
                      <option value="Amigo">Amigo</option>
                      <option value="Familiar">Familiar</option>
                      <option value="Conyugue">Conyugue</option>
                      <option value=""></option>
                    </select>
                    <span class="error" v-if="mensajeErrorR[i].parentesco">
                      {{ mensajeErrorR[0].parentesco }}
                    </span>
                  </div>

                  <div
                    class="
                      col-md-2 col-sm-12
                      form-group
                      d-flex
                      align-items-center
                      pt-2
                    "
                  >
                    <button
                      class="btn btn-danger text-nowrap px-1"
                      @click="remove(i)"
                      v-show="i || (!i && inputs.length > 1)"
                    >
                      <i class="bx bxs-user-minus"></i>
                    </button>
                  </div>
                  <div class="col-md-12">
                    <div
                      style="
                        width: 100%;
                        border-bottom: 1px solid #dce1e6;
                        height: 16px;
                      "
                    ></div>
                  </div>
                  <div class="col-md-12" style="margin-top: 15px">
                    <div class="col p-0">
                      <button
                        class="btn btn-success"
                        @click="add(i)"
                        v-show="i == inputs.length - 1"
                      >
                        <i class="bx bxs-user-plus"></i>
                        Agregar Otra
                      </button>
                    </div>
                  </div>
                </div>
              </div>
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
          <button
            type="button"
            class="btn btn-2 btn-light-secondary"
            @click="prueba()"
          >
            <i class="bx bx-user-plus" style="font-size: 1.7rem !important"></i
            ><span class="align-middle ml-25">Guardar y Nuevo Cliente</span>
          </button>
          <button type="button" class="btn btn-2 btn-light-primary">
            <i class="bx bx-2 bx-dollar"></i
            ><span class="align-middle ml-25">Guardar y Nuevo Prestamo </span>
          </button>
        </div>
      </div>
    </div>
    <!-- modal de errores -->

    <!-- modal de crear y editar -->
    <div
      class="modal fade text-left"
      id="danger "
      tabindex="-1"
      :class="{ show: modalShow }"
      :style="modalShow ? mostrarModal : ocultarModal"
      aria-labelledby="myModalLabel120"
      style="display: none"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        id="modalError"
      >
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title white" id="myModalLabel120">
              Crear nuevo sector
            </h5>
            <button
              type="button"
              class="close"
              aria-label="Close"
              @click="modalShow = 0"
            >
              <i class="bx bx-x"></i>
            </button>
          </div>
          <div class="modal-body" id="form">
            <div class="row">
              <div class="col-md-12 col-12">
                <label for="first-name-icon">NOMBRE</label>
                <div class="form-label-group has-icon-left">
                  <input
                    v-model="sector.nombre"
                    type="text"
                    placeholder="Nombre"
                    class="form-control"
                  />
                  <div class="form-control-position">
                    <i class="bx bx-home"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-light-secondary"
              data-dismiss="modal"
              @click="modalShow = 0"
            >
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Cerrar</span>
            </button>
            <button
              type="button"
              class="btn btn-primary ml-1"
              @click="guardarSector()"
            >
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Guardar</span>
            </button>
          </div>
        </div>
      </div>
    </div>
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
      modalShow: false,
      municipio: "",
      provincia: "",
      rutaa: "ruta",
      sector: "",
      cliente: {
        nombre: "",
        apellidos: "",
        apodo: "",
        cedula: "",
        fecha_nacimiento: "2017-06-15",
        ocupacion: "",
        nacionalidad: "Dominicana",
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
      refPersonal: {
        informacion: [],
      },
      mensajeError: {},
      mensajeErrorR: [{ nombre: "", apellido: "", parentesco: "" }],
      errorArray: [],
      mostrarModal: {
        display: "block",
        background: "#0000006b",
      },
      ocultarModal: {
        display: "none",
      },
      form: new FormData(),
      metodo: "crear",
      listProvincias: [],
      listMunicipios: [],
      listSectores: [],
      erroresEnFiador: false,
      estado: true,
      estado2: true,
      inputs: [
        {
          nombre: "",
          apellido: "",
          telefono: "",
          direccion: "",
          parentesco: "",
        },
      ],
      sector: {
        idMunicipio: 0,
        nombre: "",
      }
    };
  },
  mounted() {
    this.getProvincias();
  },
  methods: {
    add(index) {
      this.inputs.push({ name: "" });
      this.mensajeErrorR.push({ nombre: "", apellido: "", parentesco: "" });
    },
    remove(index) {
      this.inputs.splice(index, 1);
      this.mensajeErrorR.splice(index, 1);
    },
    //metodo validar envio de datos
    validarRegistrarFiador() {
      //limpio la variable de errores
      this.mensajeError = { dev: "dev" };
      //valido si el esta vacio
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
    //abrir y cerrar modal
    abrirCerrarModal() {
      this.modalShow = !this.modalShow;
      this.sector.nombre = "";
    },
    guardarSector(){
      this.sector.idMunicipio = this.municipio.id;
      axios
          .post("/C-clienteSector", this.sector)
          .then((response) => {
            this.modalShow = 0;
            this.$toast.open({
              message: "Sector creado con exito!",
              type: "success",
              duration: 2000,
              dismissible: true,
              position: "top-right",
            });
          })
          .catch((error) => {
              console.log(error);
          });
    },
    // valida el envio al metodo guardar
    registrarCliente() {
      this.estado = true;
      this.estado2 = true;
      //valido si hay un campo de fiador lleno para validar
      if (
        this.fiador.nombre ||
        this.fiador.apellidos ||
        this.fiador.apodo ||
        this.fiador.cedula ||
        this.fiador.direccion ||
        this.fiador.telefono ||
        this.fiador.celular
      ) {
        //llamo al metodo validar
        this.validarRegistrarFiador();
      }
      if (true) {
           this.estado2 = true;
        // recorror el array input para saber cuanta referecia se van a agregar
        for (var i = 0; i < this.inputs.length; i++) {
          //valido si hay algunas llena
          if (
            this.inputs[i].nombre ||
            this.inputs[i].apellido ||
            this.inputs[i].parentesco ||
            this.inputs[i].direccion ||
            this.inputs[i].telefono
          ) {
            //si exite alguna llena entoces valido los campos
            //si esta vacio el campo
            if (!this.inputs[i].nombre) {
              this.mensajeErrorR[i].nombre =
                "El Nombre es un campo obligatorio";
              this.estado2 = false;
              //si esta lleno, entoces borro el mensaje ya que no se pueden borrar la variable mensajeErrorR
            } else {
              this.mensajeErrorR[i].nombre = "";
            
            }
            if (!this.inputs[i].apellido) {
              this.mensajeErrorR[i].apellido =
                "El Apellido es un campo obligatorio";
              this.estado2 = false;
            } else {
              this.mensajeErrorR[i].apellido = "";
            
            }
            if (!this.inputs[i].parentesco) {
              this.mensajeErrorR[i].parentesco =
                "El Parentesco es un campo obligatorio";
              this.estado2 = false;
            } else {
              this.mensajeErrorR[i].parentesco = "";
            
            }
            //SI NO HA LLENADO NIGUN CAMPO LE BORRAN LOS MENSAJE, EN CASO DE QUE ANTERIORMENTE SE ALLA VALIDADO
          } else {
            this.mensajeErrorR[i].nombre = "";
            this.mensajeErrorR[i].apellido = "";
            this.mensajeErrorR[i].parentesco = "";
          }
        }
      }
      //EL ESTADO PERTENECE A FIADOR Y QUIERES DECIR QUE BIEN VALIDADO
      if (this.estado == true) {
        this.mensajeError = { dev: "dev" };
        this.guardarCliente();
      } else {
        this.guardarCliente();
      }
    },
    getProvincias() {
      this.$loading(true);
      var url = "/GetProvincias";
      axios.get(url).then((response) => {
        this.listProvincias = response.data.provincias;
        this.$loading(false);
      });
    },
    getMunicipio(provinciaSeleccionada) {
      var url = "/GetMunicipios/" + provinciaSeleccionada.id;
      axios.get(url).then((response) => {
        this.listMunicipios = response.data.municipios;
      });
    },
    getSector(municipioSeleccionado){
      var url = "/GetSectores/" + municipioSeleccionado.id;
      axios.get(url).then((response) => {
        this.listSectores = response.data.sectores;
      });
    },
    guardarCliente() {
      //validando  referencias

      this.errorArray = [];
      this.$loading(true);
      //DATOS VALIDAR
      this.form.append("estado", this.estado);
      this.form.append("estado2", this.estado2);
      //DATOS CLIENTE
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
      if (!this.sector == "") {
        this.form.append("sector", this.sector.nombre);
      } else {
        this.form.append("sector", "");
      }
$route('home')
      this.form.append("id_ruta", this.cliente.id_ruta);
      this.form.append("direccion_trabajo", this.cliente.direccion_trabajo);
      this.form.append("recomendado_por", this.cliente.recomendado_por);
      this.form.append("comentario", this.cliente.comentario);
      this.form.append("file", this.cliente.foto);
      //DATOS FIADOR
      this.form.append("F_nombre", this.fiador.nombre);
      this.form.append("F_apellidos", this.fiador.apellidos);
      this.form.append("F_apodo", this.fiador.apodo);
      this.form.append("F_cedula", this.fiador.cedula);
      this.form.append("F_telefono", this.fiador.telefono);
      this.form.append("F_celular", this.fiador.celular);
      this.form.append("F_direccion", this.fiador.direccion);
      
      const config = { headers: { "Content-Type": "multipart/form-data" } };

      let me = this;
      if (this.metodo == "crear") {
        axios
          .post("/C-clientes", this.form, config)
          .then((response) => {
            if (
              response.data.estado == false ||
              response.data.estado2 == "false"
            ) {
              me.$loading(false);
            } else {
              if (response.data.idCliente > 0 && this.inputs[0].nombre) {
                this.guardarReferencias(response.data.idCliente);
              } else {
                me.$router.push({
                  name: "clienteIndex",
                  params: { estado: 1 },
                });
              }
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
    //Guardar las referencias personales
    guardarReferencias(idClienteGuardado){
      //Se hace una copia del arreglo en la propiedad informacion del objeto refPersonal
      this.refPersonal.informacion = this.inputs.slice();
      this.refPersonal.idCliente = idClienteGuardado;

      axios
          .post("/C-clienteReferencia", this.refPersonal)
          .then((response) => {
            this.$router.push({name: "clienteIndex", params: { estado: 1 }});
          })
          .catch((error) => {
            console.log(error);
          });
    },
    //Limpia campo
    limpiaCampos() {
        (this.cliente.nombre = ""),
        (this.cliente.apellidos = ""),
        (this.cliente.apodo = ""),
        (this.cliente.cedula = ""),
        (this.cliente.fecha_nacimiento = "2017-06-15"),
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
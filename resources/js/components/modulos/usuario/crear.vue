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
            <router-link :to="'/usuario'" type="button" style="float: right;" class="btn btn-light-primary mr-1 mb-1">
            <i class="bx bx-undo"></i
            ><span class="align-middle ml-25">Volver</span>
          </router-link>
        </div>
      </div>
    </div>
    <div class="card collapse-icon accordion-icon-rotate">
      <div class="card-header">
        <div class="col-md-4">
          <h2 class="card-title">Crear Usuario</h2>
        </div>
      </div>
      <div class="card-body">
       
        <div class="row">
           <div class="col-md-4">
             <vue-dropzone ref="myVueDropzone" id="dropzone" class="dropzone dropzone-area dz-clickable" :options="dropzoneOptions"></vue-dropzone>
          
        </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">NOMBRE</label>
            <div class="form-label-group has-icon-left">
              <input type="text" class="form-control" placeholder="Nombre" />
              <div class="form-control-position">
                <i class="bx bx-user"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <label for="first-name-icon">APELLIDO</label>
            <div class="form-label-group has-icon-left">
              <input type="text" class="form-control" placeholder="Apellido" />
              <div class="form-control-position">
                <i class="bx bx-user"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">EMAIL</label>
            <div class="form-label-group has-icon-left">
              <input type="email" class="form-control" placeholder="Usuario" />
              <div class="form-control-position">
                <i class="bx bx-mail-send"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">USUARIO</label>
            <div class="form-label-group has-icon-left">
              <input type="text" class="form-control" placeholder="Usuario" />
              <div class="form-control-position">
                <i class="bx bx-user-check"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">PASSWORD</label>
            <div class="form-label-group has-icon-left">
              <input type="password" class="form-control" placeholder="Clave" />
              <div class="form-control-position">
                <i class="bx bx-lock"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <label for="first-name-icon">ROL</label>
            <div class="form-label-group has-icon-left">
              <select class="form-control" placeholder="Rol">
                <option value="">prueba</option>
              </select>
              <div class="form-control-position">
                <i class="bx bx-sitemap"></i>
              </div>
            </div>
          </div>

          <div class="col-12 d-flex justify-content-end">
            <button type="reset" class="btn btn-light-secondary mr-1">
              Reset
            </button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
  props: ["ruta"],
   components: {
    vueDropzone: vue2Dropzone
  },  data: function () {
    return {
      dropzoneOptions: {
          url: 'https://httpbin.org/post4',
          thumbnailWidth: 200,
          maxFilesize: 3,
          headers: { "My-Awesome-Header": "header value" },
          addRemoveLinks: true
      }
    }
    }
};
</script>

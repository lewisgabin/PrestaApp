import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes:[
        { path: '/', component:require('./components/Home.vue').default, name:'home'},
        { path: '/logoutt', component:require('./components/Logout.vue').default},
        { path: '/usuario', component:require('./components/modulos/usuario/index.vue').default, name:'usuarioIndex'},
        { path: '/permiso', component:require('./components/modulos/permisos/index.vue').default},
        { path: '/crear/usuario', component:require('./components/modulos/usuario/crear.vue').default, name:'usuarioCrear'},
        { path: '/editar/usuario', component:require('./components/modulos/usuario/editar.vue').default, name:'usuarioEditar',},
        {path: '/permiso', component:require('./components/modulos/permisos/index.vue').default, name:'permisoIndex'},
        {path: '/rol', component:require('./components/modulos/rol/index.vue').default, name:'rolIndex'},
        {path: '/crear/rol', component:require('./components/modulos/rol/crear.vue').default, name:'rolCrear'},
        {path: '/editar/rol', component:require('./components/modulos/rol/crear.vue').default, name:'rolEditar'},
        {path: '/clientes', component:require('./components/modulos/cliente/index.vue').default, name:'clienteIndex'},
        {path: '/crear/cliente', component:require('./components/modulos/cliente/crear.vue').default, name:'clienteCrear'},
      
    ],
    mode:'history',
    linkActiveClass: 'active'
})
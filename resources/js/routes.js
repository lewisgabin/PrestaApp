import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes:[
        { path: '/', component:require('./components/Home.vue').default},
        { path: '/usuario', component:require('./components/modulos/usuario/index.vue').default, name:'usuarioIndex'},
        { path: '/permiso', component:require('./components/modulos/permisos/index.vue').default},
        { path: '/crear/usuario', component:require('./components/modulos/usuario/crear.vue').default},
    ],
    mode:'history',
    linkActiveClass: 'active'
})
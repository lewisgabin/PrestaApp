import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes:[
        { path: '/', component:require('./components/Home.vue').default},
        { path: '/rol', component:require('./components/modulos/rol/index.vue').default},
        { path: '/permiso', component:require('./components/modulos/permisos/index.vue').default},
    ],
    mode:'history'
})
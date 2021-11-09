import Vue from 'vue';

import App from './vue/App';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faBars } from "@fortawesome/free-solid-svg-icons";
import { faPlayCircle } from "@fortawesome/free-solid-svg-icons";
import { faAngleDoubleDown } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import Fragment from 'vue-fragment';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'jquery/src/jquery.js'
import 'bootstrap/dist/js/bootstrap.min.js'
global.jQuery = require('jquery');
const $ = global.jQuery;
window.$ = $;

require('./bootstrap');

library.add(faBars, faPlayCircle, faAngleDoubleDown)

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.use(Fragment.Plugin);

Vue.config.productionTip = false;

new Vue({
    render: h => h(App)
}).$mount('#app');

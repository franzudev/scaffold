/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Multiselect from 'vue-multiselect';
import VueClip from 'vue-clip';
import VueContentPlaceholders from 'vue-content-placeholders';
import Vuex from 'vuex';
import Notify from "$mixins/Notify";
import Vue from "vue";
import { emitter } from "$services/EventBus";
const moment = require('moment');
require('moment/locale/it');

require('./bootstrap');

(<any>window).Vue = Vue;

Vue.use(require('vue-moment'), {
    moment
});
Vue.component('multiselect', Multiselect);
Vue.use(VueContentPlaceholders);
Vue.use(Vuex);
Vue.mixin(Notify)
Vue.use(VueClip)

const store = new Vuex.Store({});

require('./components/components_loader');

Vue.prototype.$host = process.env.MIX_APP_ENV === 'production'? process.env.MIX_APP_URL : process.env.MIX_DEV_APP_URL

Vue.prototype.$bus = emitter;

Vue.prototype.$screen = Vue.observable({
    width: window.innerWidth
});

window.addEventListener('resize', () => {
    Vue.prototype.$screen.width = window.innerWidth;
});

const app = new Vue({
    el: '#app',
    store
});

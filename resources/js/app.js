require('./bootstrap')
// import Vue from 'vue'
window.Vue = require('vue');

import CarouselOwl from 'vue-owl-carousel'
import VueSlickCarousel from 'vue-slick-carousel'
import VueTheMask from 'vue-the-mask'
import Snotify from 'vue-snotify'
import VueMoment from 'vue-moment'
import VueSweetalert2 from 'vue-sweetalert2'
import { VLazyImagePlugin } from "v-lazy-image"
import Notifications from 'vue-notification'

import store from './store'
import './global/filters'
// import './script.js'

import { ApolloClient } from 'apollo-client'
import { createHttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'

// HTTP connection to the API
const httpLink = createHttpLink({
  // You should use an absolute URL here
  uri: 'http://localhost:3020/graphql',
})

// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
  link: httpLink,
  cache,
})

import Vue from 'vue'
import VueApollo from 'vue-apollo'

Vue.use(VueApollo)

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})








const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



Vue.use(CarouselOwl)
Vue.use(VueTheMask)
Vue.use(Snotify)
Vue.use(VueSweetalert2)
Vue.use(VLazyImagePlugin)
Vue.use(VueSlickCarousel)
Vue.use(Notifications)
Vue.use(VueMoment)

const app = new Vue({
    el: '#app',
    components: { CarouselOwl, VueTheMask, Snotify, VLazyImagePlugin, VueSlickCarousel, Notifications },
    store,
    apolloProvider,
    mounted() {
        $('[data-toggle="tooltip"]').tooltip()
    },
});

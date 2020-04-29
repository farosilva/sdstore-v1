import Vue from 'vue'
import Vuex from 'vuex'
import address from './modules/Address'
import cart from './modules/Cart'
import session from './modules/Session'
import checkout from './modules/Checkout'

Vue.use(Vuex);
export default new Vuex.Store({
    modules: {
        address,
        cart,
        session,
        checkout,
    }
});


const state = {
    loading: false,
    cart: {
        items: {},
        resume: {},
        expiration: null
    },
    config:{
        input_quantity_max: 99
    },
    component: {
        cartListHeader: false
    }
}

const mutations = {
    SET_CART_LIST_HEADER(state, status){
        state.component.cartListHeader = status
    },
    SET_CART(state, cart){
        state.cart.items = cart.items,
        state.cart.resume = cart.resume
    },
    SET_CART_EXPIRATION(state, expiration){
        state.cart.expiration = expiration
    }
}

const actions = {
    addToCart({dispatch}, formData){
        return new Promise((resolve, reject) => {
            axios.post('/database/cart/add', formData)
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
    getCart({commit}){
        return new Promise((resolve, reject) => {
            axios.post('/database/cart')
            .then((response) => {
                commit('SET_CART', response.data)
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
    getExpirationTime({commit}){
        return new Promise((resolve, reject) => {
            axios.post('/database/cart/expiration-time')
            .then((response) => {
                commit('SET_CART_EXPIRATION', response.data)
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    }
}

const getters = {}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}

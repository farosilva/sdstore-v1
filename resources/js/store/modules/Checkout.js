
const state = {
    loading: true,
    hash: null
}

const mutations = {
    SET_LOADING(state, loading){
        state.loading = loading
    },
    SET_HASH(state, hash){
        state.hash = hash
    },
}

const actions = {
    setSessionId({}, session){
        return new Promise((resolve, reject) => {
            PagSeguroDirectPayment.setSessionId(session)
        })
    },
    onSenderHashReady({commit}){
        return new Promise((resolve, reject) => {
            PagSeguroDirectPayment.onSenderHashReady(function(response){
                if(response.status == 'error') {
                    console.log(response.message)
                    // commit('SET_LOADING', false)
                    reject(response)
                }
                commit('SET_HASH', response.senderHash)//Hash estará disponível nesta variável.
                resolve(response)
                commit('SET_LOADING', false)
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

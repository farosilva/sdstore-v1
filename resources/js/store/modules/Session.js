const state = {
    loading: false,
}

const mutations = {

}

const actions = {
    welcomeModalSetDontShowAgain({}){
        return new Promise((resolve, reject) => {
            axios.post('/session/components/welcome-modal/set-dont-show-again')
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
    welcomeModalGetDontShowAgain({}){
        return new Promise((resolve, reject) => {
            axios.post('/session/components/welcome-modal/get-dont-show-again')
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
    welcomeModalSetPostCode({}, data){
        return new Promise((resolve, reject) => {
            axios.post('session/components/welcome-modal/set-post-code', {
                post_code: data
            })
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
    welcomeModalGetPostCode({}){
        return new Promise((resolve, reject) => {
            axios.post('session/components/welcome-modal/get-post-code')
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
}

const getters = {

}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}

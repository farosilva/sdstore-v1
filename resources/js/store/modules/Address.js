const state = {
    loading: false,
    post_code: null,
    api_data: {
        cep: '',
        logradouro: 'logradouro by API',
        complemento: '',
        bairro: '',
        localidade: '',
        uf: '',
        ibge: '',
    }
}

const mutations = {
    SET_POST_CODE(state, post_code){
        state.post_code = post_code
    },
    SET_API_DATA(state, api_data){
        state.api_data = {
            cep: api_data.cep,
            logradouro: api_data.logradouro,
            complemento: api_data.complemento,
            bairro: api_data.bairro,
            localidade: api_data.localidade,
            uf: api_data.uf,
            ibge: api_data.ibge,
        }
    }
}

const actions = {
    showWelcomeDeliveryModal({}){
        $('#welcomeModal').modal('show')
    },
    getCityByCode({}, formData){
        return new Promise((resolve, reject) => {
            axios.post('/api/delivery/get-city-by-code', {
                ibge_id: formData
            })
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
    getAddressByCEP({}, formData){
        return new Promise((resolve, reject) => {
            axios.get('https://viacep.com.br/ws/'+ formData +'/json/')
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        })
    },
    setRememberEmail({}, formData){
        // console.log(formData)
        return new Promise((resolve, reject) => {
            axios.post('/api/delivery/set-remember', formData)
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

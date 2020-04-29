import Vue from 'vue'

Vue.filter('moneyFormat', function(value){
    if(isNaN(value)){
        return '';
    }else{
        return 'R$ '+value.toFixed(2).replace('.',',')
    }
})

Vue.filter('cepFormat', function(value){
    return value.substring(0,5) + '-' + value.substring(5,8)
})

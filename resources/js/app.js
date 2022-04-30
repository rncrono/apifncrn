import Vue from 'vue/dist/vue.js'


Vue.component('button-tipo', {
    data: function(){
        return {
            count: 0
        }
    },
    template: "<button @click='count++'>{{count}}</button>"
})

var app = new Vue({
    el: '#app'
});
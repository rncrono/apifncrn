require('./bootstrap')
import Vue from 'vue'

Vue.component("head-page", require('./my-component.js').default);

var app = new Vue({
    el: '#app'
});
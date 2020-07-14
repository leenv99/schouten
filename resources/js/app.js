require('./bootstrap');

window.Vue = require('vue');

Vue.component('loading', require('./components/ui/loading.vue').default);
Vue.component('message', require('./components/ui/message.vue').default);
Vue.component('result', require('./components/results/result.vue').default);

import {globalMixin} from './mixins/globalMixin';
Vue.mixin(globalMixin);

const app = new Vue({
    el: '#app',
    data: {
    	page: 'load-results'
    },
    components: {
    	retrieveResults: require('./components/results/retrieve.vue').default,
    	loadResults: require('./components/results/load.vue').default
    },
    methods: {
    	navigateTo(page) {
    		this.page = page;
    	}
    }
});

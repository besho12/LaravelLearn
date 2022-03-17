
import Vue from 'vue';
import moment from 'moment';
Vue.filter('myDate', function (value) {
    return moment(value).format('DD-MM-YYYY');
});

export default ({
    
});


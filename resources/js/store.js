
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

let main_id = window.localStorage.getItem('main_id'); // get main_id from local memory


export default new Vuex.Store({
  state: {
    main_id: main_id ? JSON.parse(main_id) : [],
  },
  mutations: {   
    show(state,item){          
        state.main_id = [];
        state.main_id.push(item);
        this.commit('saveID');
    },

    saveID(state){ // save data to local storage to avomain_id losing it while refresh
        window.localStorage.setItem('main_id',JSON.stringify(state.main_id));
    },   

    removefromcart(state, item){  // remove data from cart and from local storage       
    },

  },

  actions: {},
  modules: {}
});

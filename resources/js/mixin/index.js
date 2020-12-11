import axios from 'axios';
import { property, values } from 'lodash';

let getData = function(to) {
  return new Promise((resolve, reject) => {
    let initialState = JSON.parse(window.__INITIAL_STATE__) || {};

    if (!initialState.path || to.path !== initialState.path) {
      axios.get(`/api${to.path}`).then(({ data }) => {
        resolve(data);
      })
      console.log('data fetched from axios')
    } else {
      resolve(initialState);
      console.log('data fetched from initial state');
    }
  });
};

export default {
   beforeRouteEnter (to, from, next) {
    getData(to).then((data) => {
        next(vm => vm.$data.initState.push(data));
    });
  },
};

// Object.assign(vm.$data.initState, data)

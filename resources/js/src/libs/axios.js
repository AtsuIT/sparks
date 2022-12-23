import Vue from 'vue'

// axios
import axios from 'axios'

const axiosIns = axios.create({
  // You can add your headers here
  // ================================
  // baseURL: 'http://127.0.0.1:8000/api',
  baseURL: '/api',
  headers: {
    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
    'X-localization': (localStorage.getItem('lang') || 'en'),
    // 'csrfToken' : document.querySelector('meta[name="csrfToken"]').getAttribute('content')
  }
  // timeout: 1000,
  // headers: {'X-Custom-Header': 'foobar'}
})

Vue.prototype.$http = axiosIns

export default axiosIns

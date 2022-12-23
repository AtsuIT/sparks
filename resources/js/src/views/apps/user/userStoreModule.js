import axios from '@axios'

export default {
  namespaced: true,
  state: {},
  getters: {},
  mutations: {},
  actions: {
    fetchUsers(ctx, queryParams) {
      return new Promise((resolve, reject) => {
        axios
          .get('/users', { params: queryParams })
          .then(response => resolve(response))
          .catch(error => reject(error))
      })
    },
    fetchUser(ctx, { id }) {
      return new Promise((resolve, reject) => {
        axios
          .get(`/user/get/${id}`)
          .then(response => resolve(response))
          .catch(error => reject(error))
      })
    },
    addUser(ctx, userData) {
      return new Promise((resolve, reject) => {
        axios
          .post('/user/add', { user: userData })
          .then(response => resolve(response))
          .catch(error => reject(error))
      })
    },
    delete(ctx, userData) {
      return new Promise((resolve, reject) => {
        axios
          .post('/user/delete', { user: userData })
          .then(response => resolve(response))
          .catch(error => reject(error))
      })
    },
    updateUser(ctx, userData) {
      return new Promise((resolve, reject) => {
        axios
          .post('/user/update', { user: userData })
          .then(response => resolve(response))
          .catch(error => reject(error))
      })
    },
  },
}

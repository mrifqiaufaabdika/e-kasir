import $axios from '@/router/server'

export default {
  // START Roles API
  getBisnis ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/bisnis/all`)
        .then((response) => {
          if (response.status === 200) {
            const items = response.data.value
            resolve({ items })
          } else {
            resolve({ items: [] })
          }
        })
        .catch((error) => {
          console.log(error)
          resolve({ items: [], total: 0 })
        })
    })
  },
  getBisnisCreate ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/bisnis/create`)
          .then((response) => {
            if (response.status === 200) {
              resolve(response.data.value)
            } else {
              resolve({})
            }
          })
          .catch((error) => {
            console.log(error)
            resolve([])
          })
    })
  },
  getBisnisById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/bisnis/detail/${payload.id}`)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data.value)
          } else {
            resolve({})
          }
        })
        .catch((error) => {
          console.log(error)
          resolve([])
        })
    })
  },
  deleteBisnis ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/bisnis/delete/${payload}`)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data.value)
          } else {
            resolve(response.data.value)
          }
        })
        .catch((error) => {
          console.log(error)
          resolve([])
        })
    })
  },
  addBisnis ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/bisnis/baru', payload)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data.value)
          } else {
            resolve(response.data.value)
          }
        })
        .catch((error) => {
          console.log(error)
          resolve([])
        })
    })
  },
  updateBisnis ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.put(`/bisnis/update/${payload.id}`, payload)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data)
          } else {
            resolve(response.data)
          }
          resolve(response.data)
        })
        .catch((error) => {
          console.log(error)
          resolve([])
        })
    })
  }
  // END Roles API
}

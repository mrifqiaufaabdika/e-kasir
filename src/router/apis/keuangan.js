import $axios from '@/router/server'

const Keuangan = {
  // START Roles API
  getKeuangan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      const { page, itemsPerPage, sortBy, sortDesc, search } = payload
      let query = {
        search: search || '',
        page: page || 1,
        per_page: itemsPerPage || 5,
        sortBy: sortBy.length ? JSON.stringify(sortBy) : '',
        sortDesc: sortDesc.length ? JSON.stringify(sortDesc) : ''
      }
      query = new URLSearchParams(query).toString()
      $axios.get(`/keuangan/all?${query}`)
        .then((response) => {
          if (response.status === 200) {
            const items = response.data.value.data
            const total = response.data.value.total
            resolve({ items, total })
          } else {
            resolve({ items: [], total: 0 })
          }
        })
        .catch((error) => {
          console.log(error)
          resolve({ items: [], total: 0 })
        })
    })
  },
  getKeuanganCreate ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/keuangan/create`)
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
  getKeuanganById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/keuangan/detail/${payload.id}`)
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
  deleteKeuangan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/keuangan/delete/${payload}`)
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
  addKeuangan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/keuangan/baru', payload)
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
  updateKeuangan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.put(`/keuangankeuangan/update/${payload.id}`, payload)
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

export default Keuangan
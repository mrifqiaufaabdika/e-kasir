import $axios from '@/router/server'

export default {
  // START Roles API
  getTransaksi ({ commit }, payload) {
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
      $axios.get(`/transaksi/all?${query}`)
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
  getTransaksiCreate ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/transaksi/create/${payload.id}`, payload)
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
  getTransaksiById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/transaksi/detail/${payload.id}`)
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
  deleteTransaksi ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/transaksi/delete/${payload}`)
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
  addTransaksi ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/transaksi/baru', payload)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data)
          } else {
            resolve(response.data)
          }
        })
        .catch((error) => {
          console.log(error)
          resolve([])
        })
    })
  },
  updateTransaksi ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.put(`/transaksi/update/${payload.id}`, payload)
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

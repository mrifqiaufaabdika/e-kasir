import $axios from '@/router/server'

export default {
  // START Roles API
  getBarangv1 ({ commit }, payload) {
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
      $axios.get(`/barang/all?${query}`)
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
  getBarangv1Create ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/barang/create`)
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
  getBarangv1ById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/barang/detail/${payload.id}`)
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
  deleteBarangv1 ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/barang/delete/${payload}`)
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
  addBarangv1 ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/barang/baru', payload)
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
  updateBarangv1 ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.put(`/barang/update/${payload.id}`, payload)
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

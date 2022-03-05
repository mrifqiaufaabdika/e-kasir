import $axios from '@/router/server'

export default {
  // START Roles API
  getKategoriProduk ({ commit }, payload) {
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
      $axios.get(`/kategori-produk/all?${query}`)
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
  getKategoriProdukCreate ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/kategori-produk/create`)
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
  getKategoriProdukById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/kategori-produk/detail/${payload.id}`)
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
  deleteKategoriProduk ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/kategori-produk/delete/${payload}`)
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
  addKategoriProduk ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/kategori-produk/baru', payload)
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
  updateKategoriProduk ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.put(`/kategori-produk/update/${payload.id}`, payload)
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

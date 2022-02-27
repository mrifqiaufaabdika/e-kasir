import $axios from '@/router/server'

export default {
  // START Roles API
  getKategoriPegawai ({ commit }, payload) {
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
      $axios.get(`/kategori-pegawai/all?${query}`)
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
  getKategoriPegawaiById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/kategori-pegawai/detail/${payload.id}`)
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
  deleteKategoriPegawai ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/kategori-pegawai/delete/${payload}`)
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
  addKategoriPegawai ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/kategori-pegawai/baru', payload)
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
  updateKategoriPegawai ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.put(`/kategori-pegawai/update/${payload.id}`, payload)
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

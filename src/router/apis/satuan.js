import $axios from '@/router/server'

const Satuan = {
  // START Pramudi API
  getSatuan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      const { page, itemsPerPage, sortBy, sortDesc } = payload
      let query = {
        page: page || 1,
        per_page: itemsPerPage || 5,
        sortBy: sortBy.length ? JSON.stringify(sortBy) : '',
        sortDesc: sortDesc.length ? JSON.stringify(sortDesc) : '',
        ...payload.add
      }
      query = new URLSearchParams(query).toString()
      $axios.get(`/satuan-barang/all?${query}`)
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
  getSatuanById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/satuan-barang/detail/${payload.id}`)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data.value)
          } else {
            resolve(response.data.value)
          }
        })
        .catch((error) => {
          console.error(error)
          reject(error)
        })
    })
  },
  createSatuan ({ commit }) {
    return new Promise((resolve, reject) => {
      $axios.get('/satuan-barang/create')
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
  addSatuan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/satuan-barang/baru', payload, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data)
          } else {
            resolve({ msg: 'Sepertinya ada masalah, silahkan coba lagi' })
          }
        })
        .catch((error) => {
          console.log(error)
          resolve({ msg: error })
        })
    })
  },
  editSatuan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/satuan-barang/edit/${payload.id}`)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data.value)
          } else {
            resolve(response.data.value)
          }
        })
        .catch((error) => {
          console.error(error)
          reject(error)
        })
    })
  },
  updateSatuan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/satuan-barang/update', payload, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data)
          }
          resolve({ msg: 'Sepertinya ada masalah, silahkan coba lagi' })
        })
        .catch((error) => {
          console.log(error)
          resolve({ msg: error })
        })
    })
  },
  deleteSatuan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/satuan-barang/delete/${payload}`)
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data)
          }
          resolve({ msg: 'Sepertinya ada masalah, silahkan coba lagi' })
        })
        .catch((error) => {
          console.log(error)
          resolve({ msg: error })
        })
    })
  }
  // END Pramudi API
}

export default Satuan

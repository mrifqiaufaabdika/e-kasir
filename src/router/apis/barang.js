import $axios from '@/router/server'

const Barang = {
  // START Pramudi API
  getBarang ({ commit }, payload) {
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
  getBarangById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/barang/detail/${payload.id}`)
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
  createBarang ({ commit }) {
    return new Promise((resolve, reject) => {
      $axios.get('/barang/create')
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
  addBarang ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/barang/baru', payload, {
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
  editBarang ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/barang/edit/${payload.id}`)
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
  updateBarang ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/barang/update', payload, {
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
  deleteBarang ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/barang/delete/${payload}`)
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

export default Barang

import $axios from '@/router/server'

const Pelanggan = {
  // START Pelanggan API
  getPelanggan ({ commit }, payload) {
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
      $axios.get(`/pelanggan/all?${query}`)
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
  getPelangganById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/pelanggan/detail/${payload.id}`)
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
  createPelanggan ({ commit }) {
    return new Promise((resolve, reject) => {
      $axios.get('/pelanggan/create')
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
  addPelanggan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/pelanggan/baru', payload, {
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
  editPelanggan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/pelanggan/edit/${payload.id}`)
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
  updatePelanggan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/pelanggan/update', payload, {
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
  deletePelanggan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/pelanggan/delete/${payload}`)
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

  getPelangganByPhone ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/pelanggan/getByPhone', payload,{
        headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
        .then((response) => {
          if (response.status === 200) {
            resolve(response.data)
          } else {
            resolve(response.data)
          }
        })
        .catch((error) => {
          console.error(error)
          resolve(error)
        })
    })
  }
  // END Pelanggan API
}

export default Pelanggan

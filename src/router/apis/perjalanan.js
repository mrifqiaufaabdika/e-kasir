import $axios from '@/router/server'

const Perjalanan = {
  // START Perjalanan API
  getPerjalanan ({ commit }, payload) {
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
      $axios.get(`/perjalanan/all?${query}`)
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
  getPerjalananById ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/perjalanan/detail/${payload.id}`)
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
  createPerjalanan ({ commit }) {
    return new Promise((resolve, reject) => {
      $axios.get('/perjalanan/create')
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
  addPerjalanan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/perjalanan/baru', payload, {
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
  editPerjalanan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/perjalanan/edit/${payload.id}`)
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
  updatePerjalanan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.post('/perjalanan/update', payload, {
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
  deletePerjalanan ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.delete(`/perjalanan/delete/${payload}`)
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
  // END Perjalanan API
}

export default Perjalanan

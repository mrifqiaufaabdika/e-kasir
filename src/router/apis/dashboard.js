import $axios from '@/router/server'

const Dashboard = {
  // START Dashboard API
  getDashboard ({ commit }, payload) {
    return new Promise((resolve, reject) => {
      $axios.get(`/dashboard/index`)
        .then((response) => {
          if (response.status === 200) {
            const items = response.data
            resolve({ items })
          } else {
            resolve({ items: [] })
          }
        })
        .catch((error) => {
          console.log(error)
          resolve({ items: [] })
        })
    })
  },
  // END Dashboard API
}

export default Dashboard

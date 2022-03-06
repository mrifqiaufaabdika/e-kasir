const path = '/pelanggan'
const permission = 'pelanggan-'
const routeName = 'pelanggan'
const folder = 'pelanggan'
const title = 'Pelanggan'

const Pelanggan = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Main`),
    meta: {
      title: title,
      icon: 'mdi-account-multiple',
      // subheader: '-',
      requiresAuth: true,
      requirePermission: permission + 'list'
    },

    // Child Sub Penjualan
    children: [
      {
        path: 'index',
        name: routeName,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
        meta: {
          title: 'Data Pelanggan',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },

      {
        path: 'kendaraan',
        name: routeName,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Kendaraan`),
        meta: {
          title: 'Kendaraan',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
    ]
  }

]

export default Pelanggan

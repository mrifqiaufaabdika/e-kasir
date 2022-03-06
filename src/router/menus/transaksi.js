const path = '/transaksi'
const permission = 'transaksi-'
const routeName = 'transaksi'
const folder = 'transaksi'
const title = 'Transaksi'

const Transaksi = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Main`),
    meta: {
      title: title,
      icon: 'mdi-swap-vertical-bold',
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
          title: 'Penjualan Harian',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },

      {
        path: 'produk',
        name: routeName,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Produk`),
        meta: {
          title: 'Penjualan Produk',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
    ]
  }

]

export default Transaksi

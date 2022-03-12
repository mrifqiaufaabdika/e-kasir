const path = '/komisi'
const permission = 'komisi-'
const routeName = 'komisi'
const folder = 'komisi'
const title = 'Komisi'
const Komisi = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Main`),
    meta: {
      title: title,
      icon: 'mdi-cash-multiple',
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
          title: 'Komisi',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      {
        path: 'baru',
        name: routeName + '_add',
        component: () => import(/* webpackChunkName: "[request].baru.chunk" */ `@/views/${folder}/Add`),
        meta: {
          title: 'Tambah' + title,
          // icon: 'mdi-minus',
          requiresAuth: true,
          requirePermission: permission + 'create'
        }
      },

      {
        path: 'hitung',
        name: routeName,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Hitung`),
        meta: {
          title: 'Hitung Komisi',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
    ]
  }
]

export default Komisi

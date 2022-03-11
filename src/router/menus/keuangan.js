const path = '/keuangan'
const permission = 'keuangan-'
const routeName = 'keuangan'
const folder = 'keuangan'
const title = 'Keuangan'


const Keuangan = [
  {
    path: path,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Main`),
    meta: {
      title: title,
      icon: 'mdi-cash',
      // subheader: '-',
      requiresAuth: true,
      requirePermission: permission + 'list'
    },
    children: [
      {
        path: 'index',
        name: routeName,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
        meta: {
          title: 'Riangkasan Keuangan',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      {
        path: 'masuk',
        name: routeName,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Masuk`),
        meta: {
          title: 'Keuangan Masuk',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      {
        path: 'keluar',
        name: routeName,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Keluar`),
        meta: {
          title: 'Keuangan Keluar',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      {
        path: 'baru',
        name: routeName + '_add',
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Add`),
        meta: {
          title: 'Catat' + title,
          requiresAuth: true,
          requirePermission: permission + 'create'
        }
      },
      {
        path: path + '/view/:id',
        name: routeName + '_view',
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/View`),
        props: true,
        meta: {
          title: 'Detail' + title,
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      {
        path: path + '/edit/:id',
        name: routeName + '_edit',
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Edit`),
        props: true,
        meta: {
          title: 'Edit' + title,
          requiresAuth: true,
          requirePermission: permission + 'edit'
        }

      }
    ]
  }
]

export default Keuangan

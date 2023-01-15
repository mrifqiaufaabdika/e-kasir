const path = '/kasir'
const permission = 'kasir'
const routeName = 'kasir'
const folder = 'kasir'
const title = 'Kasir'
const Kasir = [
  {
    path: path+'/bisnis/:id',
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
    props: true,
    meta: {
      title: title,
      icon: 'mdi-calendar-month-outline',
      // subheader: '-',
      requiresAuth: true,
      requirePermission: permission
    }
  },
  {
    path: path + '/baru',
    name: routeName + '_add',
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Add`),
    meta: {
      title: 'Tambah' + title,
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

export default Kasir

const path = '/halte'
const permission = 'halte-'
const routeName = 'halte'
const folder = 'halte'
const title = 'Halte'
const Halte = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
    meta: {
      title: title,
      icon: 'mdi-hail',
      // subheader: '-',
      requiresAuth: true,
      requirePermission: permission + 'list'
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

export default Halte

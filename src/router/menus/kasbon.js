const path = '/kasbon'
const permission = 'kasbon-'
const routeName = 'kasbon'
const folder = 'kasbon'
const title = 'Kasbon'
const Kasbon = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
    meta: {
      title: title,
      icon: 'mdi-chart-donut-variant',
      //subheader: '-',
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

export default Kasbon

const path = '/user'
const permission = 'user-'
const routeName = 'user'
const folder = 'user'
const title = 'User'

const pathRole = 'roles'
const permissionRole = 'role-'
const routeNameRole = 'roles'
const folderRole = 'roles'
const titleRole = 'Roles'

const User = [
  {
    path: path,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Main`),
    meta: {
      title: title,
      icon: 'mdi-account-key',
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
          title: 'Data ' + title,
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
        path: 'view/:id',
        name: routeName + '_view',
        component: () => import(/* webpackChunkName: "[request].view.chunk" */ `@/views/${folder}/View`),
        props: true,
        meta: {
          title: 'Detail ' + title,
          // icon: 'mdi-minus',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      {
        path: 'edit/:id',
        name: routeName + '_edit',
        component: () => import(/* webpackChunkName: "[request].edit.chunk" */ `@/views/${folder}/Edit`),
        props: true,
        meta: {
          title: 'Edit ' + title,
          // icon: 'mdi-minus',
          requiresAuth: true,
          requirePermission: permission + 'edit'
        }
      },

      // Child Role
      {
        path: pathRole,
        name: routeNameRole,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderRole}/Index`),
        meta: {
          title: titleRole,
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionRole + 'list'
        }
      },
      {
        path: pathRole + '/baru',
        name: routeNameRole + '_add',
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderRole}/Add`),
        meta: {
          title: 'Tambah' + titleRole,
          requiresAuth: true,
          requirePermission: permissionRole + 'create'
        }
      },
      {
        path: pathRole + '/edit/:id',
        name: routeNameRole + '_edit',
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderRole}/Edit`),
        props: true,
        meta: {
          title: 'Edit' + titleRole,
          requiresAuth: true,
          requirePermission: permissionRole + 'edit'
        }
      }
    ]
  }
]

export default User

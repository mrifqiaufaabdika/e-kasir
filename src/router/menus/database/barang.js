const path = '/database'
const permission = 'user-'
const routeName = 'barang'
const folder = 'barang'
const title = 'Satuan Produk/Jasa/Barang'

const pathRole = 'roles'
const permissionRole = 'role-'
const routeNameRole = 'roles'
const folderRole = 'roles'
const titleRole = 'Roles'
const Barang = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
    meta: {
      title: title,
      icon: 'mdi-cube',
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
          title: 'Produk',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      // Child Role
      {
        path: pathRole,
        name: routeNameRole,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderRole}/Index`),
        meta: {
          title: 'Jasa',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionRole + 'list'
        }
      },
      {
        path: 'kategori',
        name: routeNameRole,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderRole}/Index`),
        meta: {
          title: 'Kategori',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionRole + 'list'
        }
      },
      {
        path: 'inventaris',
        name: routeNameRole,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderRole}/Index`),
        meta: {
          title: 'Inventaris',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionRole + 'list'
        }
      }
    ]
  },
]

export default Barang

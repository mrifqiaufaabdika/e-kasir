const path = '/roles'
const permission = 'role-'
const routeName = 'laporan'
const folder = 'laporan'
const title = 'Laporan'

const pathRole = 'roles'
const permissionRole = 'role-'
const routeNameRole = 'roles'
const folderRole = 'roles'
const titleRole = 'Roles'
const Laporan = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
    meta: {
      title: title,
      icon: 'mdi-chart-tree',
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
          title: 'Laporan Penjualan',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      // Child Role
      {
        path: 'kategori',
        name: routeNameRole,
        component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderRole}/Index`),
        meta: {
          title: 'Laporan Kasbon',
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
          title: 'Laporan Penggajian',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionRole + 'list'
        }
      }
    ]
  }
]

export default Laporan

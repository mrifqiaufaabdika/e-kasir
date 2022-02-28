const path = '/transaksi'
const permission = 'transaksi-'
const routeName = 'transaksi'
const folder = 'transaksi'
const title = 'Transaksi'


const pathRole = 'roles'
const permissionRole = 'role-'
const routeNameRole = 'roles'
const folderRole = 'roles'
const titleRole = 'Roles'
const Transaksi = [
  {
    path: path,
    name: routeName,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
    meta: {
      title: title,
      icon: 'mdi-swap-vertical-bold',
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
          title: 'Penjualan',
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
          title: 'Kasbon',
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
          title: 'Penggajian / Upah',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionRole + 'list'
        }
      }
    ]
  }

]

export default Transaksi

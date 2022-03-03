const path = '/database'
const permission = 'user-'
const routeName = 'satuan-barang'
const folder = 'satuan-barang'
const title = 'Satuan Pro/Bar/Jas'

const pathRole = 'roles'
const permissionRole = 'role-'
const routeNameRole = 'roles'
const folderRole = 'roles'
const titleRole = 'Roles'

const pathSatuanBarang = 'database/satuan-barang'
const permissionSatuanBarang = 'satuan-barang-'
const routeNameSatuanBarang = 'satuan-barang'
const folderSatuanBarang = 'satuan-barang'
const titleSatuanBarang = 'Satuan Barang'

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
    /*children: [
      {
        path: pathSatuanBarang,
        name: routeNameSatuanBarang,
        component: () => import(/!* webpackChunkName: "[request].chunk" *!/ `@/views/${folderSatuanBarang}/Index`),
        meta: {
          title: titleSatuanBarang,
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
     /!* // Child Role
      {
        path: pathRole,
        name: routeNameRole,
        component: () => import(/!* webpackChunkName: "[request].chunk" *!/ `@/views/${folderRole}/Index`),
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
        component: () => import(/!* webpackChunkName: "[request].chunk" *!/ `@/views/${folderRole}/Index`),
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
        component: () => import(/!* webpackChunkName: "[request].chunk" *!/ `@/views/${folderRole}/Index`),
        meta: {
          title: 'Inventaris',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionRole + 'list'
        }
      }*!/
    ]*/
  },
]

export default Barang

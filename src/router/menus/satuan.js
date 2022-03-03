const path = '/satuan'
const permission = 'pegawai-'
const routeName = 'barang'
const folder = 'barang'
const title = 'Satuan'

const pathKategoriPegawai = 'kategori-pegawai'
const permissionKategoriPegawai = 'kategori-pegawai-'
const routeNameKategoriPegawai = 'kategori-pegawai'
const folderKategoriPegawai = 'kategori-pegawai'
const titleKategoriPegawai = 'Kategori Pegawai'

const Satuan = [
  {
    path: path,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Index`),
    meta: {
      title: title,
      icon: 'mdi-account-multiple',
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
          title: 'Barang',
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permission + 'list'
        }
      },
      {
        path: 'barang/baru',
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
      }
    ]
  }
]

export default Satuan

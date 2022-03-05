const path = '/produk'
const permission = 'pegawai-'
const routeName = 'produk'
const folder = 'produk'
const title = 'Produk'

/*const pathKategoriProduk = 'kategori-produk'
const permissionKategoriProduk = 'kategori-pegawai-'
const routeNameKategoriProduk = 'kategori-produk'
const folderKategoriProduk = 'kategori-produk'
const titleKategoriProduk = 'Kategori Produk'*/

const Produk = [
  {
    path: path,
    component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folder}/Main`),
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

    /*  // Child Kategori Produk
      {
        path: pathKategoriProduk,
        name: routeNameKategoriProduk,
        component: () => import(/!* webpackChunkName: "[request].chunk" *!/ `@/views/${folderKategoriProduk}/Index`),
        meta: {
          title: titleKategoriProduk,
          icon: 'mdi-minus',
          // subheader: '-',
          requiresAuth: true,
          requirePermission: permissionKategoriPegawai + 'list'
        }
      },
      {
        path: pathKategoriProduk + '/baru',
        name: routeNameKategoriProduk + '_add',
        component: () => import(/!* webpackChunkName: "[request].chunk" *!/ `@/views/${folderKategoriProduk}/Add`),
        meta: {
          title: 'Tambah' + titleKategoriProduk,
          requiresAuth: true,
          requirePermission: permissionKategoriProduk + 'create'
        }
      },
      {
        path: pathKategoriProduk + '/edit/:id',
        name: routeNameKategoriProduk + '_edit',
        component: () => import(/!* webpackChunkName: "[request].chunk" *!/ `@/views/${folderKategoriProduk}/Edit`),
        props: true,
        meta: {
          title: 'Edit' + titleKategoriProduk,
          requiresAuth: true,
          requirePermission: permissionKategoriProduk + 'edit'
        }
      }*/
    ]
  }
]

export default Produk

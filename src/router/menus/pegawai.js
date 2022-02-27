const path = '/pegawai'
const permission = 'pegawai-'
const routeName = 'pegawai'
const folder = 'pegawai'
const title = 'Pegawai'

const pathKategoriPegawai = 'kategori-pegawai'
const permissionKategoriPegawai = 'kategori-pegawai-'
const routeNameKategoriPegawai = 'kategori-pegawai'
const folderKategoriPegawai = 'kategori-pegawai'
const titleKategoriPegawai = 'Kategori Pegawai'

const Pegawai = [
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

            // Child Kategori Pegawai
            {
                path: pathKategoriPegawai,
                name: routeNameKategoriPegawai,
                component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderKategoriPegawai}/Index`),
                meta: {
                    title: titleKategoriPegawai,
                    icon: 'mdi-minus',
                    // subheader: '-',
                    requiresAuth: true,
                    requirePermission: permissionKategoriPegawai + 'list'
                }
            },
            {
                path: pathKategoriPegawai + '/baru',
                name: routeNameKategoriPegawai + '_add',
                component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderKategoriPegawai}/Add`),
                meta: {
                    title: 'Tambah' + titleKategoriPegawai,
                    requiresAuth: true,
                    requirePermission: permissionKategoriPegawai + 'create'
                }
            },
            {
                path: pathKategoriPegawai + '/edit/:id',
                name: routeNameKategoriPegawai + '_edit',
                component: () => import(/* webpackChunkName: "[request].chunk" */ `@/views/${folderKategoriPegawai}/Edit`),
                props: true,
                meta: {
                    title: 'Edit' + titleKategoriPegawai,
                    requiresAuth: true,
                    requirePermission: permissionKategoriPegawai + 'edit'
                }
            }
        ]
    }
]

export default Pegawai

/*
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 */
import User from './menus/base/user'
import Pegawai from './menus/pegawai'
import Transaksi from './menus/Transaksi/transaksi.js'
import Keuangan from '@/router/menus/keuangan.js'
import Kasbon from '@/router/menus/kasbon.js'
import Inventaris from '@/router/menus/database/inventaris.js'
import Laporan from '@/router/menus/Laporan/Laporan.js'
import Coffeshop from '@/router/menus/coffeshop.js'
import AutoWash from '@/router/menus/autowash.js'
import Barang from '@/router/menus/database/barang.js'
import Permissions from '@/router/menus/permissions.js'
// {{next_import}}

const baseMenu = [
  {
    path: '/',
    name: 'home',
    component: () => import(/* webpackChunkName: "about.chunk" */ '@/views/Home'),
    meta: {
      title: 'Dashboard',
      icon: 'mdi-view-dashboard-outline',
      requirePermission: 'home',
      requiresAuth: true,
    }
  },
  {
    path: '/login',
    name: 'login',
    component: () => import(/* webpackChunkName: "login.chunk" */ '@/views/Login'),
    meta: {
      title: 'Login'
    }
  },
  {
    path: '*',
    name: 'not_found',
    component: () => import(/* webpackChunkName: "about.chunk" */ '@/views/NotFound'),
    meta: {
      title: 'Not Found'
    }
  }
]

export const routes = baseMenu.concat(
    User,
    Pegawai,
    Permissions,
    Kasbon,
    Barang,
    Transaksi,
    Laporan// {{next_use}}
)

export default baseMenu.concat(
  [{ subheader: 'Data Master' }],
  User,
  Pegawai,
  Permissions,
  [{ subheader: 'Pengelolaan' }],
  Kasbon,
  Barang,
  Transaksi,
  Laporan
  // {{next_use}}
)

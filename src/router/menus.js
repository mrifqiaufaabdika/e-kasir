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
import Barangv1 from '@/router/menus/barangv1.js'
import Satuan from '@/router/menus/satuan.js'
import Permissions from '@/router/menus/permissions.js'
import SatuanBarang from '@/router/menus/database/satuan-barang';
import Produk from '@/router/menus/produk.js';
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
   // SatuanBarang,
    Satuan,
    Barangv1,
    Produk,
    Inventaris,
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
  //Barang,
  Satuan,
  Barangv1,
  Produk,
  //SatuanBarang,
  [{ subheader: 'Pengelolaan' }],
  Inventaris,
  Kasbon,
  //Barang,
  Transaksi,
  Laporan
  // {{next_use}}
)

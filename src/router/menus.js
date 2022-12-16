/*
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 */
import User from './menus/base/user'
import Pegawai from './menus/pegawai'
import Transaksi from './menus/transaksi.js'
import Keuangan from '@/router/menus/keuangan.js'
import Kasbon from '@/router/menus/kasbon.js'
import Inventaris from '@/router/menus/database/inventaris.js'
import Laporan from '@/router/menus/Laporan/Laporan.js'
import Barang from '@/router/menus/barang.js'
import Satuan from './menus/satuan.js'
import Permissions from '@/router/menus/permissions.js'
import SatuanBarang from '@/router/menus/database/satuan-barang';
import Produk from '@/router/menus/produk.js';
import Voucher from '@/router/menus/voucher.js';
import Komisi from "./menus/komisi";
import Pelanggan from "./menus/pelanggan";
import KategoriProduk from "./menus/kategori-produk";
import Kasir from './menus/kasir.js'
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
    Barang,
    Produk,
    Pelanggan,
    Transaksi,
    Keuangan,
    Komisi,
    Kasbon,
    Voucher,
    Inventaris,
    Barang,
    // KategoriProduk,
    Laporan,
  Kasir// {{next_use}}
)

export default baseMenu.concat(
    [{ subheader: 'Pengelolaan' }],
    Transaksi,
    Keuangan,
    Komisi,
    Kasbon,
    Inventaris,
    Laporan,
    [{ subheader: 'Data Master' }],
    User,
    Pegawai,
    Permissions,
    //Barang,
    // Satuan,
    Produk,
    Pelanggan,
    Voucher,
    Barang// {{next_use}}
)

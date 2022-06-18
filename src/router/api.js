/*
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 */

import auth from './apis/base/auth'
import roles from './apis/base/roles'
import user from './apis/base/user'
import app from './apis/base/app'
import Permissions from './apis/permissions.js'
import pegawai from './apis/pegawai'
import kategori_pegawai from './apis/kategori_pegawai'
import satuan from '@/router/apis/satuan'
import barang from '@/router/apis/barang'
import inventaris from '@/router/apis/inventaris'
import kategori_produk from '@/router/apis/kategori-produk'
import produk from '@/router/apis/produk'
import voucher from '@/router/apis/voucher.js'
import transaksi from '@/router/apis/transaksi'
import bisnis from "./apis/bisnis";
import Keuangan from "./apis/keuangan";
import komisi from "./apis/komisi";
// {{next_import}}

const $api = {
  ...auth,
  ...pegawai,
  ...kategori_pegawai,
  ...satuan,
  ...produk,
  ...barang,
  ...kategori_produk,
  ...transaksi,
  ...voucher,
  ...inventaris,
  ...roles,
  ...user,
  ...app,
  ...Permissions,
  ...bisnis,
  ...Keuangan,
  ...komisi
  // {{next_use}}
}

export default $api

/*
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 */

import auth from './apis/base/auth'
import roles from './apis/base/roles'
import user from './apis/base/user'
import app from './apis/base/app'
import Permissions from './apis/permissions.js'
import autowash from '@/router/apis/autowash.js'
import pegawai from './apis/pegawai'
import barang from './apis/barang'
import kategori_pegawai from './apis/kategori_pegawai'
import satuan_barang from '@/router/apis/satuan_barang'
import barangv1 from '@/router/apis/barangv1'
import inventaris from '@/router/apis/inventaris'
import kategori_produk from '@/router/apis/kategori-produk'
import Produk from "@/router/apis/produk";
// {{next_import}}

const $api = {
  ...auth,
  ...pegawai,
  ...barang,
  ...kategori_pegawai,
  ...satuan_barang,
  ...barangv1,
  ...Produk,
  ...kategori_produk,
  ...inventaris,
  ...roles,
  ...user,
  ...app,
  ...Permissions,
  ...autowash,
  // {{next_use}}
}

export default $api

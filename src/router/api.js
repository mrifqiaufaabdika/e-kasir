/*
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 */

import auth from './apis/base/auth'
import roles from './apis/base/roles'
import user from './apis/base/user'
import app from './apis/base/app'
import Bus from './apis/bus.js'
import Halte from './apis/halte.js'
import Perjalanan from './apis/perjalanan.js'
import Pramudi from './apis/pramudi.js'
import Rute from './apis/rute.js'
import Permissions from './apis/permissions.js'
import autowash from '@/router/apis/autowash'
import pegawai from './apis/pegawai'
// {{next_import}}

const $api = {
  ...auth,
  ...pegawai,
  ...roles,
  ...user,
  ...app,
  ...Permissions,
  ...Bus,
  ...autowash,
  ...Halte,
  ...Perjalanan,
  ...Pramudi,
  ...Rute// {{next_use}}
}

export default $api

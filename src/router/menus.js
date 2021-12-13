/*
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 */
import User from './menus/base/user'
import Roles from './menus/base/roles'
import Bus from '@/router/menus/bus.js'
import Halte from '@/router/menus/halte.js'
import Perjalanan from '@/router/menus/perjalanan.js'
import Pramudi from '@/router/menus/pramudi.js'
import Rute from '@/router/menus/rute.js'
import Permissions from '@/router/menus/permissions.js'
// {{next_import}}

const menus = [
  {
    path: '/',
    name: 'home',
    component: () => import(/* webpackChunkName: "about.chunk" */ '@/views/Home'),
    meta: {
      title: 'Dashboard',
      icon: 'mdi-view-dashboard-outline',
      requirePermission: 'home',
      requiresAuth: true
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

export default menus.concat(
  User,
  Roles,
  Permissions,
  Bus,
  Halte,
  Perjalanan,
  Pramudi,
  Rute// {{next_use}}
)

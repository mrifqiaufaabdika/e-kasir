<!--
  - Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
  - Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
  -->

<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <div class="user">
    <v-app-bar flat>
      <v-icon
        color="#00a3ff"
        class="mr-5 d-md-none"
        @click="$emit('toggle-drawer')"
        v-text="'mdi-menu'"
      />
      <v-toolbar-title class="ml-md-2">
        Ringkasan Keuangan
      </v-toolbar-title>

      <v-spacer />

      <v-btn
        title="Perbarui Data"
        icon
        @click="_loadData(true)"
      >
        <v-icon>mdi-reload</v-icon>
      </v-btn>
    </v-app-bar>
    <v-container
      fluid
      style="padding: 0 1.5rem 0 1.5rem;"
    >
      <template>
        <v-simple-table>
          <template v-slot:default>
            <thead>
            <tr>
              <th class="text-left">
                Nama
              </th>
              <th class="text-left">
                Deskripsi
              </th>
              <th class="text-left">
                Saldo
              </th>
            </tr>
            </thead>
            <tbody>
            <tr
                    v-for="item in datas"
                    :key="item.id"
            >
              <td>{{ item.nama }}</td>
              <td>{{ item.keterangan }}</td>
              <td>{{ item.saldo }}</td>
            </tr>
            </tbody>
          </template>
        </v-simple-table>
      </template>
<!--      <v-data-table-->
<!--        :loading="isLoading"-->
<!--        :headers="headerData"-->
<!--        :items="datas"-->
<!--        :sort-by.sync="config.table.sortBy"-->
<!--        :sort-desc.sync="config.table.sortDesc"-->
<!--        :items-per-page="config.table.itemsPerPage"-->
<!--        :page.sync="config.table.page"-->
<!--        :options.sync="options"-->
<!--        height="350pt"-->
<!--        item-key="id"-->
<!--        class="elevation-2"-->
<!--        multi-sort-->
<!--        hide-default-footer-->
<!--        fixed-header-->
<!--        @page-count="config.table.pageCount = $event"-->
<!--        @pagination="pagination=$event"-->
<!--      >-->
<!--        <template #item.updated_at="{item}">-->
<!--          {{ item.updated_at | moment('DD MMMM YYYY HH:mm') }}-->
<!--        </template>-->
<!--        <template #item.aksi="{item}">-->
<!--          <v-tooltip bottom>-->
<!--            <template #activator="{ on, attrs }">-->
<!--              <v-btn-->
<!--                icon-->
<!--                v-bind="attrs"-->
<!--                @click="_edit(item)"-->
<!--                v-on="on"-->
<!--              >-->
<!--                <v-icon-->
<!--                  color="blue"-->
<!--                >-->
<!--                  mdi-circle-edit-outline-->
<!--                </v-icon>-->
<!--              </v-btn>-->
<!--            </template>-->
<!--            <span>Ubah</span>-->
<!--          </v-tooltip>-->
<!--&lt;!&ndash;          <v-tooltip bottom>&ndash;&gt;-->
<!--&lt;!&ndash;            <template #activator="{ on, attrs }">&ndash;&gt;-->
<!--&lt;!&ndash;              <v-btn&ndash;&gt;-->
<!--&lt;!&ndash;                v-bind="attrs"&ndash;&gt;-->
<!--&lt;!&ndash;                icon&ndash;&gt;-->
<!--&lt;!&ndash;                @click="_detail(item)"&ndash;&gt;-->
<!--&lt;!&ndash;                v-on="on"&ndash;&gt;-->
<!--&lt;!&ndash;              >&ndash;&gt;-->
<!--&lt;!&ndash;                <v-icon color="green">&ndash;&gt;-->
<!--&lt;!&ndash;                  mdi-file-find&ndash;&gt;-->
<!--&lt;!&ndash;                </v-icon>&ndash;&gt;-->
<!--&lt;!&ndash;              </v-btn>&ndash;&gt;-->
<!--&lt;!&ndash;            </template>&ndash;&gt;-->
<!--&lt;!&ndash;            <span>Detail</span>&ndash;&gt;-->
<!--&lt;!&ndash;          </v-tooltip>&ndash;&gt;-->
<!--        </template>-->
<!--      </v-data-table>-->
<!--      <div-->
<!--        class="row align-center pb-3"-->
<!--      >-->
<!--        <div class="col-md-6 col-12 order-md-0 order-1 pt-0 pt-md-4">-->
<!--          <v-data-footer-->
<!--            class="float-left"-->
<!--            :pagination="pagination"-->
<!--            :prev-icon="null"-->
<!--            :next-icon="null"-->
<!--            :first-icon="null"-->
<!--            :last-icon="null"-->
<!--            :items-per-page-options="[10,15,50,100,-1]"-->
<!--            :options.sync="options"-->
<!--          />-->
<!--        </div>-->
<!--        <div class="col-md-6 col-12 order-md-1 order-0 mt-4 pb-0 pb-md-4">-->
<!--          <v-pagination-->
<!--            v-model="config.table.page"-->
<!--            :length="config.table.pageCount"-->
<!--            total-visible="7"-->
<!--            circle-->
<!--          />-->
<!--        </div>-->
<!--      </div>-->
    </v-container>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import Dialog from '@/components/Dialog'

export default {
  name: 'User',
  components: {
    'delete-dialog-confirm': Dialog
  },
  data () {
    return {
      isLoading: true,
      datas: [],

      options: {},
      pagination: {},

      config: {
        table: {
          page: 1,
          pageCount: 0,
          sortBy: ['id'],
          sortDesc: [true],
          itemsPerPage: 10,
          itemKey: 'id'
        }
      },
    }
  },
  computed: {
    headerData () {
      return [
        // {
        //   text: 'ID',
        //   align: 'left',
        //   value: 'id'
        // },
        { text: 'Nama', value: 'nama' },
        // { text: 'Email', value: 'email' },
        { text: 'Deskripsi', value: 'keterangan' },
        { text: 'Saldo', value: 'saldo' },
        // { text: 'Updated', value: 'updated_at' },
        { text: '', value: 'aksi' }
      ]
    }
  },
  watch: {
    options (a, b) {
      this._loadData(true)
    }
  },
  mounted () {
    this._loadData(false) // loading data form server
  },
  methods: {
    ...mapActions(['getBisnis', 'deleteUser']),
    _detail (value) {
      this.$router.push({ name: 'user_view', params: { id: value.id } })
    },
    _edit (value) {
      this.$router.push({ name: 'user_edit', params: { id: value.id } })
    },
    _loadData (abort) {
      if (this.datas.length === 0 || abort) {
        this.isLoading = true
        this.getBisnis()
          .then((data) => {
            this.datas = data.items || []
            this.isLoading = false
          })
      } else {
        this.isLoading = false
      }
    }
  }
}
</script>
<style>
.v-data-footer__icons-before,.v-data-footer__icons-after{
  display: none !important;
}
</style>

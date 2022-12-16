<!--
  - Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
  - Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
  -->

<template>
  <div class="kasir">
    <v-app-bar flat>
      <v-icon
        color="#00a3ff"
        class="mr-5 d-md-none"
        @click="$emit('toggle-drawer')"
        v-text="'mdi-menu'"
      />
      <v-toolbar-title class="ml-md-2">
        Kasir
      </v-toolbar-title>
      <v-spacer />

      <v-btn
        icon
        @click="booltmp.fp = !booltmp.fp"
      >
        <v-icon>mdi-basket</v-icon>
      </v-btn>
      <v-btn
        title="Perbarui Data"
        icon
        @click="_loadData(true)"
      >
        <v-icon>mdi-reload</v-icon>
      </v-btn>
    </v-app-bar>

    <v-container fluid>
      <v-row dense>
        <v-col
                v-for="item in datas.produk"
                :key="item.title"
                :cols="4"
                :md="3"
                :sm="3"
        >
          <v-dialog
            width="500"
          >
            <template v-slot:activator="{ on, attrs }">

            <v-card
              v-bind="attrs"
              v-on="on">
            <v-img
                    src="https://cdn.vuetifyjs.com/images/cards/plane.jpg"
                    class="white--text align-end"
                    gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                    height="200px"
            >
              <v-card-title v-text="item.nama_produk" class="text-h5 font-weight-bold text-left text-wrap"></v-card-title>
            </v-img>

            <v-card-subtitle class="text-h6 pb-0 text--primary">
              Rp {{item.harga}} / {{item.satuan_barang}}
            </v-card-subtitle>

            <v-card-text >
              {{item.deskripsi}}
            </v-card-text>


          </v-card>
            </template>

            <template v-slot:default="dialog">
              <v-card>

                <v-card-title class="text-h5 grey lighten-2">


                  {{ item.nama_produk }}
                    <v-spacer></v-spacer>
                      <v-btn
                        icon
                        @click="dialog.value = false"
                      >
                        <v-icon>mdi-close</v-icon>
                      </v-btn>

                </v-card-title>

                <v-card-text>
                  <v-container>
                    <v-row
                      dense>
                      <v-col
                        cols="8"
                      >
                        <v-text-field
                          label="Jumlah *"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col
                        cols="4"
                      >
                        <v-btn-toggle v-model="toggle_none">
                          <v-btn>
                            <v-icon dark>
                              mdi-minus
                            </v-icon>
                          </v-btn>

                          <v-btn>
                            <v-icon dark>
                              mdi-plus
                            </v-icon>
                          </v-btn>

                        </v-btn-toggle>
                      </v-col>

                      <v-col cols="12">
                        <v-autocomplete
                          v-model="item.satuan"
                          :items="datas.satuan"
                          auto-select-first
                          label="Satuan"
                        ></v-autocomplete>
                      </v-col>
                      <v-col cols="12">
                        <v-textarea
                          clearable
                          clear-icon="mdi-close-circle"
                          label="Catatan.."
                          rows="1"
                          auto-grow
                        ></v-textarea>
                      </v-col>
                      <v-col
                        cols="12"
                      >

                        <h3 class="text-h6 mb-2">
                          Dilayani oleh :
                        </h3>

                        <v-chip-group
                          v-model="amenities"
                          column
                          multiple
                        >
                          <v-chip
                            filter
                            outlined
                          >
                            M.Rifqi Aufa
                          </v-chip>
                          <v-chip
                            filter
                            outlined
                          >
                            Tri Mueri
                          </v-chip>
                          <v-chip
                            filter
                            outlined
                          >
                            Usaman
                          </v-chip>
                          <v-chip
                            filter
                            outlined
                          >
                            Abdullah
                          </v-chip>
                          <v-chip
                            filter
                            outlined
                          >
                            Umar
                          </v-chip>
                          <v-chip
                            filter
                            outlined
                          >
                            Zaid
                          </v-chip>
                        </v-chip-group>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
<!--                  <v-spacer></v-spacer>-->
<!--                  <v-btn-->
<!--                    color="primary"-->
<!--                    text-->
<!--                    @click="dialog.value = false"-->
<!--                  >-->
<!--                    I accept-->
<!--                  </v-btn>-->
                  <v-btn
                    large
                    color="green"
                    dark
                    block>
                    Rp 50.000
                    <v-spacer></v-spacer>
                    <v-icon
                      right
                      dark
                    >
                      mdi-basket
                    </v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </template>

          </v-dialog>
        </v-col>
      </v-row>

      <pre>{{datas.produk}}</pre>

    </v-container>
    <delete-dialog
      :show-dialog="showDC"
      :negative-button="dcNegativeBtn"
      :positive-button="dcPositiveBtn"
      :disabled-negative-btn="dcdisabledNegativeBtn"
      :disabled-positive-btn="dcdisabledPositiveBtn"
      :progress="dcProgress"
      :title="'Hapus'"
      :message="dcMessages"
    />
    <v-navigation-drawer
      v-model="booltmp.fp"
      fixed
      width="500"
      temporary
      right
    >
      <v-list-item class="grey lighten-4">
        <v-list-item-content>
          <v-list-item-title>
            <v-icon>mdi-basket</v-icon> Daftar Chekout
          </v-list-item-title>
        </v-list-item-content>
        <v-list-item-icon>
          <v-btn
            icon
            @click="booltmp.fp=!booltmp.fp"
          >
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-list-item-icon>
      </v-list-item>

      <v-row class="px-4 py-4">
        <v-col
          cols="12"
        >

          <v-simple-table
                  fixed-header

          >
            <template v-slot:default>
              <thead>
              <tr>
                <th class="text-left">
                  Name
                </th>
                <th class="text-left">
                  Calories
                </th>
              </tr>
              </thead>
              <tbody>
              <tr
                      v-for="item in desserts"
                      :key="item.name"
              >
                <td>{{ item.name }}</td>
                <td>{{ item.calories }}</td>
              </tr>
              </tbody>
            </template>
          </v-simple-table>
        </v-col>
      </v-row>
      <div
        class="text-right px-4 py-4"
        style="bottom: 0;right: 0"
      >
        <v-btn
          v-show="isClearSearch"
          text
          color="primary"
          @click="_clearFilter()"
        >
          Bersihkan filter
        </v-btn>
        <v-btn
          color="success"
          @click="_loadData(true)"
        >
          Terapkan
        </v-btn>
      </div>
    </v-navigation-drawer>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import Dialog from '@/components/Dialog'
import { can, isEmpty } from '@/plugins/supports'

export default {
  name: 'Kasir',
  components: {
    'delete-dialog': Dialog
  },
  data () {
    return {
      dilayani: null,
      toggle_none: null,

      searchQuery: '',
      filterQuery: {
        search: null
      },
      booltmp: {
        fp: false,
        ft: false,
        loading: true
      },
      datas: [],
      desserts: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
        },
        {
          name: 'Eclair',
          calories: 262,
        },
        {
          name: 'Cupcake',
          calories: 305,
        },
        {
          name: 'Gingerbread',
          calories: 356,
        },
        {
          name: 'Jelly bean',
          calories: 375,
        },
        {
          name: 'Lollipop',
          calories: 392,
        },
        {
          name: 'Honeycomb',
          calories: 408,
        },
        {
          name: 'Donut',
          calories: 452,
        },
        {
          name: 'KitKat',
          calories: 518,
        },
        {
          name: 'Beng Beng',
          calories: 518,
        },
        {
          name: 'Coffe',
          calories: 518,
        },
      ],



      showDC: false,
      deleteId: '',
      dcMessages: '',
      dcProgress: false,
      dcdisabledNegativeBtn: false,
      dcdisabledPositiveBtn: false,
      dcNegativeBtn: () => { this.showDC = false },
      dcPositiveBtn: () => this._delete(true)
    }
  },
  computed: {
    headerData () {
      return [
        ,
        { text: '', value: 'aksi' }
      ]
    },
    isClearSearch () {
      for (const key in this.filterQuery) {
        if (!isEmpty(this.filterQuery[key])) {
          return true
        }
      }
      return false
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
    ...mapActions(['getTransaksiCreate']),
    can,

    add_chart(item){

    },




    _clearFilter () {
      this._loadData(true)
    },
    _loadData (abort) {
      if (this.datas.length === 0 || abort) {
        this.booltmp.loading = true
        this.getTransaksiCreate({ ...this.options })
          .then((data) => {
            this.datas = data || []
            this.serverLength = data.total || 0
            this.booltmp.loading = false
          })
      } else {
        this.booltmp.loading = false
      }
    }
  }
}
</script>
<style v-slot:scoped>
.v-data-footer__icons-before,.v-data-footer__icons-after{
  display: none !important;
}
</style>

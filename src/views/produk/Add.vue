<!--
  - Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
  - Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
  -->

<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <div>
    <v-app-bar flat>
      <v-btn
              icon
              light
              @click="backButton"
      >
        <v-icon color="#00a3ff">
          mdi-arrow-left
        </v-icon>
      </v-btn>
      <v-toolbar-title style="line-height: 1.3">
        Tambah Produk
      </v-toolbar-title>
    </v-app-bar>
    <v-container
            fluid
            style="padding: 0 1.5rem 0 1.5rem;"
    >
      <v-row>
        <v-col
                cols="12"
                md="6"
        >
          <v-card
                  class="py-4 px-4 rounded-lg"
                  elevation="3"
          >
            <div>
              <v-text-field v-model="datas.nama_produk" label="Nama Produk" outlined :rules="[rules.required]" />
              <v-select v-model="datas.type_bisnis" label="Bisnis" outlined :rules="[rules.required]" :items="items.type_bisnis" />
              <v-select v-model="datas.id_kategori_produk" label="Kategori Produk" outlined :rules="[rules.required]" :items="items.kategori_produk" />
              <v-text-field v-model="datas.harga" label="Harga" outlined :rules="[rules.required]" />
              <v-select v-model="datas.kesediaan" label="Kesediaan" outlined :rules="[rules.required]"  :items="items.kesediaan"/>
              <v-select v-model="datas.satuan" label="Satuaan" outlined :rules="[rules.required]"  :items="items.satuan"/>
              <v-textarea v-model="datas.deskripsi" label="Deskripsi Produk" outlined :rules="[rules.required]" />
              <v-text-field v-model="datas.stok" label="Stok" outlined :rules="[rules.required]" type="number" />
              <v-select v-model="datas.status" label="Status" outlined :rules="[rules.required]"  :items="items.status"/>
              <v-file-input accept="image/*" counter show-size v-model="datas.foto" label="Foto" outlined :rules="[rules.required]"></v-file-input>
              <v-btn
                      color="green"
                      large
                      :dark="!dataValidation"
                      :disabled="dataValidation"
                      @click="showDC = true"
              >
                <v-icon color="white">
                  mdi-check
                </v-icon>
                SIMPAN
              </v-btn>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
    <dialog-confirm
            :show-dialog="showDC"
            :negative-button="dcNegativeBtn"
            :positive-button="dcPositiveBtn"
            :disabled-negative-btn="dcdisabledNegativeBtn"
            :disabled-positive-btn="dcdisabledPositiveBtn"
            :title="'Simpan'"
            :message="dcMessages"
            :progress="dcProgress"
    />
  </div>
</template>

<script>
  import { mapActions, mapState } from 'vuex'
  import Dialog from '@/components/Dialog'
  import { inputValidator, isEmpty } from '@/plugins/supports'
  import moment from 'moment'

  export default {
    components: {
      'dialog-confirm': Dialog
    },
    data () {
      return {
        loadingData: true,
        showPassword: false,
        showConfirmPassword: false,
        datas: {
          nama_produk:null,
          id_kategori_produk:null,
          harga:null,
          kesediaan:null,
          satuan:null,
          deskripsi:null,
          stok:null,
          status:null,
          type_bisnis:null,
          fotp:null,
        },
        items: {
          // {{item_cols}}
          type_bisnis:[],
          kategori_produk:[],
          kesediaan:[],
          satuan:[],
          status:['Aktif','Nonaktif'],
        },
        dataTypes: {
          nama_produk:'string',
          id_kategori_produk:'string',
          harga:'double',
          kesediaan:'string',
          satuan:'string',
          deskripsi:'string',
          stok:'double',
          status:'string',
          type_bisnis:'string',
        },

        schema: {
          nama_produk:'required',
          id_kategori_produk:'required',
          harga:'required',
          kesediaan:'required',
          satuan:'required',
          deskripsi:'required',
          stok:'required',
          status:'required',
          type_bisnis:'required',
        },
        rules: {
          required: v => {
            v = isEmpty(v)
            return !v || 'Tidak Boleh Kosong'
          },
          email: v => {
            v = /.+@.+\..+/.test(v)
            return v || 'E-mail tidak valid'
          },
        },

        showDC: false,
        dcMessages: 'Simpan Perubahan Sekarang?',
        dcProgress: false,
        dcdisabledNegativeBtn: false,
        dcdisabledPositiveBtn: false,
        dcNegativeBtn: () => {
          this.showDC = false
        },
        dcPositiveBtn: () => this.postSave(),

      }
    },
    computed: {
      ...mapState(['user']),
      dataValidation () {
        return inputValidator(this.schema, this.rules, this.datas)
      }
    },
    created () {
      this.getProdukCreate().then(data => {

        this.items.type_bisnis = isEmpty(data.type_bisnis, {})
        this.items.satuan = isEmpty(data.satuan, {})
        this.items.kategori_produk = isEmpty(data.kategori_produk, {})
        this.items.kesediaan = isEmpty(data.kesediaan, {})
      })
    },
    methods: {
      ...mapActions(['addProduk','getProdukCreate']),
      backButton () {
        this.$router.push({ name: 'produk' })
      },
      postSave () {



        /* Initialize the form data */
        const formData = new FormData()

        /* Add the form data we need to submit */
        Object.keys(this.datas).forEach(d => {
          const tmp = this.datas[d]
          if (this.dataTypes[d] !== 'json') {
            formData.append(d, tmp)
          } else {
            formData.append(d,
                    new Blob([JSON.stringify(tmp)],
                            { type: 'application/json' })
            )
          }
        })

        this.dcProgress = true
        this.dcdisabledNegativeBtn = true
        this.dcdisabledPositiveBtn = true
        this.dcMessages = 'Tunggu Sebentar, Sedang Menyimpan Data Satuan...'

        this.addProduk(formData).then((res) => {
          this.dcProgress = false
          this.dcMessages = res.msg
          setTimeout(() => {
            this.showDC = false
            this.$router.push({ name: 'produk' })
            this.dcMessages = 'Simpan Catatan Baru Sekarang?'
          }, 2000)
        })
      }
    }
  }
</script>

<style scoped>

</style>

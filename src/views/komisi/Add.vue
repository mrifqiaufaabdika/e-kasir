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
        Tambah Grup Komisi
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
              <v-text-field v-model="datas.nama_grup" label="Nama Grup Komisi" outlined :rules="[rules.required]" />


              <template>
                <div>Tipe <strong>Pembayaran </strong>Komisi</div>
              </template>
              <v-radio-group
                      v-model="datas.type"
                      row
                      @change="onTypeChange"
              >
                <v-radio
                        label="Transaksi"
                        value="Transaksi"
                ></v-radio>
                <v-radio
                        label="Produk"
                        value="Produk"
                ></v-radio>
              </v-radio-group>


<!--              <v-select v-model="datas.type" label="Tipe Komisi Berdasarkan" outlined :items="items.type" :rules="[rules.required]"/>-->

              <template>
                <div>Tipe<strong> Nilai </strong>Komisi</div>
              <v-radio-group
                      v-model="datas.tipe_nilai"
                      row
                      @change="onNominalChange"

              >
                <v-radio
                        label="Nominal"
                        value="Nominal"
                ></v-radio>
                <v-radio
                        label="Persentase"
                        value="Persentase"
                ></v-radio>
              </v-radio-group>
              </template>

              <v-text-field v-show="datas.tipe_nilai ==='Nominal'" v-model="datas.nominal" label="Nominal" outlined   :rules="[rules.required]" />
              <v-text-field v-show="datas.tipe_nilai ==='Persentase'"  v-model="datas.persen" label="Persentase" outlined  append-icon="mdi-percent" type="number"   :rules="[rules.required]"/>


              <v-autocomplete
                      v-model="datas.produk"
                      :items="items.produk"
                      outlined
                      chips
                      deletable-chips
                      label="Produk"
                      multiple
                      :rules="[rules.required]"
                      v-show="datas.type ==='Produk'"
              />


              <v-autocomplete
                      v-model="datas.pegawai"
                      :items="items.pegawai"
                      outlined
                      chips
                      deletable-chips
                      label="Pegawai"
                      multiple
                      :rules="[rules.required]"
              />

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
          nama_grup:null,
          type:null,
          tipe_nilai:null,
          nominal:null,
          persen:null,
          pegawai:[],
          produk:[],

        },
        items: {
          // {{item_cols}}
          status: ['Aktif','Nonaktif'],
          type: ['Transaksi','Produk'],
          pegawai: [],
          produk: []
        },
        dataTypes: {
          nama_grup:'string',
          type:'string',
          nominal:'double',
          persen:'string',
          pegawai:'string',
          produk:'string',
        },

        schema: {
          nama_grup:'required',
          type:'required',
          pegawai:'required',
          tipe_nilai:'required',
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
          notRequired: v => true
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

        trigger: null,
      }
    },
    computed: {
      ...mapState(['user']),
      dataValidation () {
        return this.trigger ?  inputValidator(this.schema, this.rules, this.datas) : true
      }
    },
    created () {
      this.getKomisiCreate().then(data => {
        this.items.pegawai = isEmpty(data.pegawai, {})
        this.items.produk = isEmpty(data.produk, {})
      })
    },
    methods: {
      ...mapActions(['getKomisiCreate','addKomisi']),
      backButton () {
        this.$router.push({ name: 'komisi' })
      },
      onTypeChange (e) {
        if (e === 'Produk') {
          this.schema.produk = 'required'
        } else if (e === 'Transaksi') {
          this.schema.produk = 'notRequired'
        }
        this.trigger = Math.random()
      },
      onNominalChange (e) {
        if (e === 'Nominal') {
          this.schema.nominal = 'required'
          this.schema.persen = 'notRequired'
        } else if (e === 'Persentase') {
          this.schema.nominal = 'notRequired'
          this.schema.persen = 'required'
        }
        this.trigger = Math.random()
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
        this.dcMessages = 'Tunggu Sebentar, Sedang Menyimpan Data Pegawai...'

        console.log(this.datas.pencatat)
        this.addKomisi(formData).then((res) => {
          this.dcProgress = false
          this.dcMessages = res.msg
          setTimeout(() => {
            this.showDC = false
            this.$router.push({ name: 'komisi' })
            this.dcMessages = 'Simpan Catatan Baru Sekarang?'
          }, 2000)
        })
      }
    }
  }
</script>

<style scoped>

</style>

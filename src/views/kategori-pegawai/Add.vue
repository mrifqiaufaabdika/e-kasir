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
        Tambah Kategori Pegawai
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
              <v-text-field v-model="datas.nama_kategori" label="Nama Kategori Pegawai" outlined :rules="[rules.required]" />
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
          nama_kategori:null,
        },
        items: {
          // {{item_cols}}
        },
        dataTypes: {
          nama_kategori:'string',
        },

        schema: {
          nama_kategori:'required',
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
    methods: {
      ...mapActions(['addKategoriPegawai']),
      backButton () {
        this.$router.push({ name: 'kategori-pegawai' })
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
        this.addKategoriPegawai(formData).then((res) => {
          this.dcProgress = false
          this.dcMessages = res.msg
          setTimeout(() => {
            this.showDC = false
            this.$router.push({ name: 'kategori-pegawai' })
            this.dcMessages = 'Simpan Catatan Baru Sekarang?'
          }, 2000)
        })
      }
    }
  }
</script>

<style scoped>

</style>

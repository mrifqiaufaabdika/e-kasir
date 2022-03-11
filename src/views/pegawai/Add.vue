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
        Tambah Pegawai
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
              <v-text-field v-model="datas.nik" label="NIK" outlined :rules="[rules.required]" type="number" />
              <v-text-field v-model="datas.nama" label="Nama" outlined :rules="[rules.required]" />
              <v-select v-model="datas.jenis_kelamin" label="Jenis Kelamin" :items="items.jenis_kelamin" outlined :rules="[rules.required]" />
              <v-text-field v-model="datas.tempat_lahir" label="Tempat Lahir" outlined :rules="[rules.required]" />
              <v-text-field v-model="datas.telpon" label="Telepon" outlined :rules="[rules.required]" />
              <v-select v-model="datas.agama" label="Agama" outlined :items="items.agama" :rules="[rules.required]" type="number" min="0"/>
              <v-select v-model="datas.status_nikah" label="Status Nikah" :items="items.status_nikah" outlined :rules="[rules.required]" />
              <v-textarea v-model="datas.alamat" label="Alamat" outlined  :rules="[rules.required]"/>
              <v-text-field v-model="datas.email" label="Email" outlined  :rules="[rules.required,rules.email]"/>
              <v-select v-model="datas.id_kategori_pegawai" label="Kategori Pegawai" :items="items.kategori_pegawai"outlined  :rules="[rules.required]"/>
              <v-text-field v-model="datas.gaji_pokok" label="Gaji Pokok" outlined  :rules="[rules.required]"/>
              <v-menu
                      v-model="model_tgl_lahir"
                      :close-on-content-click="false"
                      max-width="290"
                      transition="scale-transition"
                      offset-y
                      min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                          :value="computedTanggalLahirDateFormat"
                          clearable
                          readonly
                          outlined
                          label="Tanggal Lahir"
                          :rules="[rules.required]"
                          class="bpp-input-md bpp-rounded-12"
                          v-bind="attrs"
                          v-on="on"
                          @click:clear="datas.tanggal_lahir = null"
                  />
                </template>
                <v-date-picker
                        v-model="datas.tanggal_lahir"
                        locale="id-id"
                        @input="model_tgl_lahir = false"
                />
              </v-menu>
              <v-menu
                      v-model="model_tgl_terima"
                      :close-on-content-click="false"
                      max-width="290"
                      transition="scale-transition"
                      offset-y
                      min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                          :value="computedTanggalMasukDateFormat"
                          clearable
                          readonly
                          outlined
                          label="Tanggal Terima"
                          :rules="[rules.required]"
                          class="bpp-input-md bpp-rounded-12"
                          v-bind="attrs"
                          v-on="on"
                          @click:clear="datas.tanggal_terima = null"
                  />
                </template>
                <v-date-picker
                        v-model="datas.tanggal_terima"
                        locale="id-id"
                        @input="model_tgl_terima = false"
                />
              </v-menu>
              <v-text-field v-model="datas.tanggal_keluar" label="Tanggal Keluar" outlined  :rules="[rules.required]"/>
              <v-file-input accept="image/*" counter show-size v-model="datas.foto" label="Foto" outlined :rules="[rules.required]"></v-file-input>
              <v-select v-model="datas.status" label="Status" outlined :items="items.status" :rules="[rules.required]"/>
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
import { mapActions } from 'vuex'
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
        nik:null,
        nama:null,
        jenis_kelamin:null,
        tempat_lahir:null,
        telpon:null,
        agama:null,
        status_nikah:null,
        alamat:null,
        email:null,
        id_kategori_pegawai:null,
        gaji_pokok:null,
        tanggal_lahir:null,
        tanggal_terima:null,
        tanggal_keluar:null,
        foto:null,
        status:null
      },
      items: {
        // {{item_cols}}
        status: ['Aktif','Nonaktif'],
        status_nikah: ['Menikah','Belum Menikah'],
        jenis_kelamin: ['Pria','Wanita'],
        agama: ['Islam','Kristen','Hindu','Budha','Konghucu'],
        kategori_pegawai:[]
      },
      dataTypes: {
        nik:'string',
        nama:'string',
        jenis_kelamin:'string',
        tempat_lahir:'string',
        telpon:'string',
        agama:'string',
        status_nikah:'string',
        alamat:'string',
        email:'string',
        id_kategori_pegawai:'string',
        gaji_pokok:'double',
        tanggal_lahir:'string',
        tanggal_terima:'string',
        tanggal_keluar:'string',
        foto:'string',
        status:'string'
      },

      schema: {
        nik:'required',
        nama:'required',
        jenis_kelamin:'required',
        tempat_lahir:'required',
        telpon:'required',
        agama:'required',
        status_nikah:'required',
        alamat:'required',
        email:'required',
        id_kategori_pegawai:'required',
        gaji_pokok:'required',
        tanggal_lahir:'required',
        tanggal_terima:'required',
        tanggal_keluar:'required',
        foto:'required',
        status:'required'
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

      model_tgl_lahir: false,
      model_tgl_terima: false,
      model_tgl_keluar: false
    }
  },
  computed: {
    computedTanggalLahirDateFormat () {
      return this.datas.tanggal_lahir ? moment(this.datas.tanggal_lahir).format('dddd, Do MMMM YYYY') : ''
    },
    computedTanggalMasukDateFormat () {
      return this.datas.tanggal_terima ? moment(this.datas.tanggal_terima).format('dddd, Do MMMM YYYY') : ''
    },
    dataValidation () {
      return inputValidator(this.schema, this.rules, this.datas)
    }
  },
  created () {
    this.getPegawaiCreate().then(data => {
      this.items.kategori_pegawai = isEmpty(data.kategori_pegawai, {})
    })
  },
  methods: {
    ...mapActions(['getPegawaiCreate', 'addPegawai']),
    backButton () {
      this.$router.push({ name: 'pegawai' })
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
      this.addPerjalanan(formData).then((res) => {
        this.dcProgress = false
        this.dcMessages = res.msg
        setTimeout(() => {
          this.showDC = false
          this.$router.push({ name: 'pegawai' })
          this.dcMessages = 'Simpan Pegawai Baru Sekarang?'
        }, 2000)
      })
    }
  }
}
</script>

<style scoped>

</style>

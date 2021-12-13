<!--
  - Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
  - Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
  -->

<template>
  <div>
    <v-app-bar flat>
      <v-btn
        icon
        dark
        @click="backButton"
      >
        <v-icon color="#00a3ff">
          mdi-arrow-left
        </v-icon>
      </v-btn>
      <v-toolbar-title class="ml-md-2">
        Tambah Halte
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
              <v-text-field v-model="datas.nama_halte" label="Nama Halte" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.alamat" label="Alamat" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.koordinat" label="Koordinat" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.tipe" label="Tipe" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.transit" label="Transit" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.rute_singgah" label="Rute Singgah" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.kapasitas" label="Kapasitas" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.status" label="Status" outlined :rules="[rules.required]" />
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
      :progress="dcProgress"
      :title="'Simpan'"
      :message="dcMessages"
    />
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import Dialog from '@/components/Dialog'
import { inputValidator, isEmpty } from '@/plugins/supports'

export default {
  components: {
    'dialog-confirm': Dialog
  },
  data () {
    return {
      datas: {
        nama_halte: null,
        alamat: null,
        koordinat: null,
        tipe: null,
        transit: null,
        rute_singgah: null,
        kapasitas: null,
        status: null
      },
      items: {
        // {{item_cols}}
      },
      dataTypes: {
        nama_halte: 'string',
        alamat: 'string',
        koordinat: 'string',
        tipe: 'string',
        transit: 'string',
        rute_singgah: 'string',
        kapasitas: 'string',
        status: 'string'
      },
      schema: {
        nama_halte: 'required',
        alamat: 'required',
        koordinat: 'required',
        tipe: 'required',
        transit: 'required',
        rute_singgah: 'required',
        kapasitas: 'required',
        status: 'required'
      },
      rules: {
        required: v => {
          v = isEmpty(v)
          return !v || 'Tidak Boleh Kosong'
        }
      },

      showDC: false,
      dcMessages: 'Simpan Halte Sekarang?',
      dcProgress: false,
      dcdisabledNegativeBtn: false,
      dcdisabledPositiveBtn: false,
      dcNegativeBtn: () => { this.showDC = false },
      dcPositiveBtn: () => this.postAdd()
    }
  },
  computed: {
    dataValidation () {
      return inputValidator(this.schema, this.rules, this.datas)
    }
  },
  created () {
    this.createHalte().then(data => {
      // this.items = isEmpty(data.items, {})
    })
  },
  methods: {
    ...mapActions(['addHalte', 'createHalte']),
    backButton () { this.$router.push({ name: 'halte' }) },
    postAdd () {
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
      this.dcMessages = 'Tunggu Sebentar, Sedang Menyimpan Halte...'
      this.addHalte(formData).then((res) => {
        this.dcProgress = false
        this.dcMessages = res.msg
        setTimeout(() => {
          this.showDC = false
          this.$router.push({ name: 'halte' })
          this.dcMessages = 'Simpan Halte Sekarang?'
        }, 2000)
      })
    }
  }
}
</script>

<style>
.fs-14 > label{
    font-size: 14px !important;
}
.theme--light.v-data-table.v-data-table--fixed-header thead th {
    background-color: #eee !important;
}
</style>

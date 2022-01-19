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
        Edit Keuangan
        <div
          v-if="!loadingData"
          style="font-size: 11pt"
        >
          {{ datas.id }}
        </div>
        <v-skeleton-loader
          v-else
          ref="skeleton"
          type="text"
          max-width="100%"
        />
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
              <v-text-field v-model="datas.nama_halte" label="Nama Keuangan" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.alamat" label="Alamat" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.koordinat" label="Koordinat" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.tipe" label="Tipe" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.transit" label="Transit" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.rute_singgah" label="Laporan Singgah" outlined :rules="[rules.required]" />
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
    <update-dialog
      :show-dialog="showDC"
      :negative-button="dcNegativeBtn"
      :positive-button="dcPositiveBtn"
      :disabled-negative-btn="dcdisabledNegativeBtn"
      :disabled-positive-btn="dcdisabledPositiveBtn"
      :title="'Perbarui'"
      :message="dcMessages"
      :progress="dcProgress"
    />
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import Dialog from '@/components/Dialog'
import { inputValidator, isEmpty } from '@/plugins/supports'

export default {
  components: {
    'update-dialog': Dialog
  },
  props: {
    id: { type: [String, Number], required: true }
  },
  data () {
    return {
      loadingData: true,
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
      dcMessages: 'Simpan Perubahan Sekarang?',
      dcProgress: false,
      dcdisabledNegativeBtn: false,
      dcdisabledPositiveBtn: false,
      dcNegativeBtn: () => { this.showDC = false },
      dcPositiveBtn: () => this.postUpdate()
    }
  },
  computed: {
    dataValidation () {
      return inputValidator(this.schema, this.rules, this.datas)
    }
  },
  created () {
    this.editHalte({ id: this.id })
      .then(data => {
        this.datas = isEmpty(data, {})
        this.datas.detail = isEmpty(data.detail, {})
        this.loadingData = false
      })
      .catch((error) => {
        this.datas = {}
        this.loadingData = false
        console.log('Error : ' + error)
      })
  },
  methods: {
    ...mapActions(['editHalte', 'updateHalte']),
    backButton () {
      this.$router.push({ name: 'halte' })
    },
    postUpdate () {
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
                {type: 'application/json'})
            )
        }
      })

      this.dcProgress = true
      this.dcdisabledNegativeBtn = true
      this.dcdisabledPositiveBtn = true
      this.dcMessages = 'Sedang Menyimpan Halte...'

      this.updateHalte(formData).then((res) => {
        this.dcMessages = res.msg
        this.dcProgress = false
        setTimeout(() => {
          this.showDC = false
          this.dcdisabledNegativeBtn = false
          this.dcdisabledPositiveBtn = false
          this.$router.push({ name: 'halte' })
          this.dcMessages = 'Simpan Perubahan Sekarang?'
        }, 1500)
      })
    }
  }
}
</script>

<style scoped>

</style>

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
        Edit Kasbon
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
              <v-text-field v-model="datas.id_pramudi" label="Id Inventaris" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.id_bus" label="Id Transaksi" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.id_rute" label="Id Laporan" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.waktu_mulai" label="Waktu Mulai" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.waktu_selesai" label="Waktu Selesai" outlined :rules="[rules.required]" />
          <v-text-field v-model="datas.koordinat" label="Koordinat" outlined :rules="[rules.required]" />
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
        id_pramudi: null,
        id_bus: null,
        id_rute: null,
        waktu_mulai: null,
        waktu_selesai: null,
        koordinat: null,
        status: null
      },
      items: {
        // {{item_cols}}
      },
      dataTypes: {
        id_pramudi: 'string',
        id_bus: 'string',
        id_rute: 'string',
        waktu_mulai: 'string',
        waktu_selesai: 'string',
        koordinat: 'string',
        status: 'string'
      },
      schema: {
        id_pramudi: 'required',
        id_bus: 'required',
        id_rute: 'required',
        waktu_mulai: 'required',
        waktu_selesai: 'required',
        koordinat: 'required',
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
    this.editPerjalanan({ id: this.id })
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
    ...mapActions(['editPerjalanan', 'updatePerjalanan']),
    backButton () {
      this.$router.push({ name: 'perjalanan' })
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
      this.dcMessages = 'Sedang Menyimpan Perjalanan...'

      this.updatePerjalanan(formData).then((res) => {
        this.dcMessages = res.msg
        this.dcProgress = false
        setTimeout(() => {
          this.showDC = false
          this.dcdisabledNegativeBtn = false
          this.dcdisabledPositiveBtn = false
          this.$router.push({ name: 'perjalanan' })
          this.dcMessages = 'Simpan Perubahan Sekarang?'
        }, 1500)
      })
    }
  }
}
</script>

<style scoped>

</style>

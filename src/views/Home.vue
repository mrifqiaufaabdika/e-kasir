<!--
  - Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
  - Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
  -->

<template>
  <div class="home">
    <v-app-bar flat>
      <v-icon
        color="#00a3ff"
        class="ml-1 mr-5 d-md-none"
        @click="$emit('toggle-drawer')"
        v-text="'mdi-menu'"
      />
      <v-toolbar-title class="ml-md-2">
        Dashboard
      </v-toolbar-title>
      <v-spacer />
    </v-app-bar>
    <v-container
      fluid
      style="padding: 0 1.5rem 0 1.5rem"
    >
      <v-row dense>
        <v-col
                cols="12"
                sm="6"
                md="3"
        >
          <v-card
                  color="#35d0a7"
                  dark
                  elevation="2"
                  style="border-radius: 10px"
                  @click="goToKasir()"
          >
            <v-card-text class="mb-4">
              <div>
                <v-icon style="font-size: 4rem !important">
                  mdi-calculator
                </v-icon>
                <div class="float-right text-right">
                  <div class="white--text font-weight-bold headline">
                    Kasir
                  </div>
                </div>
              </div>
            </v-card-text>

          </v-card>
        </v-col>
        <v-col
                cols="12"
                sm="6"
                md="3"
        >
          <v-card
                  color="#f2a42b"
                  dark
                  elevation="2"
                  style="border-radius: 10px"
                  @click="goToPerjalanan()"
          >
            <v-card-text class="mb-4">
              <div>
                <v-icon style="font-size: 4rem !important">
                  mdi-barcode
                </v-icon>
                <div class="float-right text-right">
                  <div class="white--text font-weight-bold headline">
                    Produk
                  </div>
                </div>
              </div>
            </v-card-text>

          </v-card>
        </v-col>

        <v-col
                cols="12"
                sm="6"
                md="3"
        >
          <v-card
                  color="#05467e"
                  dark
                  elevation="2"
                  style="border-radius: 10px"
                  @click="goToRute()"
          >
            <v-card-text>
              <div>
                <v-icon style="font-size: 4rem !important">
                  mdi-account-group-outline
                </v-icon>
                <div class="float-right text-right">
                  <div
                          class="white--text font-weight-bold headline"
                  >
                    Pegawai
                  </div>

                </div>
              </div>
            </v-card-text>
          </v-card>


        </v-col>
        <v-col
                cols="12"
                sm="6"
                md="3"
        >
          <v-card
                  color="#05467e"
                  dark
                  elevation="2"
                  style="border-radius: 10px"
                  @click="goToRute()"
          >
            <v-card-text>
              <div>
                <v-icon style="font-size: 4rem !important">
                  mdi-cash-multiple
                </v-icon>
                <div class="float-right text-right">
                  <div
                          class="white--text font-weight-bold headline"
                  >
                    Keuangan
                  </div>

                </div>
              </div>
            </v-card-text>
          </v-card>


        </v-col>

      </v-row>
    </v-container>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import { isEmpty } from '../plugins/supports'

export default {
  name: 'Home',
  data: function () {
    return {
    }
  },
  computed: {
  },
  created () {
  },
  methods: {
    goToKasir(){
      this.$router.push({
        name: 'kasir'
      })
    }
  }
}
</script>
<style scoped>
.lead {
  font-size: 12pt !important;
  color: #6c6b6b;
}
</style>

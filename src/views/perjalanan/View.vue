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
        Perjalanan
      </v-toolbar-title>
      <v-spacer />
      <v-btn
        title="Perbarui Data"
        icon
        @click="_loadData()"
      >
        <v-icon>mdi-reload</v-icon>
      </v-btn>
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
              <v-row
                v-for="(data, key) in datas"
                :key="key"
                class="px-1"
              >
                <template
                  v-if="(typeof data==='object')"
                >
                  <template v-for="(d,i) in data">
                    <v-col
                      :key="`t_${i}`"
                      cols="4"
                      md="3"
                    >
                      <strong class="text-capitalize">{{ i.replace('_',' ').toLowerCase() }}</strong>
                    </v-col>
                    <v-col
                      :key="`v_${i}`"
                      cols="8"
                      md="9"
                    >
                      <v-skeleton-loader
                        v-show="loadingData"
                        max-width="300"
                        type="text"
                      />
                      <div
                        v-show="!loadingData"
                        class="black--text"
                      >
                        {{ d }}
                      </div>
                    </v-col>
                  </template>
                </template>
                <template v-else>
                  <v-col
                    cols="4"
                    md="3"
                  >
                    <strong class="text-capitalize">{{ key.replace('_',' ').toLowerCase() }}</strong>
                  </v-col>
                  <v-col
                    cols="8"
                    md="9"
                  >
                    <v-skeleton-loader
                      v-show="loadingData"
                      max-width="300"
                      type="text"
                    />
                    <div
                      v-show="!loadingData"
                      class="black--text"
                    >
                      {{ data }}
                    </div>
                  </v-col>
                </template>
              </v-row>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  props: {
    id: { type: [String, Number], required: true }
  },
  data () {
    return {
      loadingData: true,
      datas: {},
      errorResponse: false
    }
  },
  computed: {
    disableActions () {
      return this.loadingData || this.errorResponse
    }
  },
  created () {
    this._loadData()
  },
  methods: {
    ...mapActions(['getPerjalananById']),
    backButton () {
      this.$router.push({ name: 'perjalanan' })
    },
    _loadData () {
      this.loadingData = true
      this.getPerjalananById({ id: this.id })
        .then(data => {
          this.datas = data || {}
          this.loadingData = false
        })
        .catch(() => {
          this.datas = {}
          this.loadingData = false
          this.errorResponse = true
        })
    }
  }
}
</script>

<style scoped>
  .v-label {
    font-size: 19px !important;
  }

  .v-text-field > .v-input__control > .v-input__slot::after {
    content: none !important;
  }
</style>

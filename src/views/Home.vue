<!--
  - Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
  - Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
  -->

<template>
  <div class="home">
    <v-app-bar flat>
      <v-icon
        color="#00a3ff"
        class="ml-1 mr-5"
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
                  @click="goToKasir(datas.value.bisnis[1].id)"
          >
            <v-card-text class="mb-4">
              <div>
                <v-icon style="font-size: 4rem !important">
                  mdi-calculator
                </v-icon>
                <div class="float-right text-right">
                  <div class="white--text font-weight-bold headline">
                    Kasir {{ datas.value.bisnis[1].nama }}
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
                  @click="goToKasir(datas.value.bisnis[0].id)"
          >
            <v-card-text class="mb-4">
              <div>
                <v-icon style="font-size: 4rem !important">
                  mdi-calculator
                </v-icon>
                <div class="float-right text-right">
                  <div class="white--text font-weight-bold headline">
                    Kasir {{ datas.value.bisnis[0].nama }}
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
      <v-row dense class="mt-5">

        <!--chart Tansaksi Minggu ini-->
        <v-col
          cols="12"
          md="6"
        >
          <v-card height="100%">
            <v-card-title class="pl-5">
              Diagram Transaksi Minggu Ini
            </v-card-title>
            <v-card-subtitle class="pl-5">
              Digaram dikelompokan berdasarkan jenis usaha
            </v-card-subtitle>
            <vue-apex-charts
              type="line" height="350" :options="options1" :series="series1"
            />
          </v-card>
        </v-col>



        <!--chart transaksi bulan-->
        <v-col
          cols="12"
          md="6"
        >
          <v-card height="100%">
            <v-card-title class="pl-5">
              Diagram Omset Perbulan
            </v-card-title>
            <v-card-subtitle class="pl-5">
              Digaram dikelompokan berdasarkan jenis usaha
            </v-card-subtitle>
            <vue-apex-charts
              type="line" height="350" :options="chartOptions" :series="series"
            />
          </v-card>
        </v-col>

        <v-col
          cols="12"
        >
          <v-card height="100%">
            <v-card-title class="pl-5">
              Diagram Penjualan Produk Bulan Ini
            </v-card-title>
            <v-card-subtitle class="pl-5">
              Digaram dikelompokan berdasarkan jenis usaha
            </v-card-subtitle>
            <vue-apex-charts
              type="bar" height="350" :options="chartOptionsBar" :series="seriesBar"
            />
          </v-card>
        </v-col>




      </v-row>
    </v-container>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import VueApexCharts from 'vue-apexcharts'

import { isEmpty } from '../plugins/supports'

export default {
  name: 'Home',
  components:{VueApexCharts},
  data: function () {
    return {

      datas:{},




      //series minggunan
      options1: {
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
          categories: ['20/12/22', '21/12/22', '22/12/22', '23/12/22', '24/12/22', '25/12/22', '26/12/22']
        }
      },
      series1: [{
        name: 'series-1',
        data: [30, 40, 45, 50, 49, 60, 70]
      }],

      //series bulanan
      series: [
        {
          name: "Car Wash",
          data: [28, 29, 33, 36, 32, 32, 33]
        },
        {
          name: "Coffe Shop",
          data: [12, 11, 14, 18, 17, 13, 13]
        }
      ],
      chartOptions: {
        chart: {
          height: 350,
          type: 'line',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#77B6EA', '#545454'],
        dataLabels: {
          enabled: true,
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Grafik Omset Perbulan',
          align: 'left'
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        markers: {
          size: 1
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
          title: {
            text: 'Month'
          }
        },
        yaxis: {
          title: {
            text: 'Total'
          },
          min: 5,
          max: 40
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
      },

      //series bar
      seriesBar: [{
        data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
      }],
      chartOptionsBar: {
        chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
          '#f48024', '#69d2e7'
        ],
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff']
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories: ['Cucian Mobil Kecil', 'Cucian Mobil Besar', 'Coffe', 'Air Mineral', 'Kentang Gorong', 'Salon Mobil Kecil', 'Salon Mobil Besar',
            'Cocacola', 'Tea Milk', 'Milk Shake'
          ],
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        title: {
          text: 'Daftar Produk Terjual',
          align: 'center',
          floating: true
        },
        subtitle: {
          text: 'Product Names as DataLabels inside bars',
          align: 'center',
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function () {
                return ''
              }
            }
          }
        }
      },



    }
  },
  computed: {
  },
  watch: {
    options (a, b) {
      this._loadData(true)
    }
  },
  created () {
  },
  mounted () {
    this._loadData(false) // loading data form server
  },
  methods: {
    ...mapActions(['getDashboard']),
    _loadData () {
        this.getDashboard()
          .then((data) => {
            this.datas = data.items || []
          })
      },
    goToKasir(value){
      this.$router.push({
        name: 'kasir',
        params: { id: value }
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

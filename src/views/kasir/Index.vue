<!--
  - Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
  - Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
  -->

<template>
  <div class="kasir">
    <v-app-bar flat>
      <v-icon
        color="#00a3ff"
        class="mr-5"
        @click="$emit('toggle-drawer')"
        v-text="'mdi-menu'"
      />
      <v-toolbar-title class="ml-md-2">
        Kasir {{datas.type_bisnis.nama}}
      </v-toolbar-title>

      <v-spacer />

      <v-btn
        icon
        @click="booltmp.fp = !booltmp.fp">
      <v-badge
        :content="cartCount"
        :value="cartCount"
        color="green"
        overlap
      >
          <v-icon>
            mdi-basket
          </v-icon>
      </v-badge>
      </v-btn>
      <v-btn
        title="Perbarui Data"
        icon
        @click="_loadData(true)"
      >
        <v-icon>mdi-reload</v-icon>
      </v-btn>
    </v-app-bar>

    <v-container fluid>
      <v-row dense>
        <v-col cols="6" md="4">
          <v-menu
            v-model="menu2"
            :close-on-content-click="false"
            transition="scale-transition"
            offset-y
            min-width="auto"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="date"
                label="Tanggal Transaksi"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
                outlined


              ></v-text-field>
            </template>
            <v-date-picker
              v-model="date"
              @input="menu2= false"

            ></v-date-picker>
          </v-menu>
        </v-col>
        <v-col cols="6" md="4" >
          <v-text-field
            v-model="search_member.nomor_hp"
            label="Nomor HP Custoumer"
            prepend-icon="mdi-account"
            append-outer-icon="mdi-account-search"
            outlined
            clearable
            @click:append-outer="getByPhone()"


          ></v-text-field>
        </v-col>
        <v-col cols="12" md="4" v-if="member.id_member">
          <v-card
            outlined

          >
            <v-app-bar
              flat
              dense
            >

              <v-toolbar-title class="text-h6 black--text pl-0">
                Member
              </v-toolbar-title>

              <v-spacer></v-spacer>

              <v-btn
                color="black"
                icon
                @click="remove_member()"
              >
                <v-icon>mdi-close</v-icon>
              </v-btn>
            </v-app-bar>
            <v-list-item one-line>

                <div class="text-overline mb-1">
                  {{ member.nama }} - {{ member.nomor_hp }}
                </div>

            </v-list-item>
          </v-card>
        </v-col>
      </v-row>
      <template>
        <v-item-group active-class="primary">
          <v-container>
            <v-row>
              <v-col
                v-for="item in datas.produk"
                :key="item.title"
                :cols="4"
                :md="3"
                :sm="3"
              >
                <v-item v-slot="{ active, toggle }">
                  <v-card
                    @click="onclikItem(item)"
                  >
                    <v-img
                      v-bind:src="'http://localhost:7001/storage/produk/'+item.foto"
                      class="white--text align-end"
                      gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                      height="200px"
                    >
                      <v-card-title v-text="item.nama_produk" class="text-h5 font-weight-bold text-left text-wrap"></v-card-title>
                    </v-img>
                  <v-card-subtitle class="text-h6 pb-0 text--primary">
                    Rp {{formatPrice(item.harga)}} / {{item.satuan_barang}}
                  </v-card-subtitle>
                  <v-card-text >
                    {{item.deskripsi}}
                  </v-card-text>
<!--                    <v-scroll-y-transition>-->
<!--                      <div-->
<!--                        v-if="active"-->
<!--                        class="text-h2 flex-grow-1 text-center"-->
<!--                      >-->
<!--                        Active-->
<!--                      </div>-->
<!--                    </v-scroll-y-transition>-->
                  </v-card>
<!--                  <v-card-->
<!--                    class="d-flex align-center"-->
<!--                    dark-->
<!--                    height="200"-->
<!--                    @click="toggle"-->
<!--                  >-->
<!--                    <v-scroll-y-transition>-->
<!--                      <div-->
<!--                        v-if="active"-->
<!--                        class="text-h2 flex-grow-1 text-center"-->
<!--                      >-->
<!--                        Active-->
<!--                      </div>-->
<!--                    </v-scroll-y-transition>-->
<!--                  </v-card>-->
                </v-item>
              </v-col>
            </v-row>
          </v-container>
        </v-item-group>
      </template>

    </v-container>
    <v-dialog
      v-model="cartDialog"
      width="600"
    >
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          {{ itemSelect.nama_produk }}
          <v-spacer></v-spacer>
          <v-btn
            icon
            @click="cartDialog  = false"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row
              dense>
              <v-col
                cols="8"
              >
                <v-text-field
                  v-model="cartTmp.jumlah"
                  label="Jumlah *"
                  required
                ></v-text-field>
              </v-col>
              <v-col
                cols="4"
              >
                <v-btn-toggle v-model="toggle_none">
                  <v-btn>
                    <v-icon dark>
                      mdi-minus
                    </v-icon>
                  </v-btn>
                  <v-btn>
                    <v-icon dark>
                      mdi-plus
                    </v-icon>
                  </v-btn>
                </v-btn-toggle>
              </v-col>
              <v-col cols="12">
                <v-autocomplete
                  v-model="cartTmp.satuan = itemSelect.satuan"
                  :value="itemSelect.satuan"
                  :items="datas.satuan"
                  label="Satuan"
                ></v-autocomplete>
              </v-col>
              <v-col cols="12">
                <v-textarea
                  v-model="cartTmp.catatan"
                  clearable
                  clear-icon="mdi-close-circle"
                  label="Catatan.."
                  rows="1"
                  auto-grow
                ></v-textarea>
              </v-col>
        <!--                      <pre>{{item.pegawai_komisi}}</pre>-->
              <v-col
                v-for="(komisi,indexKomisi) in itemSelect.pegawai_komisi"
                :key="indexKomisi"
                cols="12"
              >
                <v-text-field
                  v-model="cartTmp.komisi[indexKomisi] = komisi.id"
                  v-show="false"></v-text-field>
                <h3 class="text-h6 mb-2">
                  {{komisi.nama_grup}} Oleh :
                </h3>
                <v-chip-group
                  v-model="cartTmp.servicer[indexKomisi]"
                  column
                  active-class="primary--text"
                  mandatory
                >

                                  <v-chip
                                    v-for="(pegawiKomisi, indexPegawaiKomisi) in komisi.pegawai"
                                    :key="indexPegawaiKomisi"
                                    :value="pegawiKomisi.nip"
                                    filter
                                    outlined
                                  >
                                    {{ pegawiKomisi.nama }}
                                  </v-chip>

                                </v-chip-group>
                              </v-col>
                            </v-row>
                          </v-container>
                        </v-card-text>
        <!--                <pre>{{item}}</pre>-->

<!--                        <pre>{{cartTmp}}</pre>-->

                        <v-divider></v-divider>

                        <v-card-actions>

                          <v-btn
                            large
                            color="green"
                            dark
                            @click="addItem()"
                            block>
                            Tambah Item
                            <v-spacer></v-spacer>
                            <v-icon
                              right
                              dark
                            >
                              mdi-basket
                            </v-icon>
                          </v-btn>
                        </v-card-actions>
                      </v-card>
    </v-dialog>
    <delete-dialog
      :show-dialog="showDC"
      :negative-button="dcNegativeBtn"
      :positive-button="dcPositiveBtn"
      :disabled-negative-btn="dcdisabledNegativeBtn"
      :disabled-positive-btn="dcdisabledPositiveBtn"
      :progress="dcProgress"
      :title="'Hapus'"
      :message="dcMessages"
    />
    <v-navigation-drawer
      v-model="booltmp.fp"
      fixed
      width="600"
      temporary
      right
    >
      <v-list-item class="grey lighten-4">
        <v-list-item-content>
          <v-list-item-title>
            <v-icon>mdi-basket</v-icon> Daftar Chekout
          </v-list-item-title>
        </v-list-item-content>
        <v-list-item-icon>
          <v-btn
            icon
            @click="booltmp.fp=!booltmp.fp"
          >
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-list-item-icon>
      </v-list-item>

      <v-row  class="px-4 py-4" dense>
        <v-col
          cols="12"
        >
          <v-simple-table dense>
            <tbody>
            <tr>
              <td>Kasir</td>
              <td>{{ cart.kasir.name }}</td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td>{{ date }}</td>
            </tr>
            <tr>
              <td>Pelanggan</td>
              <td>{{ member.nama }}</td>
            </tr>
            </tbody>
          </v-simple-table>
        </v-col>
        <v-col
          cols="12"
        >
<!--          <pre>{{cart}}</pre>-->

          <v-simple-table
                  fixed-header

          >
            <template v-slot:default>
              <thead>
              <tr>
                <th class="text-left">
                  Item
                </th>
                <th class="text-left">
                  Jumlah
                </th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              <tr
                      v-for="item in cart.item"
                      :key="item.nama"
              >
                <td>{{ item.nama }}<br>{{ item.qty }} x {{ formatPrice(item.harga) }}</td>
                <td>{{ formatPrice(item.total) }}</td>
                <td>
                  <v-btn
                    icon
                    color="grey"
                    x-small
                  >
                    <v-icon>mdi-delete</v-icon>
                  </v-btn>

                </td>
              </tr>
              </tbody>
            </template>
          </v-simple-table>
        </v-col>
        <v-col
          cols="12"
        >
          <v-simple-table dense>
            <tbody>
              <tr>
                <td>Subtotal</td>
                <td>{{ formatPrice(cart.subtotal) }}</td>
              </tr>
              <tr>
                <td>Potongan</td>
                <td>{{formatPrice(0)}}</td>
              </tr>
<!--              <tr>-->
<!--                <td>Pajak</td>-->
<!--                <td>Subtotal</td>-->
<!--              </tr>-->
              <tr>
                <td>Total</td>
                <td>{{formatPrice(70000)}}</td>
              </tr>
            </tbody>
          </v-simple-table>
        </v-col>
        <v-col cols="12">
          <vuetify-money
            v-model="cart.bayar"
            label="Bayar"
            required
            outlined="outlined1"
            :options="rupiah_format"
          />

        </v-col>
        <v-col cols="12">
          Kembalian : 0
        </v-col>
      </v-row>
      <div
        class="text-right px-4 py-4"
        style="bottom: 0;right: 0"
      >
        <v-btn
          text
          color="primary"
          @click="_clearFilter()"
        >
          Simpan
        </v-btn>
        <v-btn
          color="success"
          @click="_create_transaksi(true)"
        >
          Terapkan
        </v-btn>
      </div>
    </v-navigation-drawer>
    <v-dialog
      v-model="loading"
      persistent
      width="300"
    >
      <v-card
        color="primary"
        dark
      >
        <v-card-text>
          Please stand by
          <v-progress-linear
            indeterminate
            color="white"
            class="mb-0"
          ></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
    <v-dialog
      v-model="dialog_add_memeber"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title>
          <span class="text-h5">Tambah Member</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row dense>
              <v-col cols="12">
              <v-text-field v-model="addmember.nama" label="Nama" outlined :rules="[rules.required]" />
              </v-col>
              <v-col cols="12">
              <v-text-field v-model="addmember.nomor_hp" label="Nomor Hp" outlined :rules="[rules.required]" />
              </v-col>
              <v-col cols="12">
              <v-select v-model="addmember.jenis_kelamin" label="Jenis Kelamin" :items="items.jenis_kelamin" outlined :rules="[rules.required]" />
              </v-col>
              <v-col cols="12">
              <v-text-field v-model="addmember.alamat" label="Alamat" outlined />
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog_add_memeber = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="postAddMember()"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>

</template>

<script>
import {mapActions, mapState} from 'vuex'
import Dialog from '@/components/Dialog'
import { can, isEmpty } from '@/plugins/supports'
import VuetifyMoney from 'vuetify-money'
// import Dialog from "@/components/Dialog.vue";

export default {
  name: 'Kasir',
  components: {
    Dialog,
    'delete-dialog': Dialog
  },
  props: {
    id: { type: [String, Number], required: true }
  },
  data () {
    return {

      toggle_none: null,
      menu2: false,
      cartDialog: false,
      itemSelect:{},

      rupiah_format: {
        locale: "pt-BR",
        prefix: "Rp.",
        suffix: "",
        length: 15,
        precision: 0
      },

      date:(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),

      cartCount:0,
      searchQuery: '',
      filterQuery: {
        search: null
      },
      booltmp: {
        fp: false,
        ft: false,
        loading: true
      },



      datas: [],
      cartTmp:{
        id:'',
        nama:'',
        harga:'',
        jumlah:'',
        total:'',
        satuan:'',
        catatan:'',
        komisi:[],
        servicer:[]
      },
      cart:{
        kasir:null,
        member: {
          id:null,
          nama:null,
          no:null,
        },
        item:[],
        subtotal:null,
        potongan:null,
        total:null,
        bayar:null,
        kembalian:null,
        status:null
      },

      search_member: {
        nomor_hp: null,
      },

      dataTypesSearchMember:{
        nomor_hp: 'string',
      },

      member: {
        id_member:null,
        nama:null,
        nomor_hp:null,
      },

      dialog_add_memeber : false,

      rules: {
        required: v => {
          v = isEmpty(v)
          return !v || 'Tidak Boleh Kosong'
        }
      },

      addmember: {
        nama:null,
        nomor_hp:null,
        jenis_kelamin:null,
        alamat:null,
      },
      addmember_type: {
        nama: 'string',
        nomor_hp: 'string',
        jenis_kelamin: 'string',
        alamat: 'string',
      },
      items: {
        // {{item_cols}}
        jenis_kelamin: ['Pria','Wanita'],
      },



      showDC: false,
      deleteId: '',
      dcMessages: '',
      dcProgress: false,
      dcdisabledNegativeBtn: false,
      dcdisabledPositiveBtn: false,
      dcNegativeBtn: () => { this.showDC = false },
      dcPositiveBtn: () => this._delete(true),

      loading:false,
    }
  },
  computed: {
    ...mapState(['user']),
    headerData () {
      return [
        { text: '', value: 'aksi' }
      ]
    },
    isClearSearch () {
      for (const key in this.filterQuery) {
        if (!isEmpty(this.filterQuery[key])) {
          return true
        }
      }
      return false
    }
  },
  watch: {
    options (a, b) {
      this._loadData(true)
    },
    dialog:function(newValue, old){
      if(!newValue){
        // Closing
        console.log("tutup")
      }
    }
  },
  mounted () {
    this._loadData(false) // loading data form server
    this.cart.kasir = this.user

  },

  methods: {
    ...mapActions(['getTransaksiCreate','addTransaksi','getPelangganByPhone','addPelanggan']),
    can,
    formatPrice(value) {
      let val = (value/1)
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    },
    onclikItem(item){
      console.log("tututp")
      this.cartTmp = {
        "id":item.id,
        "nama": item.nama_produk,
        "harga": item.harga,
        "jumlah":1,
        "total":0,
        "satuan":null,
        "catatan":null,
        "komisi":[],
        "servicer":[]
      }
      this.itemSelect = item
      this.cartDialog = true
    },

    addItem(){
      this.cartDialog = false
      var total = this.cartTmp.harga * this.cartTmp.jumlah
      this.cart.item.push({
        id_produk:this.cartTmp.id,
        nama:this.cartTmp.nama,
        harga:this.cartTmp.harga,
        qty:this.cartTmp.jumlah,
        total: total,
        satuan:this.cartTmp.satuan,
        catatan:this.cartTmp.catatan,
        komisi:this.cartTmp.komisi,
        servicer:this.cartTmp.servicer,
      })

      this.cart.subtotal = this.cart.subtotal + total

      this.cartCount++
    },

    getByPhone(){

      this.member = {}
      /* Initialize the form data */
      const formData = new FormData()

      /* Add the form data we need to submit */
      Object.keys(this.search_member).forEach(d => {
        const tmp = this.search_member[d]
        if (this.dataTypesSearchMember[d] !== 'json') {
          formData.append(d, tmp)
        } else {
          formData.append(d,
            new Blob([JSON.stringify(tmp)],
              {type: 'application/json'})
          )
        }
      })

      this.loading = true

      this.getPelangganByPhone(formData)
        .then((data)=>{

          setTimeout(() => {
            if (data.code === 1){
              this.loading = false
              this.member = data.value
            }else {
              this.loading = false
              this.addmember.nomor_hp = this.search_member.nomor_hp
              this.dialog_add_memeber = true
            }
          }, 1500)

      })
    },

    postAddMember () {
      /* Initialize the form data */
      const formData = new FormData()

      /* Add the form data we need to submit */
      Object.keys(this.addmember).forEach(d => {
        const tmp = this.addmember[d]
        if (this.addmember_type[d] !== 'json') {
          formData.append(d, tmp)
        } else {
          formData.append(d,
            new Blob([JSON.stringify(tmp)],
              { type: 'application/json' })
          )
        }
      })


      this.loading = true

      this.addPelanggan(formData).then((data) => {

        setTimeout(() => {
          this.loading = false
          if (data.code === 1){
            this.loading = false
            this.dialog_add_memeber = false
            this.addmember = {}
            this.member = data.value
          }
        }, 2000)
      })
    },

    remove_member(){
      this.member = {}
    },



    _create_transaksi(){
        this.addTransaksi({...this.cart})
          .then((data)=> {


          }
        )
    },


    _clearFilter () {
      this._loadData(true)
    },
    _loadData (abort) {
      if (this.datas.length === 0 || abort) {
        this.booltmp.loading = true
        this.getTransaksiCreate({ id: this.id,...this.options })
          .then((data) => {
            this.datas = data || []
            this.serverLength = data.total || 0
            this.booltmp.loading = false
          })
      } else {
        this.booltmp.loading = false
      }
    }
  }
}
</script>
<style v-slot:scoped>
.v-data-footer__icons-before,.v-data-footer__icons-after{
  display: none !important;
}
</style>

import { createApp } from 'vue'
import App from './App.vue'
import router from './route'
import 'bootstrap'

const app = createApp(App)
app.use(router)
app.mount('#app')

// データテーブルで使用
import './assets/primeVueCustom.scss'
import PrimeVue from 'primevue/config'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import ColumnGroup from 'primevue/columngroup'
import InputText from 'primevue/inputtext'
import InputNumber from 'primevue/inputnumber'
app.use(PrimeVue)
app.component('DataTable', DataTable)
app.component('Column', Column)
app.component('ColumnGroup', ColumnGroup)
app.component('InputText', InputText)
app.component('InputNumber', InputNumber)

// multi-select
import Multiselect from '@vueform/multiselect'
import './assets/multiselect.scss'
app.component('Multiselect', Multiselect)

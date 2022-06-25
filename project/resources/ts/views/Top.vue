<template>
  <div class="card">
    <div class="card-header">抽出条件</div>
    <div class="card-body">
      <div class="row mb-3">
        <label for="periodStartInput" class="form-label">期間</label>
        <div class="col-lg-3 col-sm-12">
          <input
            id="periodStartInput"
            v-model="condsRef.periodStart"
            type="date"
            class="form-control"
          />
        </div>
        <div class="col-lg-1 col-sm-12">から</div>
        <div class="col-lg-3 col-sm-12">
          <input
            id="periodStartInput"
            v-model="condsRef.periodEnd"
            type="date"
            class="form-control"
          />
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-3 col-sm-12">
          <label for="makerInput" class="form-label">メーカー</label>
          <Multiselect
            v-model="condsRef.maker"
            :options="makerNames"
            placeholder=""
            :filterReslts="true"
            :min-chars="1"
            :searchable="true"
          ></Multiselect>
        </div>
        <div class="col-lg-3 col-sm-12">
          <label for="typeInput" class="form-label">タイプ</label>
          <Multiselect
            v-model="condsRef.type"
            :options="typeNames"
            placeholder=""
            :filterReslts="true"
            :min-chars="1"
            :searchable="true"
          ></Multiselect>
        </div>
      </div>
      <a href="#" class="btn btn-primary" @click="clickSearch">検索</a>
    </div>
  </div>
  <div class="card mt-3">
    <DataTable
      v-model:filters="filters"
      :value="tiresRef"
      :paginator="true"
      class="p-datatable-customers"
      striped-rows
      :rows="10"
      data-key="id"
      :row-hover="true"
      filter-display="menu"
      :loading="loading"
      paginator-template="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
      :rows-per-page-options="[10, 25, 50]"
      current-page-report-template="{totalRecords} 件中 {first} から {last} まで表示"
      :global-filter-fields="['series', 'maker', 'brand', 'type', 'count']"
      responsive-layout="scroll"
    >
      <template #header>
        <div class="d-flex justify-content-between">
          <div />
          <span class="p-input-icon-left">
            <i class="pi pi-search" />
            <InputText
              v-model="filters['global'].value"
              placeholder="キーワードを入力して下さい。"
            />
          </span>
        </div>
      </template>
      <template #empty> データが存在しません。 </template>
      <template #loading> Loading data. Please wait. </template>
      <Column
        field="series"
        header="シリーズ"
        sortable
        style="min-width: 14rem"
      >
        <template #body="{ data }">
          {{ data.series }}
        </template>
        <template #filter="{ filterModel }">
          <InputText
            v-model="filterModel.value"
            type="text"
            class="p-column-filter"
            placeholder="Search by シリーズ"
          />
        </template>
      </Column>

      <Column field="maker" header="メーカー" sortable style="min-width: 14rem">
        <template #body="{ data }">
          {{ data.maker }}
        </template>
        <template #filter="{ filterModel }">
          <InputText
            v-model="filterModel.value"
            type="text"
            class="p-column-filter"
            placeholder="Search by メーカー"
          />
        </template>
      </Column>

      <Column field="brand" header="ブランド" sortable style="min-width: 14rem">
        <template #body="{ data }">
          {{ data.brand }}
        </template>
        <template #filter="{ filterModel }">
          <InputText
            v-model="filterModel.value"
            type="text"
            class="p-column-filter"
            placeholder="Search by ブランド"
          />
        </template>
      </Column>

      <Column field="type" header="タイプ" sortable style="min-width: 14rem">
        <template #body="{ data }">
          {{ data.type }}
        </template>
        <template #filter="{ filterModel }">
          <InputText
            v-model="filterModel.value"
            type="text"
            class="p-column-filter"
            placeholder="Search by タイプ"
          />
        </template>
      </Column>

      <Column
        field="count"
        header="レビュー数"
        sortable
        style="min-width: 14rem"
      >
        <template #body="{ data }">
          {{ data.count }}
        </template>
        <template #filter="{ filterModel }">
          <InputText
            v-model="filterModel.value"
            type="text"
            class="p-column-filter"
            placeholder="Search by レビュー数"
          />
        </template>
      </Column>
    </DataTable>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, ref } from 'vue'
import { TiresApi, Tire } from '@/openapi'
import { apiConfig } from '@/libs/openapi'
import { FilterMatchMode, FilterOperator } from 'primevue/api'

export default defineComponent({
  setup() {
    // 入力値の状態
    const condsRef = reactive({
      periodStart: '',
      periodEnd: '',
      maker: '',
      type: '',
    })

    const tireapi = new TiresApi(apiConfig)
    // タイヤ一覧の取得
    const tiresRef: Tire[] = reactive([])
    // メーカープルダウンのオプション
    let makerNames: { [key: string]: string } = reactive({ '': '' })
    // タイププルダウンのオプション
    let typeNames: { [key: string]: string } = reactive({ '': '' })
    tireapi.tiresGet({}).then((value) => {
      tiresRef.splice(0, tiresRef.length, ...value)
      Array.from(new Set(tiresRef.map((item) => item.maker))).forEach(
        (item) => {
          makerNames[item] = item
        }
      )
      Array.from(new Set(tiresRef.map((item) => item.type))).forEach((item) => {
        typeNames[item] = item
      })
    })

    // データテーブル内の絞り込み設定
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      series: {
        operator: FilterOperator.AND,
        constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }],
      },
      maker: {
        operator: FilterOperator.AND,
        constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }],
      },
      brand: {
        operator: FilterOperator.AND,
        constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }],
      },
      type: {
        operator: FilterOperator.AND,
        constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }],
      },
      count: {
        operator: FilterOperator.AND,
        constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }],
      },
    })

    /**
     * 「検索」ボタン押下
     */
    const clickSearch = () => {
      tireapi
        .tiresGet({
          periodStart: condsRef.periodStart,
          periodEnd: condsRef.periodEnd,
          maker: condsRef.maker,
          type: condsRef.type,
        })
        .then((value) => {
          tiresRef.splice(0, tiresRef.length, ...value)
        })
      return
    }

    return { condsRef, tiresRef, makerNames, typeNames, filters, clickSearch }
  },
})
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="me-auto">
        <div class="row">
          <div class="col">
            <a class="navbar-brand pb-0" href="#">GVisual</a>
          </div>
        </div>
        <div class="row">
          <div class="col text-light" style="font-size: 8px">説明文</div>
        </div>
      </div>
      <div>
        <img src="/lp/img/flags/Japan.png" width="24" height="24" />
      </div>
      <div>
        <img src="/lp/img/flags/United-States.png" />
      </div>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <div class="container mt-3">
    <transition name="fade">
      <router-view />
    </transition>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  setup() {
    return {}
  },
})
</script>

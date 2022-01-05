<template>
  <div>
    <!-- {{ message }} -->
    <!-- <div class="cards-table">
      <div v-for="data in datas" v-bind:key="data['id']">
        <artCard :data="data" />
      </div>
    </div> -->
    <topBar />

    <div id="container">
      <!-- side nav bar -->
      <sideNav />

      <!-- area that will display tables, depending on which link it is at-->
      <div id="mainSide">
        <!-- @yield('content') -->
        hello
      </div>
    </div>
  </div>
</template>

<script>
// const default_layout = "default";

import artCard from "../components/artCard.vue";
import sideNav from "../components/sideNav.vue";
import topBar from "../components/topBar.vue";
export default {
  computed: {},
  data() {
    return {
      message: "This is a message from app.vue",
    };
  },
  components: { topBar, sideNav, artCard },
  props: ["datas"],
};
</script>

<style >
</style>
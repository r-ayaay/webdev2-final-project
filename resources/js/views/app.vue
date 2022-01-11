<template>
  <div>
    <!-- {{ message }} -->

    <topBar :username="username" />

    <div id="container">
      <!-- side nav bar -->
      <sideBar />

      <!-- area that will display tables, depending on which link it is at-->
      <div id="mainSide">
        <router-view @deleted="handleDelete" :key="componentKey"></router-view>

        <!-- this is for GalleryTable -->
        <!-- work on making the image work -->
        <!-- <div v-for="data in gallerydata" v-bind:key="data['id']">
          <galleryCard :data="data" />
        </div> -->

        <!-- this is for ExhibitTable -->
      </div>
    </div>
  </div>
</template>

<script>
import topBar from "../components/topBar.vue";
import sideBar from "../components/sideBar.vue";

export default {
  computed: {},
  data() {
    return {
      message: "This is a message from app.vue",
      componentKey: 0,
    };
  },
  components: { topBar, sideBar },
  props: ["userID", "username", "isAdmin"],
  methods: {
    handleDelete() {
      this.componentKey += 1;
    },
  },
};
</script>

<style >
</style>
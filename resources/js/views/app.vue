<template>
  <div>
    <!-- {{ message }} -->

    <topBar />

    <div id="container">
      <!-- side nav bar -->
      <sideBar />

      <!-- area that will display tables, depending on which link it is at-->
      <div id="mainSide">
        <!-- <router-view></router-view> -->

        <!-- this is for GalleryTable -->
        <!-- work on making the image work -->
        <!-- <div v-for="data in gallerydata" v-bind:key="data['id']">
          <galleryCard :data="data" />
        </div> -->

        <!-- this is for ArtTable -->
        <!-- <div class="cards-table">
          <div v-for="data in artdata" v-bind:key="data['id']">
            <artCard :data="data" />
          </div>
        </div> -->

        <!-- this is for PoetryTable -->
        <!-- <div class="cards-table">
          <div v-for="data in poetrydata" v-bind:key="data['id']">
              <poetryCard :data="data" />
          </div>
        </div> -->

        <!-- this is for MusicTable -->
        <div class="cards-table">
          <div v-for="data in musicdata" v-bind:key="data['id']">
              <musicCard :data="data" />
          </div>
        </div>

        <!-- this is for ExhibitTable -->
      </div>
    </div>
  </div>
</template>

<script>
import topBar from "../components/topBar.vue";
import sideBar from "../components/sideBar.vue";

import artCard from "../components/cards/artCard.vue";
import galleryCard from "../components/cards/galleryCard.vue";
import poetryCard from "../components/cards/poetryCard.vue";
import musicCard from "../components/cards/musicCard.vue";


export default {
  computed: {},
  data() {
    return {
      message: "This is a message from app.vue",
    };
  },
  components: { topBar, sideBar, artCard, galleryCard, poetryCard, musicCard },
  props: ["artdata", "gallerydata", "poetrydata", "musicdata"],
};
</script>

<style >
</style>
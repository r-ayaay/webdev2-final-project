<template>
  <div id="sidenav">
    <h2 id="label">Exhibits</h2>
    <ul id="nav">
      <router-link
        v-for="data in gallerydata"
        v-bind:key="data['id']"
        to="/gallery"
      >
        <li class="subTab">{{ data["title"] }}</li>
      </router-link>
    </ul>
  </div>
</template>
<script>
import axios from "axios";

const url = "/api/getexhibit/";

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      gallerydata: null,
    };
  },
  mounted() {
    axios.get(url).then((response) => (this.gallerydata = response.data));
  },
};
</script>

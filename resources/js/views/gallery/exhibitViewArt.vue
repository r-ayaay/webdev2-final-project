 <template>
  <div id="exhibit_container">
    <div id="container">
      <sideBarGuest />
      <div id="mainSide">
        <div class="tab">
          <router-link class="tablinks active" :to="urlart"> Arts </router-link>
          <router-link class="tablinks" :to="urlpoetry"> Poetries </router-link>
          <router-link class="tablinks" :to="urlmusic"> Music </router-link>
        </div>

        <div id="Arts" style="display: block" class="tabcontent">
          <div class="cards-table" v-if="artcount > 0">
            <artCard
              v-for="data in artdata"
              v-bind:key="data['id']"
              :data="data"
            />
          </div>
          <div class="cards-table" v-else>
            <h2>There are artworks no in this exhibit</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import sideBarGuest from "../../components/sideBarGuest.vue";

import artCard from "../../components/cards/artCard.vue";

export default {
  computed: {},
  props: [],
  components: { sideBarGuest, artCard },
  data() {
    return {
      artdata: "",
      artcount: "",
      url: "/api/getexhibit/" + this.$route.params.id + "/art",
      urlart: "/gallery/" + this.$route.params.id + "/art",
      urlpoetry: "/gallery/" + this.$route.params.id + "/poetry",
      urlmusic: "/gallery/" + this.$route.params.id + "/music",
    };
  },
  mounted() {
    axios.get(this.url).then((response) => (this.artdata = response.data));
    this.artcount = this.artdata.length;
  },
  methods: {},
};
</script>
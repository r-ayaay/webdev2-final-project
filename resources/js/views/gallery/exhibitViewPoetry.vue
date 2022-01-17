 <template>
  <div id="exhibit_container">
    <div id="container">
      <sideBarGuest />
      <div id="mainSide">
        <div class="tab">
          <router-link class="tablinks" :to="urlart"> Arts </router-link>
          <router-link class="tablinks active" :to="urlpoetry">
            Poetries
          </router-link>
          <router-link class="tablinks" :to="urlmusic"> Music </router-link>
        </div>

        <div id="Poetry" class="tabcontent">
          <div class="cards-table" v-if="poetrycount > 0">
            <poetryCard
              v-for="data in poetrydata"
              v-bind:key="data['id']"
              :data="data"
            />
          </div>
          <div class="cards-table" v-else>
            <h2>There are no poetries in this exhibit</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import sideBarGuest from "../../components/sideBarGuest.vue";
import poetryCard from "../../components/cards/poetryCard.vue";

export default {
  computed: {},
  props: [],
  components: { sideBarGuest, poetryCard },
  data() {
    return {
      poetrydata: "",
      poetrycount: "",
      url: "/api/getexhibit/" + this.$route.params.id + "/poetry",
      urlart: "/gallery/" + this.$route.params.id + "/art",
      urlpoetry: "/gallery/" + this.$route.params.id + "/poetry",
      urlmusic: "/gallery/" + this.$route.params.id + "/music",
    };
  },
  mounted() {
    axios.get(this.url).then((response) => (this.poetrydata = response.data));
    this.poetrycount = this.poetrydata.length;
  },
  methods: {},
};
</script>
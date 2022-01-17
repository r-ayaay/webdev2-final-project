 <template>
  <div id="exhibit_container">
    <div id="container">
      <sideBarGuest />
      <div id="mainSide">
        <div class="tab">
          <router-link class="tablinks" :to="urlart"> Arts </router-link>
          <router-link class="tablinks" :to="urlpoetry"> Poetries </router-link>
          <router-link class="tablinks active" :to="urlmusic">
            Music
          </router-link>
        </div>

        <div id="Music" class="tabcontent">
          <div class="cards-table" v-if="musiccount > 0">
            <musicCard
              v-for="data in musicdata"
              v-bind:key="data['id']"
              :data="data"
            />
          </div>
          <div class="cards-table" v-else>
            <h2>There are no music in this exhibit</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import sideBarGuest from "../../components/sideBarGuest.vue";
import musicCard from "../../components/cards/musicCard.vue";

export default {
  computed: {},
  props: [],
  components: { sideBarGuest, musicCard },
  data() {
    return {
      musicdata: "",
      musiccount: "",
      url: "/api/getexhibit/" + this.$route.params.id + "/music",
      urlart: "/gallery/" + this.$route.params.id + "/art",
      urlpoetry: "/gallery/" + this.$route.params.id + "/poetry",
      urlmusic: "/gallery/" + this.$route.params.id + "/music",
    };
  },
  mounted() {
    axios.get(this.url).then((response) => (this.musicdata = response.data));
    this.musiccount = this.musicdata.length;
  },
  methods: {},
};
</script>
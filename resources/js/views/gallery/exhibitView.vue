 <template>
  <div id="exhibit_container">
    <div id="container">
      <sideBarGuest />
      <div id="mainSide">
        <div class="tab">
          <router-link class="tablinks active" :to="urlart">
            Arts
          </router-link>
          <router-link class="tablinks" :to="urlpoetry">
            Poetries
          </router-link>
          <router-link class="tablinks" :to="urlmusic">
            Music
          </router-link>
        </div>

        <!-- <div id="Arts" style="display: block" class="tabcontent">
          <div class="cards-table">
            <artCard
              v-for="data in artdata"
              v-bind:key="data['id']"
              :data="data"
            />
          </div>
        </div> -->

        <!-- <div id="Poetry" style="display: none" class="tabcontent">
          <poetryCard
            v-for="data in poetrydata"
            v-bind:key="data['id']"
            :data="data"
          />
        </div> -->

        <!-- <div id="Music" style="display: none" class="tabcontent">
          <musicCard
            v-for="data in musicdata"
            v-bind:key="data['id']"
            :data="data"
          /> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import sideBarGuest from "../../components/sideBarGuest.vue";

import artCard from "../../components/cards/artCard.vue";
import poetryCard from "../../components/cards/poetryCard.vue";
import musicCard from "../../components/cards/musicCard.vue";

const url = "/api/getexhibit/";

export default {
  computed: {},
  props: [],
  components: { sideBarGuest, artCard, poetryCard, musicCard },
  data() {
    return {
      gallerydata: null,
      urlart: "/gallery/" + this.$route.params.id + "/art",
      urlpoetry: "/gallery/",
      urlmusic: "/gallery/",
    };
  },
  mounted() {
    axios.get(url).then((response) => (this.gallerydata = response.data));
    console.log(this.$route.params.id);
  },
  methods: {},
};
</script>
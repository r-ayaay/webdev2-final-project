 <template>
  <div id="exhibit_container">
    <div id="mainSide">
      <div class="exhibit-grid">
        <div v-for="data in gallerydata" v-bind:key="data['id']">
          <galleryCard :data="data" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import galleryCard from "../../components/cards/galleryCard.vue";

const url = "/api/getexhibit/";

export default {
  computed: {},
  props: [],
  components: { galleryCard },
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
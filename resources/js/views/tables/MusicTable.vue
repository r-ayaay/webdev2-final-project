 <template>
  <div class="cards-table">
    <div v-for="data in musicdata" v-bind:key="data['id']">
      <musicCard :data="data" @deleted="handleDelete" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import musicCard from "../../components/cards/musicCard.vue";

const url = "/api/getmusic/";
export default {
  computed: {},
  props: [],
  components: { musicCard },
  data() {
    return {
      musicdata: null,
    };
  },
  mounted() {
    axios.get(url).then((response) => (this.musicdata = response.data));
  },
  methods: {
    handleDelete() {
      this.$emit("deleted");
    },
  },
};
</script>
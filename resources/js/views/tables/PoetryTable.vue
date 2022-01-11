 <template>
  <div>
    <router-link class="tableBtn" :to="{ name: 'newPoetry' }">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="27"
        height="27"
        fill="currentColor"
        class="bi bi-plus-square"
        viewBox="0 0 16 16"
      >
        <path
          d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
        />
        <path
          d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
        />
      </svg>
    </router-link>
    <div class="cards-table">
      <div v-for="(data, index) in poetrydata" :key="index">
        <poetryCard :data="data" @deleted="handleDelete" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import poetryCard from "../../components/cards/poetryCard.vue";

const url = "/api/getpoetry/";
export default {
  computed: {},
  props: [],
  components: { poetryCard },
  data() {
    return {
      poetrydata: null,
    };
  },
  mounted() {
    axios.get(url).then((response) => (this.poetrydata = response.data));
  },
  methods: {
    handleDelete() {
      this.$emit("deleted");
    },
  },
};
</script>
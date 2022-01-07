 <template>
  <div class="cards-table">
          <div v-for="data in artdata" v-bind:key="data['id']">
            <artCard :data="data" />
          </div>
          </div>
</template>

<script>
import Axios from 'axios';
import artCard from "../../components/cards/artCard.vue";

const url = '/api/getart/';
// Axios.defaults.headers.common['Authorization'] = `Bearer ${params.token}`; // if you are using some token authentication

export default {
  computed: {},
  props: [],
  components: { artCard },
  data(){
    return {
      artdata: null
    }
  },
  mounted () {
    axios
      .get(url)
      .then(response => (this.artdata = response.data))
  }
};
</script>
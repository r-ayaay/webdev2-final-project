 <template>
  <div>
    <router-link class="tableBtn" :to="{ name: 'newExhibit' }">
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
    <h1>Exhibit Table</h1>
    <table>
      
    <thead>
        
        <tr style="text-align: center">
            <th>Status</th>
            <th>Title</th>
            <th>Theme</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
            <tr v-for="data in exhibitdata" v-bind:key="data['id']">
                <td>{{ data["status"] }}</td>
                <td>{{ data["title"] }}</td>
                <td>{{ data["theme"] }}</td>
                <td>{{ data["description"] }}</td>
                <td>{{ data["startDate"] }}</td>
                <td>{{ data["endDate"] }}</td>
                <td>
                    <form action="#" >
                        <input class="tablerowBtn" type="submit" value="Edit">
                    </form>  
                    </br>
                    <form action="#" @submit.prevent="deleteexhibit(data['id'])">
                      
                    <input class="tablerowBtn" type="submit" value="Delete">
                    </form>  
                </td>
            </tr>
    </tbody>
</table>
  </div>
</template>

<script>
import axios from "axios";

const url = "/api/getexhibit/";
// Axios.defaults.headers.common['Authorization'] = `Bearer ${params.token}`; // if you are using some token authentication

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      exhibitdata: null,
    };
  },
  mounted() {
    axios.get(url).then((response) => (this.exhibitdata = response.data));
  },
  methods: {
    deleteexhibit(id) {
      axios.post("/deleteexhibit/" + id);
      this.$emit("deleted");
    },
  },
};
</script>
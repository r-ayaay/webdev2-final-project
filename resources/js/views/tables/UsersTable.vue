 <template>
  <div>
    <h1>Users Table</h1>
    <table>
      <thead>
        <tr style="text-align: center">
          <th>User ID</th>
          <th>Name</th>
          <th>Email</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="data in usersdata" v-bind:key="data['id']">
          <td>{{ data["id"] }}</td>
          <td>{{ data["name"] }}</td>
          <td>{{ data["email"] }}</td>

          <td>change to Admin/User</td>
          <td>ban</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

const url = "/api/getusers/";
// Axios.defaults.headers.common['Authorization'] = `Bearer ${params.token}`; // if you are using some token authentication

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      usersdata: null,
    };
  },
  mounted() {
    axios.get(url).then((response) => (this.usersdata = response.data));
  },
  methods: {
    changeUserBanStatus(id) {
      axios.post("/changeuserbanstatus/" + id);
      this.$emit("deleted");
    },
  },
};
</script>
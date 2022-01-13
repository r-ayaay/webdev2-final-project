<template>
  <div class="card">
    <h3 class="title">{{ data["title"] }}</h3>

    <img
      :src="'../storage/music/' + data['photo']"
      alt="music Photo"
      style="width: 100%"
      id="img"
    />
    <div></div>
    <audio controls :src="'../storage/music/' + data['music']" />

    <div>
      <form action="#" @submit.prevent="deletemusic">
        <input class="tablerowBtn" type="submit" value="Delete" />
      </form>
    </div>
    made by: {{ username }}
  </div>
</template>
<script>
import axios from "axios";

export default {
  computed: {},
  props: ["data"],
  methods: {
    deletemusic() {
      axios.post(this.url);
      this.$emit("deleted");
    },
  },
  data() {
    return {
      url: "/deletemusic/" + this.data["id"],
      username: "",
    };
  },
  mounted() {
    axios
      .get("/api/getusername/" + this.data["user_id"])
      .then((response) => (this.username = response.data));
  },
};
</script>

<template>
  <div class="poetry-card">
    <div class="title">"{{ data["title"] }}"</div>

    <div
      style="background-color: #1e3c86; overflow-y: scroll; padding: 15px 25px"
    >
      {{ data["body"] }}
    </div>

    <div>
      <hr />
      <div class="theme-title">
        {{ data["theme"] }}
      </div>
    </div>

    <div>
      <form action="#" method="post">
        <input class="tablerowBtn" type="submit" value="Edit" />
      </form>
      <form action="#" @submit.prevent="deletepoetry">
        <input class="tablerowBtn" type="submit" value="Delete" />
      </form>
    </div>
    made by: {{ username }}
  </div>
</template>

<script>
export default {
  computed: {},
  props: ["data"],
  methods: {
    deletepoetry() {
      axios.post(this.url).then(() => {
        this.$emit("deleted");
      });
    },
  },
  data() {
    return {
      url: "/deletepoetry/" + this.data["id"],
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

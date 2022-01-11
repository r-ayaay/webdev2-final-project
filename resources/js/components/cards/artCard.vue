<template>
  <div class="card">
    <div class="title">"{{ data["title"] }}"</div>
    <img
      :src="'../storage/art/' + data['photo']"
      alt="Art Photo"
      style="width: 100%"
      id="img"
    />

    <div>
      <div class="theme-title">
        {{ data["theme"] }}
      </div>
      <hr />
    </div>

    <div style="padding: 0 10px">
      <div class="description">
        {{ data["description"] }}
      </div>
    </div>

    <div>
      <form action="#" @submit.prevent="deleteart">
        <input class="tablerowBtn" type="submit" value="Delete" />
      </form>
    </div>
  </div>
</template>
<script>
export default {
  computed: {},
  props: ["data"],
  methods: {
    deleteart() {
      axios.post(this.url);
      this.$emit("deleted");
    },
  },
  data() {
    return {
      url: "/deleteart/" + this.data["id"],
    };
  },
};
</script>

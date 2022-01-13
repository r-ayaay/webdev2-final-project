<template>
  <router-link :to="url">
    <h2>{{ data["title"] }}</h2>
    <div class="exhibit-card">
      <div class="exhibit-details">
        <span>Artist: </span> <span>{{ data["user_id"] }}</span>
        <span>Theme: </span> <span>{{ data["theme"] }}</span>
        <span>Description: </span> <span>{{ data["description"] }}</span>
        <span>Duration: </span>
        <span>{{ data["startDate"] }} - {{ data["endDate"] }}</span>
      </div>
    </div>
  </router-link>
</template>
<script>
export default {
  computed: {},
  props: ["data"],
  mounted() {},
  data() {
    return {
      url: "/gallery/" + this.data["id"] + "/art",
    };
  },
};
</script>

<template>
  <div>
    {{ message }}
    <div v-for="data in datas" v-bind:key="data['id']">
      <artCard :data="data" />
    </div>
  </div>
</template>
<script>
const default_layout = "default";
import ExampleComponent from "../components/ExampleComponent.vue";
import artCard from "../components/artCard.vue";
export default {
  computed: {},
  data() {
    return {
      message: "Bruh moment",
    };
  },
  components: { ExampleComponent, artCard },
  props: ["datas"],
};
</script>

<style >
</style>
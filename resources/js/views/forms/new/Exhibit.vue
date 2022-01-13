<template>
  <div>
    <span id="info"></span>
    <form action="#" autocomplete="off" @submit.prevent="addexhibit">
      <h1>EXHIBIT FORM</h1>
      <label for="startDate">Starting Date</label>
      <input type="date" name="startDate" v-model="form.startDate" required />

      <label for="endDate">Ending Date</label>
      <input type="date" name="endDate" v-model="form.endDate" required />

      <label for="title">Exhibit Title</label>
      <input type="text" name="title" v-model="form.title" />

      <label for="theme">Theme</label>
      <input type="text" name="theme" v-model="form.theme" required />

      <label for="description">Description</label>
      <textarea
        name="description"
        style="background-color: #2c3454"
        v-model="form.description"
        cols="30"
        rows="5"
      ></textarea>
      <button id="submitBtn"><h3>SUBMIT</h3></button>
    </form>
  </div>
</template>

<script>
import Form from "vform";
const url = "/addexhibit";

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      form: new Form({
        title: "",
        description: "",
        startDate: "",
        endDate: "",
        theme: "",
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
      }),
    };
  },
  mounted() {},
  methods: {
    addexhibit() {
      this.form.post(url).then((response) => {
        var attr = document.getElementById("info");
        attr.innerHTML = response.data.message;

        this.form.reset();
      });
    },
  },
};
</script>

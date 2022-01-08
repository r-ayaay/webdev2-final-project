<template>
  <div>
    <span id="info"></span>
    <form action="#" autocomplete="off" @submit.prevent="addpoetry">
      <input type="hidden" name="_token" v-bind:value="form.csrf" />
      <h1>POETRY FORM</h1>

      <label for="title">Poetry Title</label>
      <input type="text" name="title" required v-model="form.title" />

      <label for="body">Body</label>
      <textarea
        style="font-size: 2vh; background-color: #2c3454; padding: 15px 20px"
        name="body"
        cols="30"
        rows="10"
        v-model="form.body"
      ></textarea>

      <label for="theme">Theme</label>
      <input type="text" name="theme" required v-model="form.theme" />
      <button id="submitBtn"><h3>SUBMIT</h3></button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
const url = "/addpoetry";
// Axios.defaults.headers.common['Authorization'] = `Bearer ${params.token}`; // if you are using some token authentication

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      form: new Form({
        title: "",
        body: "",
        theme: "",
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
      }),
    };
  },
  mounted() {},
  methods: {
    addpoetry() {
      this.form.post(url).then((response) => {
        var attr = document.getElementById("info");
        attr.innerHTML = response.data.message;

        this.form.reset();
      });
    },
  },
};
</script>

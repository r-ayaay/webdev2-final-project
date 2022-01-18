<template>
  <div>
    <span id="info"></span>
    <form action="#" autocomplete="off" @submit.prevent="updatepoetry">
      <input type="hidden" name="_token" v-bind:value="form.csrf" />
      <h1>UPDATE POETRY FOR "{{newdata[0].title}}"</h1>

      <label for="title">Poetry Title</label>
      <input type="text" name="title" :placeholder="newdata[0].title" v-model="form.title" />

      <label for="body">Body</label>
      <textarea
        style="font-size: 2vh; background-color: #2c3454; padding: 15px 20px"
        name="body"
        cols="30"
        rows="10"
        :placeholder="newdata[0].body"
        v-model="form.body"
      ></textarea>

      <label for="theme">Theme</label>
      <input type="text" name="theme" :placeholder="newdata[0].theme" v-model="form.theme" />
      <button id="submitBtn"><h3>SUBMIT</h3></button>
      <button type="button" id="submitBtn" v-on:click="cancelEdit"><h3>CANCEL</h3></button>
    </form>
  </div>
</template>

<script>
import Form from "vform";
const url = "/update/poetry";

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      form: new Form({
        id: "",
        title: "",
        body: "",
        theme: "",
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
      }),
      newdata: null
    };
  },
  mounted() {
    axios.get("/edit/getpoetry/" + this.$route.params.id)
      .then((response) => (
        this.newdata = response.data
      ))
  },
  methods: {
    updatepoetry() {

      const data = new FormData();

      data.append("id", this.newdata[0].id);

      data.append("title", (this.form.title == "") ? this.newdata[0].title : this.form.title);
      data.append("body", (this.form.body == "") ? this.newdata[0].body : this.form.body);
      data.append("theme", (this.form.theme == "") ? this.newdata[0].theme : this.form.theme);

      axios
        .post(url, data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          var attr = document.getElementById("info");
          attr.innerHTML = response.data.message;
          console.log(response.data.message);
          this.form.reset();
        });
        window.location.replace("/vue/Poetry");
      },
      
    cancelEdit() {
      window.location.replace("/vue/Poetry");
    },
  },
};
</script>

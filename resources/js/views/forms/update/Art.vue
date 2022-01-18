 <template>
  <div>
    <span id="info"></span>
    <form action="#" autocomplete="off" @submit.prevent="updateart">
      <h2>UPDATE ART INFORMATION FOR "{{ newdata[0].title }}"</h2>
      <!-- place user id variable in value-->
      <input type="hidden" name="user_id" value="" />
      <h1>{{ newdata[0].photo }}</h1>
      <div class="fileDiv">
        <div id="img-prev">
          <img
            :src="'../../../storage/art/' + newdata[0].photo"
            alt="Art Photo"
            style="width: 100%"
            id="img"
          />
        </div>
        <input
          type="file"
          accept="image/*"
          id="choose-file"
          name="photo"
          @change="onImageChange"
        />
        <!-- <div class="fileBtn" onClick="fileup()">Choose Photo</div> -->
      </div>

      <label for="title">Art Title</label>
      <input type="text" name="title" v-model="form.title" />

      <label for="description">Description</label>
      <input type="text" name="description" v-model="form.description" />

      <label for="theme">Theme</label>
      <input type="text" name="theme" v-model="form.theme" />

      <button id="submitBtn"><h3>SUBMIT</h3></button>
      <button type="button" id="submitBtn" v-on:click="cancelEdit">
        <h3>CANCEL</h3>
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
const url = "/update/art";

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      form: new Form({
        title: "",
        description: "",
        theme: "",
        photo: "",
      }),
      newdata: null,
    };
  },
  mounted() {
    axios
      .get("/api/edit/getart/" + this.$route.params.id)
      .then((response) => (this.newdata = response.data));
      
  },
  methods: {
    onImageChange(e) {
      this.form.photo = e.target.files[0];
    },

    cancelEdit() {
      window.location.replace("/vue/Art");
    },

    updateart() {
      const data = new FormData();
      data.append("id", this.newdata[0].id);
      

      data.append("title", (this.form.title == "") ? this.newdata[0].title : this.form.title);
      data.append("description", (this.form.description == "") ? this.newdata[0].description : this.form.description);
      data.append("theme", (this.form.theme == "") ? this.newdata[0].theme : this.form.theme);
      data.append("photo", (this.form.photo == "") ? this.newdata[0].photo : this.form.photo);

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
        window.location.replace("/vue/Art");
    },
  },
};
</script>
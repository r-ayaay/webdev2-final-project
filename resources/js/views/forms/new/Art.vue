 <template>
  <div>
    <span id="info"></span>
    <form action="#" autocomplete="off" @submit.prevent="addart">
      <h1>ART FORM</h1>
      <!-- place user id variable in value-->
      <input type="hidden" name="user_id" value="" />

      <div class="fileDiv">
        <div id="img-prev">
          <p>No File Chosen</p>
        </div>
        <input
          type="file"
          accept="image/*"
          id="choose-file"
          name="photo"
          required
          @change="onImageChange"
        />
        <!-- <div class="fileBtn" onClick="fileup()">Choose Photo</div> -->
      </div>

      <label for="title">Art Title</label>
      <input type="text" name="title" required v-model="form.title" />

      <label for="description">Description</label>
      <input
        type="text"
        name="description"
        required
        v-model="form.description"
      />

      <label for="theme">Theme</label>
      <input type="text" name="theme" required v-model="form.theme" />

      <button id="submitBtn"><h3>SUBMIT</h3></button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
const url = "/addart";

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
    };
  },
  mounted() {},
  methods: {
    onImageChange(e) {
      this.form.photo = e.target.files[0];
    },
    addart() {
      const data = new FormData();
      data.append("title", this.form.title);
      data.append("description", this.form.description);
      data.append("theme", this.form.theme);
      data.append("photo", this.form.photo);
      // this.form
      //   .post(url, {
      //     headers: {
      //       "Content-Type": "multipart/form-data",
      //     },
      //   })
      //   .then((response) => {
      //     var attr = document.getElementById("info");
      //     attr.innerHTML = response.data.message;
      //     console.log(response.data.message);
      //     this.form.reset();
      //   });
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
    },
  },
};
</script>
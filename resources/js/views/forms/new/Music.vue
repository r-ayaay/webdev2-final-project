 <template>
  <div>
    <span id="info"></span>
    <form action="#" autocomplete="off" @submit.prevent="addmusic">
      <h1>MUSIC FORM</h1>

      <label for="title">Song Name</label>

      <input type="text" name="title" v-model="form.title" required />

      <label for="genre">Genre</label>
      <input type="text" name="genre" v-model="form.genre" required />

      <label for="music">Music</label>
      <input type="file" name="music" @change="onMusicChange" required />

      <div class="fileDiv">
        <div id="img-prev">
          <p>No File Chosen</p>
        </div>
        <input
          type="file"
          @change="onImageChange"
          accept="image/*"
          id="choose-file"
          name="photo"
          required
        />
        <!-- <div class="fileBtn"  onClick="fileup()">Choose Thumbnail</div> -->
      </div>

      <button id="submitBtn">
        <h3>SUBMIT</h3>
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
const url = "/addmusic";

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      form: new Form({
        title: "",
        genre: "",
        music: "",
        photo: "",
      }),
    };
  },
  mounted() {},
  methods: {
    onImageChange(e) {
      this.form.photo = e.target.files[0];
    },
    onMusicChange(e) {
      this.form.music = e.target.files[0];
    },
    addmusic() {
      const data = new FormData();
      data.append("title", this.form.title);
      data.append("genre", this.form.genre);
      data.append("music", this.form.music);
      data.append("photo", this.form.photo);
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
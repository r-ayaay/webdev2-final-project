 <template>
  <div>
    <span id="info"></span>
    <form action="#" autocomplete="off" @submit.prevent="updatemusic">
      <h1>UPDATE MUSIC INFORMATION FOR "{{musicdata[0].title}}"  {{musicdata[0].id}}</h1>

      <label for="title">Song Name</label>

      <input type="text" name="title" v-model="form.title" :placeholder="musicdata[0].title" />

      <label for="genre">Genre</label>
      <input type="text" name="genre" v-model="form.genre" :placeholder="musicdata[0].genre" />

      <label for="music">Music</label>
      <input type="file" name="music" @change="onMusicChange"  />

      <div class="fileDiv">
        <div id="img-prev">
          <img
            :src="'../../../storage/music/' + musicdata[0].photo"
            alt="music Photo"
            style="width: 100%"
            id="img"
          />
        </div>
        <input
          type="file"
          @change="onImageChange"
          accept="image/*"
          id="choose-file"
          name="photo"
          
        />
        <!-- <div class="fileBtn"  onClick="fileup()">Choose Thumbnail</div> -->
      </div>

      <button id="submitBtn">
        <h3>SUBMIT</h3>
      </button>
      <button type="button" id="submitBtn" v-on:click="cancelEdit">
        <h3>CANCEL</h3>
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
const url = "/update/music";

export default {
  computed: {},
  props: [],
  components: {},
  data() {
    return {
      form: new Form({
        id: "",
        title: "",
        genre: "",
        music: "",
        photo: "",
      }),
      musicdata: null
    };
  },
  mounted() {
    axios
      .get("/api/edit/Music/" + this.$route.params.id)
      .then((response) => (
        this.musicdata = response.data
      ))
  },
  methods: {
    onImageChange(e) {
      this.form.photo = e.target.files[0];
    },
    onMusicChange(e) {
      this.form.music = e.target.files[0];
    },
    cancelEdit() {
      window.location.replace("/vue/Music");
    },
    updatemusic() {
      const data = new FormData();
      data.append("id", this.musicdata[0].id);
      data.append("title", (this.form.title == "") ? this.musicdata[0].title : this.form.title);
      data.append("genre", (this.form.genre == "") ? this.musicdata[0].genre : this.form.genre);
      data.append("music", (this.form.music == "") ? this.musicdata[0].music : this.form.music);
      data.append("photo", (this.form.photo == "") ? this.musicdata[0].photo : this.form.photo);
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
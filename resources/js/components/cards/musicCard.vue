<template>
  <div class="card">
    <h3>{{ data["title"] }}</h3>

    <img
      :src="'../storage/music/' + data['photo']"
      alt="music Photo"
      style="width: 100%"
      id="img"
    />
    <div></div>
    <audio controls :src="'../storage/music/' + data['music']" />

    <div>
      <!-- <form action="{{route('music.destroy', $music->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE"> -->
      <form action="#" @submit.prevent="deletemusic">
        <input class="tablerowBtn" type="submit" value="Delete" />
      </form>
      <!-- </form>   -->
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  computed: {},
  props: ["data"],
  methods: {
    deletemusic() {
      axios.post(this.url);
      this.$emit("deleted");
    },
  },
  data() {
    return {
      url: "/deletemusic/" + this.data["id"],
    };
  },
};
</script>

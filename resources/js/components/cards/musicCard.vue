<template>
  <div class="card">
                <h3>{{ data["title"] }}</h3>
                <img src="" alt="music Photo" style="width:100%" id="img">
                <!-- <img src="{{asset('storage/music/'.$music->photo)}}" onclick="onClick(this)" alt="music Photo" style="width:100%" id="img"> -->
                <div></div>
                <!-- <audio controls src="{{asset('storage/music/'.$music->music)}}"></audio> -->
                <audio controls src=""></audio>
                <div>
                    <!-- <form action="{{route('music.destroy', $music->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE"> -->
                        <form>
                        <input class="tablerowBtn" type="submit" value="Delete">
                        </form>
                    <!-- </form>   -->
                </div>
            </div>
</template>
<script>
export default {
  computed: {},
  props: ["data"],
};
</script>

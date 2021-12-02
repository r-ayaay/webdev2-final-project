<template>
  <div class="card">
    <div class="title">"{{ data["title"] }}"</div>
    <!-- <img
      src="{{asset('storage/art/'.$data.photo)}}"
      onclick="onClick(this)"
      alt="Art Photo"
      style="width: 100%"
      id="img"
    /> -->

    <div>
      <div class="theme-title">
        {{ data["theme"] }}
      </div>
      <hr />
    </div>

    <div style="padding: 0 10px">
      <div class="description">
        {{ data["description"] }}
      </div>
    </div>

    <div></div>
  </div>
</template>
<script>
const default_layout = "default";

export default {
  computed: {},
  props: ["data"],
};
</script>

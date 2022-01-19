<template>
  <div id="topbar">
    <div id="userArea">
      <svg
        id="icon"
        xmlns="http://www.w3.org/2000/svg"
        width="1.25em"
        height="1.25em"
        viewBox="0 0 36 36"
      >
        <path
          id="Icon_awesome-user-alt"
          data-name="Icon awesome-user-alt"
          d="M18,20.25A10.125,10.125,0,1,0,7.875,10.125,10.128,10.128,0,0,0,18,20.25Zm9,2.25H23.126a12.24,12.24,0,0,1-10.252,0H9a9,9,0,0,0-9,9v1.125A3.376,3.376,0,0,0,3.375,36h29.25A3.376,3.376,0,0,0,36,32.625V31.5A9,9,0,0,0,27,22.5Z"
          fill="#fff"
        />
      </svg>

      {{ username }}
    </div>

    <h1 id="title">
      <router-link :to="{ name: 'ArtTable' }">XHIBIT</router-link>
    </h1>

    <div></div>

    <form action="/logout" method="get">
      <button id="logout" v-on:click="logout">
        Logout
      </button>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
  computed: {},
  props: ["username"],
  methods: {
    logout() {
      console.log("logout function");
      axios.post("/logout").then(() => {
        console.log(error);
        window.location.replace("/logout");
      });
    },
  },
};
</script>

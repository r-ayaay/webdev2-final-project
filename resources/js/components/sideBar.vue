<template>
  <div id="sidenav">
    <h2 id="label">TABLES</h2>
    <ul id="nav">
      <!-- <router-link :to="{ name: 'GalleryTable' }">
        <li class="subTab">Gallery</li>
      </router-link> -->

      <router-link :to="{ name: 'ArtTable' }">
        <li class="subTab">Art</li>
      </router-link>

      <router-link :to="{ name: 'ExhibitTable' }">
        <li class="subTab">Exhibit</li>
      </router-link>

      <router-link :to="{ name: 'PoetryTable' }">
        <li class="subTab">Poetry</li>
      </router-link>

      <router-link :to="{ name: 'MusicTable' }">
        <li class="subTab">Music</li>
      </router-link>

      <router-link :to="{ name: 'UsersTable' }">
        <li class="subTab">Users</li>
      </router-link>
    </ul>
  </div>
</template>
<script>
export default {
  computed: {},
  props: [],
};
</script>

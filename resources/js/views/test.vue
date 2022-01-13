 <template>
  <div>
    <topBar :username="username" />

    <router-view></router-view>
  </div>
</template>

<script>
import topBar from "../components/topBarGuest.vue";

export default {
  computed: {},
  props: ["username"],
  components: { topBar },
};
</script>
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
      <router-link :to="{ name: 'exhibitsView' }">XHIBIT</router-link>
    </h1>

    <div></div>

    <button id="myBtn" class="login">
        <a href="/login" style="color: white">
        Log in
        </a>
        </button>
      <!-- @guest
                @if (Route::has('login'))
                <button id="myBtn" class="login">Log in</button>
                @endif
                @else
                <a id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <p id="logoutText">
                        {{ __('Logout') }}
                    </p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                    </form>
                </a>      
            @endguest -->
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  computed: {},
  props: ["username"],
  methods: {
    logout() {
      axios.post("/login").catch((error) => {
        window.location.href = "login";
      });
    },
  },
};
</script>

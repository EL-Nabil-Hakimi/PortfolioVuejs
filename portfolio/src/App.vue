

<script setup >
import { RouterLink, RouterView } from 'vue-router'
  import 'bootstrap/dist/css/bootstrap.css'
</script>

<template>
  <RouterView />  
</template>

<style>

    body { font-family: sans-serif; }

    #main-menu .nav-bar { list-style:none; margin-top: 40px; }
    #main-menu .nav-bar li { display:inline; padding:0 10px; }

    #main-menu .nav-bar li a {
      text-decoration: none;
      padding-left: 25px;
      text-transform: uppercase;
      color: #333;
      text-shadow: 1px 1px 1px #ccc;
      transition: 0.3s;
    }

    #main-menu .nav-bar li a:hover{
      color: orangered;
    }

</style>



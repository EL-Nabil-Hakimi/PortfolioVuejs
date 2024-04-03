<script>
</script>

<template>
  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" @submit.prevent="login">
    <p><input type="email" v-model="email" placeholder="Email"></p>
    <p><input type="password" v-model="password" placeholder="Password"></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>
</template>

<script>
import axios from "axios";
import router from "../../router"; // Import the default export

export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login() {
  axios.post("http://127.0.0.1:8000/api/login", {
      email: this.email,
      password: this.password,
    })
    .then(response => {
      console.log(response.data);
      if (response.data.token) {
        localStorage.setItem('token', response.data.token);
        router.push("/dashboard");
      }
    })
    .catch(error => {
      console.error(error);
    });
}
  }
};
</script>


<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)), url("https://images.pexels.com/photos/257897/pexels-photo-257897.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
  font-family: 'Open Sans', sans-serif;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  height: 100vh;
  color: white;
}   

.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}
</style>
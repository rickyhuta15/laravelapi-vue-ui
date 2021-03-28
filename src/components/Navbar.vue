<template>
<div class="conteiner">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  </nav>
</div>
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Contact App</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
           <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/Creativefriends">Creativefriends</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/Editfriends">Editfriends</router-link>
          </li>
          
        </ul>
      </div>
    </div>

</template>

<script>
export default {};
</script>

<style>
</style>
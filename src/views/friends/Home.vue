<template>
  <div class="home">
    <Slider />
    <hr class="my-3" />
    <router-link class="btn btn-primary" to="/createfriends"
      >Add friends</router-link
    >
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">No Tlp</th>
          <th scope="col">Alamat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(friend, index) in friends" :key="index">
          <td>{{ friend.nama }}</td>
          <td>{{ friend.no_tlp }}</td>
          <td>{{ friend.alamat }}</td>
          <td>
            <router-link class="btn btn-success" to="/editfriends"
              >Edit</router-link
            >
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios'
// @ is an alias to /src
import Slider from "@/components/Slider.vue";
import { onMounted, ref } from 'vue';

export default {
  name: "Home",
  components: {
    Slider,
  },
  setup(){
    let friends = ref([])
    onMounted(() => {
      axios.get('http://127.0.0.1:8000/api/friends')
      .then(response => {
        friends.value = response.data.data
      })
      .catch(error => {
        console.log(error)
      })
    })
    return {
      friends
    }
  }
};
</script>
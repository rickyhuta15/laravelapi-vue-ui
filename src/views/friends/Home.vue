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
            <router-link class="btn btn-success" :to="{name:'Editfriends',params:
            {id:friends.id}}"
              >Edit</router-link
            >
            <button @click.prevent="frienddelete(friend.id)" class= "btn btn-danger">Delete</button>
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
      axios.get('http://pia.labirin.co.id/api/friends')
      .then(response => {
        friends.value = response.data.data
      })
      .catch(error => {
        console.log(error)
      })
    })

    function frienddelete(id){
      axios.delete(`http://pia.labirin.co.id/api/friends/${id}`)
      .then(()=>{
        let z=this.frieds.map(friends => friends.id).indexOf(id);
        this.friends.splice(z, 1)
      }).catch(error => {
        console.log(error
        )
      })
    }
    return {
      friends,
      frienddelete
    }
  }
};
</script>
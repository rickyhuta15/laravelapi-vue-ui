<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title">edit friend</h5>
      <form class="row g-3" @submit.prevent="update">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputEmail4" v-model="friend.nama"/>
          <div class="alert alert-danger" v-if="validation.nama">
            {{ validation.nama[0] }}
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">No Tlp</label>
          <input type="number" class="form-control" id="inputPassword4" v-model="friend.no_tlp"/>
          <div class="alert alert-danger" v-if="validation.no_tlp">
            {{ validation.no_tlp[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Alamat</label>
          <div class="alert alert-danger" v-if="validation.alamat">
            {{ validation.alamat[0] }}
          </div>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            placeholder="Masukkan alamat" v-model="friend.alamat"
          />
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import { onMounted, reactive, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";
export default {
  setup() {
    const friend = reactive({
      nama: "",
      no_tlp: "",
      alamat: "",
    });

    const validation = ref([]);

    const router = useRouter();

    const route =useRoute()

    onMounted(()=> {
      axios.get(`http://pia.labirin.co.id/api/friends/${route.params.id}` )
      .then(Response=> {
        console.log(Response)
        friend.nama = Response.data.data.nama
        friend.no_tlp = Response.data.data.no_tlp
        friend.alamat = Response.data.data.alamat 
      }).catch(error=>{
        console.log(error.response.data)
      })
    })

    function update() {
      let nama = friend.nama;
      let no_tlp = friend.no_tlp;
      let alamat = friend.alamat;

      axios.put(`http://pia.labirin.co.id/api/friends/${route.params.id}`, {
          nama: nama,
          no_tlp: no_tlp,
          alamat: alamat,
        })
        .then(() => {
          router.push({
            name: "Home",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      friend,
      validation,
      router,
      update,
      route,
    };
  },
};
</script>
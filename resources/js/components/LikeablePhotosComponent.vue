<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Placeholder Photos</div>         

          <div v-for="(photo) in photos" :key="photo.id" class="col d-flex justify-content-center mt-2">
            <div class="card text-center" style="width: 32rem;">
              <img v-bind:src="photo.url" class="card-img-top" v-bind:alt="photo.title">
              <div class="card-body">
                <h5 class="card-title">{{ photo.title}}</h5>
                <a href="#" class="btn btn-primary" v-on:click="favorPhoto(photo)">Favorite</a>
              </div>
            </div>
          </div>        

          <div class="col d-flex justify-content-center my-3">
            <a class="btn btn-primary mx-1" v-if="page > 1" v-on:click="page--">
              {{page - 1}}
            </a>

            <a class="btn btn-primary active mx-1">
              {{page}}
            </a>

            <a class="btn btn-primary mx-1" v-if="page < totalPages" v-on:click="page++">
              {{page + 1}}
            </a>

            <a class="btn btn-primary mx-1" v-if="page == 1" v-on:click="page = page + 2">
              {{page+2}}
            </a>
          </div>          

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      photos: [],
      photosMaximumLength: 5000,
      page: 1,
      perPage: 1,
      totalPages: 0,
    };
  },

   methods:{

    initializePages(){
      this.totalPages = this.photosMaximumLength / this.perPage;      
    },

    getPhotos(offset, limit){      
      axios
      .get(`http://jsonplaceholder.typicode.com/photos?_start=${offset}&_limit=${limit}`)
      .then((resp) => {
        this.photos = resp.data;
      })
      .catch((error) => {
        console.error(error);
      })
    },

    favorPhoto(photo){      
      axios.post('/photos', {
        id: photo.id,
        title: photo.title,
        url: photo.url
      })
      .then((resp) => {
        console.log(resp);
      })
      .catch((err) => {
        console.error(err);
      });
      this.page = ++this.page;
    }

  },

  created() {
    this.getPhotos(0, this.perPage);
  },

  mounted() {
    this.initializePages();
  },

  watch: {
    page() {
      this.getPhotos((this.page - 1) * this.perPage, this.perPage);
    }
  }

};
</script>

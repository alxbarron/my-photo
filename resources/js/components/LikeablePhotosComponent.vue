<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Placeholder Photos</div>         
          
          <div v-for="(photo) in displayedPhotos" :key="photo.id" class="col d-flex justify-content-center mt-2">
            <div class="card text-center" style="width: 30rem;">
              <img v-bind:src="photo.url" class="card-img-top" v-bind:alt="photo.title">
              <div class="card-body">
                <h5 class="card-title">{{photo.title}}</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>


          <nav aria-label="Photos navigation">
            <ul class="pagination">
              <li class="page-item">
                <button type="button" class="page-link" v-if="page != 1" @click="page--"> Previous </button>
              </li>
              <li class="page-item">
                <button type="button" class="page-link" v-for="pageNumber in pages.slice(page-1, page+5)" v-bind:key="pageNumber" @click="page = pageNumber"> {{pageNumber}} </button>
              </li>
              <li class="page-item">
                <button type="button" @click="page++" v-if="page < pages.length" class="page-link"> Next </button>
              </li>
            </ul>
          </nav>	
          
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
      maxPhotos: 5000,
      page: 1,
      perPage: 1,
      pages: [],
    };
  },

   methods:{

    setPages () {
			let numberOfPages = Math.ceil(this.maxPhotos / this.perPage);
			for (let index = 1; index <= numberOfPages; index++) {
				this.pages.push(index);
			}
		},

    getPhotos(offset, limit) {
      axios
        .get(`http://jsonplaceholder.typicode.com/photos?_start=${offset}&_limit=${limit}`)
        .then((response) => {
          this.photos = response.data;
        })
        .catch((error) => {
          console.log(error);
        })
    },

    paginate(photos){
      let page = this.page;
			let perPage = this.perPage;
			let from = (page * perPage) - perPage;
			let to = (page * perPage);
			this.getPhotos(from, to);
    }
  },
  computed:{
    displayedPhotos() {
      return this.paginate(this.photos);
    } 
  },

  watch: {
    photos() {
      this.setPages();
    }
  },

  mounted() {
    this.getPhotos(this.currentPage * this.perPage, this.perPage)
    this.setPages();
  },

};
</script>

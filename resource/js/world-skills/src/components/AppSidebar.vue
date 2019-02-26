<template>
  <div class="sidebar">
    <router-link to="/"><h2>PeterChan blog</h2></router-link>
    <form action="#" method="get">
      <input type="text" name="search" placeholder="Search post..." v-model="searchInput">
      <button @click.prevent="search"><i class="fas fa-search"></i></button>
    </form>
    <ul>
      <li v-for="category in categories">
        <router-link :to="{ path: '/', query: { ...$route.query, category: category.slug } }">{{ category.category_name }}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'AppSidebar',

  data() {
    return {
      searchInput: '',
      categories: [],
    }
  },

  created() {
    fetch('/api/categories', {
      method: 'get',
    }).then(res => res.json()).then((json) => {
      if(json.success) {
        this.categories = json.categories;
      } else {
        swal({
          icon: 'error',
          title: 'Get post categories failed'
        });
      }
    });
  },

  methods: {
    search() {
      if (this.searchInput == '' || this.searchInput.trim() == '') {
        swal({
          icon: 'error',
          title: 'Search input cannot empty'
        });
      } else {
        this.$router.push({
          path: '/',
          query: {
            ...this.$route.query,
            search: this.searchInput,
          }
        });

        this.searchInput = '';
      }
    }
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
a {
  text-decoration: none;
}
.sidebar {
  width: 100%;
  background: #383838;
  min-height: 100vh;
}

h2 {
  text-align: center;
  color: #fff;
  margin: 40px 0;
}

form {
  position: relative;
}

form button {
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  outline: none;
}

form button:active {
  font-size: 14px;
}

.sidebar input {
  background-color: #2d2d2d;
  border: none;
  border-radius: 0;
  color: #fff;
  font-size: 16px;
  font-family: Montserrat,sans-serif,Arial;
  outline: none;
  padding: 20px;
  width: 100%;
}

.sidebar ul {
  padding: 20px 0;
}

.sidebar li {
  color: #fff;
}

.sidebar li a {
  display: block;
  padding: 20px;
  height: 100%;
  width: 100%;
  color: #fff;
  text-decoration: none;
}

.sidebar li a:hover {
  background: #333;
  box-shadow: 0px 0px 4px rgba(0, 0, 0, .3) inset;
}

</style>

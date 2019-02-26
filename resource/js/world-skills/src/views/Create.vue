<template>
  <div class="create">
  	<a href="#" @click="$router.go(-1)">&lt; Go back</a>
  	<h1>Create new post</h1>

  	<form class="container" action="#" method="get" @submit.prevent="submit">
  		<input type="text" name="title" placeholder="Title">
  		<textarea name="content" placeholder="Type some post content here."></textarea>

  		<select name="category">
  			<option v-for="category in categories" :value="category.id">{{ category.category_name }}</option>
  		</select>

  		<div class="btns">
  			<input type="submit" value="Submit">
  		</div>
  	</form>
  </div>
</template>

<script>
export default {
  name: 'Create',

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

  data() {
  	return {
  		categories: [],
  	}
  },

  methods: {
  	submit(e) {
  		let title = e.target.elements.title.value;
  		let content = e.target.elements.content.value;
  		let category = e.target.elements.category.value;

  		if (title == '' || content == '' || category == '') {
  			swal({
  				icon: 'error',
  				title: 'Input cannot empty'
  			})
  		} else {
	  		if (title.includes( '-' )) { //Slug
	  			swal({
	  				icon: 'error',
	  				title: 'Title cannot contain hyphen'
	  			});
	  			return;
	  		}

  			fetch('/api/store', {
  				method: 'post',
  				body: this.formData({
  					title,
  					content,
  					category
  				}),
  			}).then(res => res.json()).then((json) => {
  				if(json.success) {
  					swal({
  						icon: 'success',
  						title: 'Create post successful',
  					});
  					
 					e.target.elements.title.value = '';
 					e.target.elements.content.value = '';
 					e.target.elements.category.value = '';
  				} else {
  					swal({
  						icon: 'error',
  						title: 'Create post failed',
  					});
  				}
  			});
  		}
  	},

  	formData(obj) {
  		let f = new FormData();
  		for(let key in obj) {
  			f.append( key, obj[key] );
  		}
  		return f;
  	}
  },

  components: {

  }
}

</script>

<style scoped>
.create a {
	display: block;
	max-width: 600px;
	margin: 60px auto 30px auto;
	color: #333;
}

.create a:hover {
	text-decoration: none;
}

h1 {
	text-align: center;
	font-size: 40px;
	color: #333;
	margin-bottom: 30px;
}

form.container {
	max-width: 600px;
	margin: 0 auto;
}

form > * {
	width: 100%;
}

form input, textarea, select {
	width: 100%;
	height: 40px;
	margin-bottom: 30px;
	padding: 10px;
	border-radius: 2px;
	border: none;
	border: 1px solid #ccc;
	font-size: 16px;
	font-family: 'Montserrat';
}

a {
	display: block;
	margin: 10px 0;
}

select {
	float: right;
	width: 50%;
}

form textarea {
	min-height: 300px;
	max-width: 100%;
}

form .btns {
	display: flex;
}

form .btns > input {
	margin-left: auto;
}

form input[type='submit'] {
	background-color: #23e49a;
	color: #fff;
	border-color: #0aaf6f;
	box-shadow: 1px 1px 3px rgba(0, 0, 0, .2);
}

form .btns .delete {
	background-color: #f7695e;
	color: #fff;
	border-color: #f44336;
	box-shadow: 1px 1px 3px rgba(0, 0, 0, .2);
	text-align: center;
	text-decoration: none;
}

form input[type='submit'], form .btns .delete {
	border: none;
	width: 100px;
	padding: 10px;
	height: 40px;
	cursor: pointer;
	transition: .3s all ease-in-out;
	border-radius: 2px;
}

form .btns .delete:hover {
	background-color: #f44336;
}


form input[type='submit']:hover {
	background-color: #0aaf6f;
}
</style>

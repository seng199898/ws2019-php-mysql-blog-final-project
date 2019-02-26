<template>
  <div class="posts">
  	<h1>My Posts</h1>

  	<div class="create">
  		<router-link to="/create">[ + Create new post ]</router-link>
  	</div>

  	<div class="date">
  		<span>Order: </span>
  		<span class="filter-tag" :class="{ active: order.create != null }" @click=" changeOrder('create') ">
  			<span>Create date</span>
  			<i class="fas fa-caret-up" v-show="order.create == 1"></i>
  			<i class="fas fa-caret-down" v-show="order.create == 0"></i>
  		</span>
  		<span class="filter-tag" :class="{ active: order.update != null }" @click=" changeOrder('update') ">
  			<span>Update date</span>
  			<i class="fas fa-caret-up" v-show="order.update == 1"></i>
  			<i class="fas fa-caret-down" v-show="order.update == 0"></i>
  		</span>
  	</div>

  	<div>
		<span v-show="$route.query.category || $route.query.search">Filter: </span>
	  	<span class="filter-tag" v-for="(val, key) in $route.query" v-if=" key != 'create' && key != 'update'">
	  		<span>{{ key | capitalize }} : {{ val }}</span>
	  		<i class="fas fa-times" @click="delFilter( key )"></i>
	  	</span>
  	</div>

  	<p v-if="posts.length == 0" class="empty">No any post.</p>

  	<router-link :to=" '/post/' + post.slug " v-for="post in posts">
  		
	  	<div class="post-operation">
			<router-link :to=" '/edit/' + post.slug "><i class="fas fa-pen"></i></router-link>
			<i class="fas fa-times" @click.prevent.stop="delPost( post.slug )"></i>
	  	</div>
		<div class="post">
	  		<div class="header">
	  			<h2>
	  				<span v-html="highlight( post.title )"></span>
	  			</h2>
	  			<div class="info">
	  				<span>Created at: {{ post.created_date }}</span>
	  				<span>Updated at: {{ post.updated_date }}</span>
	  			</div>

	  			<div class="content" v-html="highlight( post.content )"></div>

	  			<div class="footer">
	  				<router-link :to="{ path: '/', query: { category:  post.category.slug } }">#{{ post.category.category_name }}</router-link>
	  			</div>
	  		</div>
	  	</div>

  	</router-link>
  </div>
</template>

<script>

export default {
  name: 'home',

  created() {
  	this.getPosts();

  	let q = this.$route.query;
  	this.order = {
  		create: (q.create)? q.create : (q.update)? null : 1,
  		update: (q.update)? q.update : null,
  	}
  },

  data() {
  	return {
  		posts: [],
  		order: {
  			create: 1,
  			update: null,
  		}
  	};
  },

  methods: {
  	highlight( str ) {
  		return (this.$route.query.search)? str.split( this.$route.query.search ).join( 
  			`<span class='highlight'>${ this.$route.query.search }</span>`
  		) : str;
  	},

  	getPosts() {
		fetch('/api/posts' + window.location.search, {
			method: 'get',
		}).then(res => res.json()).then((json) => {
			if(json.success) {
				this.posts = json.posts;
			} else {
				swal({
					icon: 'error',
					title: 'Get posts failed'
				});
			}
		});
  	},

  	delPost( slug ) {
  		swal({
			icon: 'warning',
			title: 'Are you sure delete this post?',
			buttons: {
				confirm: true,
				cancel: true,
			}
		}).then((action) => {
			if (action) {
				fetch('/api/destroy?slug=' + slug).then(res => res.json()).then((json) => {
		  			if (json.success) {
		  				let post = this.posts.find(post => {
		  					return post.slug == slug;
		  				});

		  				this.posts.splice( this.posts.indexOf( post ), 1 );

		  				swal({
		  					icon: 'success',
		  					title: 'Delete success',
		  				});
		  			} else {
		  				swal({
		  					icon: 'error',
		  					title: 'Delete action failed'
		  				});
		  			}
		  		});
			}
		});
  	},

  	delFilter( key ) {
  		let query = {};
  		for (var queryKey in this.$route.query) {
  			if (queryKey != key) {
  				query[queryKey] = this.$route.query[queryKey];
  			}
  		}

		this.$router.replace({
			path: '/',
			query
		});
  	},

  	changeOrder( type ) {
  		this.order[type] = (this.order[type] == 1)? 0 : 1;

  		let query;
  		if (type == 'create') {
  			this.delFilter( 'update' );

  			this.order.update = null;
  			this.$router.replace({
	  			path: '/',
	  			query: {
	  				...this.$route.query,
	  				create:  this.order.create
	  			}
  			})
  		} else {
  			this.delFilter( 'create' );

  			this.order.create = null;
  			this.$router.replace({
	  			path: '/',
	  			query: {
	  				...this.$route.query,
	  				update:  this.order.update
	  			}
  			})
  		}		
  	}
  },

  watch: {
  	'$route.query': {
  		deep: true,
  		handler() {
  			this.getPosts();
  		}
  	}
  },

  filters: {
  	capitalize(value) {
  		if (!value) return ''
  		value = value.toString()
  		return value.charAt(0).toUpperCase() + value.slice(1)
  	},
  },

  components: {

  },
};
</script>

<style scoped>
a {
	color: #333;
	text-decoration: none;
}

.create {
	display: block;
	margin: 0 0 20px 0;
	text-align: right;
}

.create a:hover {
	text-decoration: underline;
}

.posts {
	max-width: 1000px;
	margin: 0 auto;
    /*overflow: auto;*/
}

.empty {
	text-align: center;
	margin: 3em 0;
	font-size: 20px;
	font-weight: bold;
}

.filter-tag {
	display: inline-block;
	padding: 10px;
	color: #fff;
	background: #333;
	border-radius: 4px;
	font-size: 12px;
	margin-left: 10px;
}

.date {
	margin-bottom: 20px;
}

.date .filter-tag.active {
	color: #fff;
	background: #333;
}

.date .filter-tag.active:hover {
	color: #fff;
	background: #333;
}

.date .filter-tag {
	cursor: pointer;
	color: #333;
	background: #fff;
}

.date .filter-tag:hover {
	color: #fff;
	background: #999;
}

.filter-tag i {
	padding-left: 10px;
	cursor: pointer;
}

h1 {
	text-align: center;
	font-size: 40px;
	color: #333;
	margin: 60px 0;
}

.post {
	/*padding-top:40px;*/
	padding: 20px;
	min-height:100px;
	border: 1px solid #f1f1f1;
	border-left:50px solid #546465;
	margin-bottom:20px;
	background-color: #fff;
	margin-bottom: 40px;
}

.post h2 {
	margin: 0;
	font-size: 30px;
	margin-bottom: 20px;
}

.post .info, .post .footer {
	color: #999;
	font-size: 14px;
}

.post .info span {
	padding-right: 20px;
}

.post .content {
	margin: 20px 0;
}

.post .footer a {
	text-decoration: none;
}

.post .footer a:hover {
	text-decoration: underline;
}

.post-operation {
	text-align: right;
}

.post-operation i {
	font-size: 16px;
	color: gold;
	padding: 0 20px;
	padding-bottom: 10px;
	cursor: pointer;
}

.post-operation i:first-child {
	padding: 0;
}

.post-operation i:nth-child(2) {
	color: red;
}
</style>

<style>
.highlight {
	color: red;
}
</style>
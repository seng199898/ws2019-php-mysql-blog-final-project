<template>
	<div class="post-container" v-if="post.slug">
	  	<div class="post-operation">
	  		<router-link to="/">&lt; Go back</router-link>
			<router-link :to=" '/edit/' + post.slug "><i class="fas fa-pen"></i></router-link>
			<i class="fas fa-times" @click.prevent.stop="delPost( post.slug )"></i>
	  	</div>
		<div class="post">
	  		<div class="header">
	  			<h2>{{ post.title }}</h2>
	  			<div class="info">
	  				<span>Created at: {{ post.created_date }}</span>
	  				<span>Updated at: {{ post.updated_date }}</span>
	  				<router-link :to="{ path: '/', query: { category: post.category.slug } }">
	  					#{{ post.category.category_name }}
	  				</router-link>
	  			</div>

	  			<div class="content" v-html="post.content"></div>
	  		</div>
	  	</div>

	</div>
</template>

<script>

export default {
  name: 'Post',

  created() {
	fetch('/api/post?slug=' + this.$route.params.id, {
		method: 'get',
	}).then(res => res.json()).then((json) => {
		if(json.success) {
			this.post = json.post;
		} else {
			swal({
				icon: 'error',
				title: 'Get post failed'
			});
		}
	});
  },

  data() {
  	return {
  		post: {}
  	}
  },

  methods: {
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
		  				swal({
		  					icon: 'success',
		  					title: 'Delete success',
		  				});

		  				this.$router.push({
		  					path: '/',
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
  	}
  },

  components: {

  },
};
</script>

<style scoped>
a {
	color: #333;
}


h1 {
	text-align: center;
	font-size: 40px;
	color: #333;
	margin: 60px 0;
}

.post .content {
	line-height: 1.6em;
}

.post-container {
	max-width: 1000px;
	margin: 0 auto;
	margin-top: 40px;
    overflow: auto;
}

.post-container > a:first-child {
	display: block;
	padding: 20px 0;
}

.post {
	padding: 20px;
	float:left;
	width: 100%;
	min-height:100px;
	border: 1px solid #f1f1f1;
	border-left:50px solid #546465;
	/*box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1), 0 0px 3px 0 rgba(0, 0, 0, 0.1);*/
	margin-bottom:20px;
	background-color: #fff;
	margin-bottom: 40px;
}

.post h2 {
	margin: 0;
	font-size: 50px;
	margin-bottom: 20px;
}

.post .info {
    text-align: right;
}

.post .info, .post .footer {
	color: #999;
	font-size: 14px;
}

.post .info span {
	display: block;
    margin: 10px 0;
}

.post .content {
	margin: 20px 0;
}

.post .info a {
	text-decoration: none;
}

.post .info a:hover {
	text-decoration: underline;
}


.post-operation {
	text-align: right;
	margin-bottom: 20px;
}

.post-operation a:first-child {
	float: left;
}

.post-operation i {
	font-size: 16px;
	color: gold;
	padding: 0 10px;
	padding-bottom: 10px;
	cursor: pointer;
}

.post-operation i:nth-child(2) {
	padding: 0;
}

.post-operation i:nth-child(3) {
	color: red;
}
</style>
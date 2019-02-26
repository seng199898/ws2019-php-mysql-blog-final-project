import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home.vue';
import Post from './views/Post.vue';
import Create from './views/Create.vue';
import Edit from './views/Edit.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/post/:id',
      name: 'post',
      component: Post
    },
    {
      path: '/create',
      name: 'create',
      component: Create
    },
    {
      path: '/edit/:id',
      name: 'edit',
      component: Edit
    },
  ],
});

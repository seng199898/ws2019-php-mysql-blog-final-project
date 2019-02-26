<template>
  <div id="app">
    <app-sidebar class="sidebar"></app-sidebar>
    <main>
      <transition name="view" mode="out-in">
        <router-view/>
      </transition>
      <app-footer></app-footer>
    </main>
  </div>
</template>

<script>
import AppSidebar from './components/AppSidebar';
import AppFooter from './components/AppFooter';

export default {
  components: {
    AppSidebar,
    AppFooter
  }
}

</script>
<style scoped>

main {
  padding: 10px;
}

</style>

<style>
body {
  margin: 0;
  padding: 0;
  font-family: 'Montserrat', Microsoft Yahei,sans-serif,Arial;
}

#app {
  display: grid;
  grid-template-columns: 300px 1fr;
}

* {
  box-sizing: border-box;
}

ul, li {
  padding: 0;
  margin: 0;
  list-style: none;
}

.view-enter-active {
  /*position: absolute;*/
  transition: .3s all ease-in;
}

.view-leave-active {
  /*position: absolute;*/
  transition: .3s all ease-in;
}

.view-enter {
  opacity: 0;
}

.view-leave-to {
  opacity: 0;
}
</style>

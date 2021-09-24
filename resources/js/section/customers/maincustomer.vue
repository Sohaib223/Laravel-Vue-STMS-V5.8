<template>
  <div>
    <customerleftbar></customerleftbar>

    <customertopbar></customertopbar>

    <main id="main-container">
      <transition name="page" mode="out-in">
        <router-view></router-view>
      </transition>
    </main>
    <!-- END Main Container -->

    <myfooter></myfooter>
  </div>
  <!-- END Page Container -->
</template>
<script>
import customerleftbar from "./../../components/includes/customerleftbar.vue";
import customertopbar from "./../../components/includes/customertopbar.vue";
import myfooter from "./../../components/includes/footer.vue";

import router from "./route.js";

export default {
  components: { customerleftbar, customertopbar, myfooter },
  router,
  data() {
    return {};
  }
};
</script>
<style>
.page-enter-active,
.page-leave-active {
  transition: opacity 0.3s, transform 0.2s;
}
.page-enter {
  opacity: 0;
}
.page-leave-to {
  opacity: 0;
}
</style>
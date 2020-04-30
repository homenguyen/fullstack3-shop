<template>
  <div class="container">
    <div class="row justify-content-center">
      <Menu></Menu>
      <HotProductList></HotProductList>
    </div>
  </div>
</template>

<script>
import HotProductList from "./HotProductList.vue";
import Menu from "../General/Menu.vue";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  components: {
    HotProductList,
    Menu
  }
};
</script>

<style lang="css" scoped>
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Trang chu</h2>
            <menu></menu>
            <HotProductList></HotProductList>
        </div>
    </div>
</template>

<script>
    import HotProductList from './HotProductList.vue'

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            HotProductList
        }
    }
</script>

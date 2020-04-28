<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hot product</div>

                    <div class="card-body">
                        <div v-for="product in products" :key="product.id">
                            <h3>{{ product.name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: []
            }
        },
        mounted() {
            console.log('Hot product Component mounted.');

            axios.get('/api/hot-product').then( response => {
                this.products = response.data;
            });
        }
    }
</script>

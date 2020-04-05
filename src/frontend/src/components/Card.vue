<script>
    export default {
        props: {
            product : Object
            },

        data() {
            return {
            }
        },
        computed: {
            ProductDetailsPath(){
                return `/product/${this.product.id}`
            }
        },

    };
</script>

<template>
<div>
    <div class="card">
        <router-link :to="ProductDetailsPath" style="text-decoration : none">
            <div class="card-image" style="overflow:hidden">
                <img :src=product.photo alt="" />
            </div>
        </router-link>
            <div class="card-description">
                <span class="card-description-brand">{{product.brand}}</span>
                <span class="card-description-content">{{product.description}}</span>
                <span class="card-description-price">{{product.price}} TL</span>
            </div>
    </div>
</div>
</template>





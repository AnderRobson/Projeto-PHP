var eventBus = new Vue()

Vue.component('product-review', {
    template: `
        <form class="review-form" @submit.prevent="onSubmit">

            <p v-if="errors.length">
                <b>Corrija os seguintes erros:</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>

            <p>
                <label for="name">Nome:</label>
                <input id="name" v-model="name" placeholder="nome">
            </p>

            <p>
                <label for="review">Revisão:</label>
                <textarea id="review" v-model="review"></textarea>
            </p>

            <p>
                <label for="rating">Classificação:</label>
                <select id="rating" v-model.number="rating">
                    <option>5</option>
                    <option>4</option>
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                </select>
            </p>

            <p>
                <input type="submit" value="Publicar">
            </p>

        </form>

    `,

    data() {
        return {
            name: null,
            review: null,
            rating: null,
            errors: []

        }
    },

    methods: {
        onSubmit() {
            if (this.name && this.review && this.rating) {
                let productReview = {
                    name: this.name,
                    review: this.review,
                    rating: this.rating
                }
                eventBus.$emit('review-submitted', productReview)
                this.name = null
                this.review = null
                this.rating = null
            } else {
                if (!this.name) this.errors.push("Nome obrigatório.")
                if (!this.review) this.errors.push("Revisão necessária.")
                if (!this.rating) this.errors.push("Classificação necessária.")
            }
        }
    }
})

Vue.component('product-tabs', {
    props: {
        reviews: {
            type: Array,
            required: true
        }
    },

    template: `
        <div>
            <span class="tab"
            :class="{ activeTab: selectedTab === tab}"
            v-for="(tab,index) in tabs"
            :key="index"
            @click="selectedTab = tab">
            {{ tab }}</span>

            <div v-show="selectedTab == 'Comentários'">
                <p v-if="!reviews.length">Ainda não há comentários.</p>
                <ul v-else>
                    <li v-for="(review, index) in reviews" :key="index">
                        <p>{{ review.name }}</p>
                        <p>Classificação: {{ review.rating }}</p>
                        <p>{{ review.review }}</p>
                    
                    </li>
                </ul>
            </div>

            <product-review v-show="selectedTab == 'Faça uma revisão'"></product-review>
        </div>


    `,

    data() {
        return {
            tabs: ['Comentários', 'Faça uma revisão'],
            selectedTab: 'Comentários'
        }
    }
})

var app = new Vue({
    el: '#produto1',
    
    methods: {
        updateCart(id) {
            this.cart.push(id)
        },
    },

    data() {
        return{ 
            product: '',
            selectedVariant: 0,
    
            variants: [
                {
                    variantId: 2234,
                    variantColor: "Red",
                    variantImage: './img/produto1.1.jpg',
                    variantQuantity: 5
                },
                {
                    variantId: 2235,
                    variantColor: "Red",
                    variantImage: './img/produto1.2.jpg',
                    variantQuantity: 5
                },
                {
                    variantId: 2236,
                    variantColor: "Red",
                    variantImage: './img/produto1.3.jpg',
                    variantQuantity: 5
                }
            ],

            reviews: []
        }
    },

    methods: {
        addToCart() {
            this.$emit('add-to-cart', this.variants[this.selectedVariant].variantId)
        },

        updateProduct(index) {
            this.selectedVariant = index
            console.log(index)
        },
    },

    computed: {
        title() {
            return this.product
        },

        image() {
            return this.variants[this.selectedVariant].variantImage
        },

        inStock(){
            return this.variants[this.selectedVariant].variantQuantity
        }
    },

    mounted() {
        eventBus.$on('review-submitted', productReview => {
            this.reviews.push(productReview)
        })
    }
})

var app = new Vue({
    el: '#produto2',
    
    methods: {
        updateCart(id) {
            this.cart.push(id)
        },
    },

    data() {
        return{ 
            product: '',
            selectedVariant: 0,
    
            variants: [
                {
                    variantId: 2234,
                    variantColor: "Black",
                    variantImage: './img/produto2.1.jpg',
                    variantQuantity: 10
                },
                {
                    variantId: 2235,
                    variantColor: "Black",
                    variantImage: './img/produto2.2.jpg',
                    variantQuantity: 0
                },
                {
                    variantId: 2236,
                    variantColor: "Black",
                    variantImage: './img/produto2.3.jpg',
                    variantQuantity: 0
                }
            ],

            reviews: []
        }
    },

    methods: {
        addToCart() {
            this.$emit('add-to-cart', this.variants[this.selectedVariant].variantId)
        },

        updateProduct(index) {
            this.selectedVariant = index
            console.log(index)
        },
    },

    computed: {
        title() {
            return this.product
        },

        image() {
            return this.variants[this.selectedVariant].variantImage
        },

        inStock(){
            return this.variants[this.selectedVariant].variantQuantity
        }
    },

    mounted() {
        eventBus.$on('review-submitted', productReview => {
            this.reviews.push(productReview)
        })
    }
})

var app = new Vue({
    el: '#produto3',
    
    methods: {
        updateCart(id) {
            this.cart.push(id)
        },
    },

    data() {
        return{ 
            product: '',
            selectedVariant: 0,
    
            variants: [
                {
                    variantId: 2234,
                    variantColor: "Blue",
                    variantImage: './img/produto3.1.jpg',
                    variantQuantity: 10
                },
                {
                    variantId: 2235,
                    variantColor: "Blue",
                    variantImage: './img/produto3.2.jpg',
                    variantQuantity: 10
                },
                {
                    variantId: 2236,
                    variantColor: "Blue",
                    variantImage: './img/produto3.3.jpg',
                    variantQuantity: 10
                }
            ],

            reviews: []
        }
    },

    methods: {
        addToCart() {
            this.$emit('add-to-cart', this.variants[this.selectedVariant].variantId)
        },

        updateProduct(index) {
            this.selectedVariant = index
            console.log(index)
        },
    },

    computed: {
        title() {
            return this.product
        },

        image() {
            return this.variants[this.selectedVariant].variantImage
        },

        inStock(){
            return this.variants[this.selectedVariant].variantQuantity
        }
    },

    mounted() {
        eventBus.$on('review-submitted', productReview => {
            this.reviews.push(productReview)
        })
    }
})
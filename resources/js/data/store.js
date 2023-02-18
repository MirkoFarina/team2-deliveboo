import { reactive } from 'vue';

export const store = reactive({
    restaurants     : [],
    categories      : [],
    shopping_cart   : [
        {
            name:   'pita',
            price: '20',
            quantity: 1
        }
    ]
})



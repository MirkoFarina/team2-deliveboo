import { reactive } from 'vue';

export const store = reactive({
    restaurants     : [],
    categories      : [],
    is_canvas       : false,
    shopping_cart   : {
        total_amount : 20,
        restaurant: 10,
        foods: [
            {
                id: 1,
                name: 'pita',
                price: 10,
                quantity: 1
            }
        ]
    }
})



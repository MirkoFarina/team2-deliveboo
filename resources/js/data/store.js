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
    },
    restaurants_paginate: [],
    filtered : [],
    filtered_rest : [],
    /* pagination: {
        total_page : null,
        current_page : null,
        last_route : null,
    } */

    pagination: {
        total_records : null,
        current_records : 0,
        current_page: 1,
        passo: 5,
    }

})



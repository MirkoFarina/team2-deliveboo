import { reactive } from 'vue';

export const store = reactive({
    restaurants     : [],
    categories      : [],
    is_canvas       : false,
    is_modal        : false,
    show_cart       : true,

    shopping_cart   : {
        total_amount : 0,
        restaurant: null,
        foods: []
    },

    restaurants_paginate: [],
    filtered : [],
    filtered_rest : [],

    pagination: {
        total_records : null,
        current_records : 0,
        current_page: 1,
        passo: 3,
    }

})



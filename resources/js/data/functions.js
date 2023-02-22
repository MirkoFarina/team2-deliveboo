import { store } from './store'
import { ApiService } from '../services/api.service'
/*
export function searchSlugRecord(array, sl) {
    var x = null;
    array.forEach(element => {
        if (element.slug === sl)
            x = element;
    });
    return x;
} */

export function addToCart(food) {

    /* empty cart */
    if (store.shopping_cart.foods.length === 0) {
        pushInShoppingCart(food, 1);
    }

    /* not empty */
    else {
        const index = isIncluded(store.shopping_cart.foods, food);
        console.log('INDEX', index);

        if (index === null) {
            if (store.shopping_cart.restaurant === food.restaurant_id)
                pushInShoppingCart(food, 1);
        }

        else store.shopping_cart.foods[index].quantity++;

    }
    store.shopping_cart.total_amount = refreshAmount(store.shopping_cart.foods);
}

function isIncluded(array, food) {
    let x = null;
    console.log(array);

    for(let i=0; i<array.length; i++){
        if (array[i].id === food.id)
            x = i;
    }

    return x;
}

function refreshAmount(array) {
    let sum = 0;
    array.forEach(element => {
        sum += element.price * element.quantity;
    });

    return sum;
}


function pushInShoppingCart(food, q){
    store.shopping_cart.restaurant = food.restaurant_id;
    store.shopping_cart.foods.push({
        id: food.id,
        name: food.name,
        price: food.price,
        quantity: q,
    });
}

export function filterResCat() {
    if(store.filtered_rest.length !== 0 ){
        store.filtered_rest = [];
    }
    store.restaurants.forEach(restaurant => {
        const temp = restaurant.categories.map(x => x.id);
        if(checkSubset(temp, store.filtered))
            store.filtered_rest.push(restaurant);
    });

    if(store.filtered.length === 0 ){
        store.filtered_rest = [];
        store.pagination.current_page = 1;
        store.pagination.current_records = 0;

    }

    console.log('OUUUUUUUUUUUUUUUU', store.filtered_rest);
}

let checkSubset = (parentArray, subsetArray) => {
    return subsetArray.every((el) => {
        return parentArray.includes(el)
    })
}

export function nextPrev(dir) {
   /*  console.log(store.pagination.last_route);
    if (dir)
        ApiService.getApi(store.pagination.last_route, {
            page: ++store.pagination.current_page,
        });
    else
        ApiService.getApi(store.pagination.last_route, {
            page: --store.pagination.current_page,
        }); */

    if(dir){
        store.pagination.current_records += store.pagination.passo;
        store.pagination.current_page ++;

    }else{
        store.pagination.current_records -= store.pagination.passo;
        store.pagination.current_page --;
    }
    setPaginate();
}

export function setPaginate(){
    if(store.filtered_rest.length > 0){
        store.pagination.current_page = 1;
        store.pagination.total_records = store.filtered_rest.length;
        store.restaurants_paginate = store.filtered_rest.slice(store.pagination.current_records,store.pagination.current_records+store.pagination.passo);
    }
    else{
        store.pagination.total_records = store.restaurants.length;
        store.restaurants_paginate = store.restaurants.slice(store.pagination.current_records,store.pagination.current_records+store.pagination.passo);
    }

}



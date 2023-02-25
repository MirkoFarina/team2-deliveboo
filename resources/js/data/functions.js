import { store } from './store'

/*
export function searchSlugRecord(array, sl) {
    var x = null;
    array.forEach(element => {
        if (element.slug === sl)
            x = element;
    });
    return x;
} */

/* *************************** SHOPPING CART **********/
export function addToCart(food) {

    /* empty cart */
    if (store.shopping_cart.foods.length === 0) {
        pushInShoppingCart(food, 1);
    }

    /* not empty */
    else {
        const index = isIncluded(store.shopping_cart.foods, food);

        if (index === null) {
            if (store.shopping_cart.restaurant === food.restaurant_id){
                pushInShoppingCart(food, 1);
            }else {
                store.is_modal = true;
            }
        }

        else store.shopping_cart.foods[index].quantity++;

    }
    store.shopping_cart.total_amount = refreshAmount(store.shopping_cart.foods);

    getSession();
}

export function modQuantityCart(dir, food){
    console.log(store.shopping_cart.foods);
    if(dir){
        addToCart(food);
    }else{
        let x = isIncluded(store.shopping_cart.foods, food)
        if(x != null){
            store.shopping_cart.foods[x].quantity--;
            getSession();
            if(store.shopping_cart.foods[x].quantity === 0)
                removeFood(food);
        }
    }
}


export function removeFood(food){

    const x = isIncluded(store.shopping_cart.foods, food);

    if(x != null)
        store.shopping_cart.foods.splice(x, 1);

    getSession();

}

/** ********************** SESSION CART *************************************         */
function getSession(){
    // transfromo l'oggetto in json
    // lo inserisco nella sessione aggiungendolo alla chiave cart
    localStorage.setItem("cart", JSON.stringify(store.shopping_cart));

    // transformo il json nuovamente in oggetto aggiungendolo allo store cosi' da stampare il risultato della session e prendo il json
    store.shopping_cart = JSON.parse(localStorage.getItem("cart"));
    store.shopping_cart.total_amount = refreshAmount(store.shopping_cart.foods);
}

export function getLastSession(){
    if(localStorage.getItem("cart")) {
        store.shopping_cart = JSON.parse(localStorage.getItem("cart"));
    }
}


export function deleteCart(){
    localStorage.clear();
    store.shopping_cart = {
        total_amount : 0,
        restaurant: null,
        foods: []
    };
    store.is_modal = false;
    store.is_canvas = false;
}
/** ********************** /SESSION CART *************************************         */


function isIncluded(array, food) {
    let x = null;

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

/* *************************** /SHOPPING CART **********/

/* **************************** FILTER CATEGORY ************************* */
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
}

let checkSubset = (parentArray, subsetArray) => {
    return subsetArray.every((el) => {
        return parentArray.includes(el)
    })
}

/* **************************** /FILTER CATEGORY ************************* */


/** ****************************** PAGINATOR ******************************************* */
export function nextPrev(dir) {
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
        store.pagination.total_records = store.filtered_rest.length;
        store.restaurants_paginate = store.filtered_rest.slice(store.pagination.current_records,store.pagination.current_records+store.pagination.passo);
    }
    else{
        store.pagination.total_records = store.restaurants.length;
        store.restaurants_paginate = store.restaurants.slice(store.pagination.current_records,store.pagination.current_records+store.pagination.passo);
    }

}

export function resetPaginate(){
    if(store.filtered_rest.length > 0 ) {
        store.pagination.current_page = 1;
        store.pagination.current_records = 0;
    }
}

/** ****************************** /PAGINATOR ******************************************* */


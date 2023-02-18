import {store} from './store'

export function searchSlugRecord(array, sl){
    var x = null;
    array.forEach(element => {
        if(element.slug === sl)
            x = element;
    });
    return x;
}

export function addToCart(food, res_id){

    /* empty cart */
    if(store.shopping_cart.foods.length === 0){
        store.shopping_cart.foods.push(food);
        store.shopping_cart.restaurant = res_id;
    }

    /* not empty */
    else{
        const index = isIncluded(store.shopping_cart.foods, food);

        if(!index){
            if(store.shopping_cart.restaurant === res_id )
                store.shopping_cart.foods.push(food);
        }

        else store.shopping_cart.foods[index].quantity++;

    }
    store.shopping_cart.total_amount = refreshAmount(store.shopping_cart.foods);
}

function isIncluded(array, food){
    let x = null;
    array.forEach(element => {
        if(element.id === food.id)
            x = array.findIndex(element);
    });

    return x;
}

function refreshAmount(array){
    let sum = 0;
    array.forEach(element => {
        sum += element.price * element.quantity;
    });

    return sum;
}

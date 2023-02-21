import { store } from './store'

export function searchSlugRecord(array, sl) {
    var x = null;
    array.forEach(element => {
        if (element.slug === sl)
            x = element;
    });
    return x;
}

export function addToCart(food, res_id) {

    /* empty cart */
    if (store.shopping_cart.foods.length === 0) {
        store.shopping_cart.foods.push(food);
        store.shopping_cart.restaurant = res_id;
    }

    /* not empty */
    else {
        const index = isIncluded(store.shopping_cart.foods, food);

        if (!index) {
            if (store.shopping_cart.restaurant === res_id)
                store.shopping_cart.foods.push(food);
        }

        else store.shopping_cart.foods[index].quantity++;

    }
    store.shopping_cart.total_amount = refreshAmount(store.shopping_cart.foods);
}

function isIncluded(array, food) {
    let x = null;
    array.forEach(element => {
        if (element.id === food.id)
            x = array.findIndex(element);
    });

    return x;
}

function refreshAmount(array) {
    let sum = 0;
    array.forEach(element => {
        sum += element.price * element.quantity;
    });

    return sum;
}

/* export function filterResCat(){
    let arr = [];
    store.restaurants.forEach(element => {
        if(element.categories.filter(x => store.filtered.every(x.id)))
            arr.push(element);
    });
} */

export function filterResCat() {
    let arr = [];
    store.restaurants.forEach(restaurant => {
        const temp = restaurant.categories.map(x => x.id);
        if(checkSubset(temp, store.filtered))
            arr.push(restaurant);
    });
    console.log(arr);
}

let checkSubset = (parentArray, subsetArray) => {
    return subsetArray.every((el) => {
        return parentArray.includes(el)
    })
}

/* export function filterResCat() {
    let arr = [];
    store.restaurants.forEach(restaurant => {
            console.log(restaurant.categories);
    });
    console.log(arr);
} */

/* export function filterResCat(){
    let out = [];
    store.restaurants.forEach(res => {
        let maronna = [];
        res.categories.forEach(cat =>{
            maronna.push(store.filtered.includes(cat.id));
        });
        if( maronna.map(x => x==true).length <= store.filtered.length)
            out.push(res);
    });
    console.log(out);
} */





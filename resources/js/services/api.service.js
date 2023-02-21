import axios from "axios";
import { BASE_URL } from "../data/data";
import { store } from "../data/store";
import { setPaginate } from '../data/functions';

export class ApiService{
    static getApi(route, params){
        return axios.get(`${BASE_URL}${route}/`, {
            params:{
                page: params.page,
            }
        }).then((res) => {
            if(res.data.restaurants){
                store.restaurants = res.data.restaurants;


                /* store.pagination.total_page = res.data.restaurants.last_page;
                store.pagination.current_page = res.data.restaurants.current_page;
                store.pagination.last_route = 'restaurants'; */

                /* console.log(store.pagination);
                console.log('RISTO', store.restaurants) */
                setPaginate();
            }
            if(res.data.categories)
                store.categories = res.data.categories;

            if(res.data.restaurant)
                return res.data.restaurant;

           

        })
    }
}

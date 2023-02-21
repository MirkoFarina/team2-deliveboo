import axios from "axios";
import { BASE_URL } from "../data/data";
import { store } from "../data/store";

export class ApiService{
    static getApi(route, params){

        return axios.get(`${BASE_URL}${route}`, {
            params:{

            }
        }).then((res) => {
            if(res.data.restaurants){
                store.restaurants = res.data.restaurants;
            }
            if(res.data.categories)
                store.categories = res.data.categories;

                console.log(res);

        })
    }
}

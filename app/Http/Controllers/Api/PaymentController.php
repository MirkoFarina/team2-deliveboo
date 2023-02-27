<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Mail\OrderSuccess;
use App\Models\Food;
use App\Models\Lead;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function generate(Gateway $gateway)
    {
        // GENERO IL TOKEN DA TORNARE COME RESPONSE
        $token = $gateway->clientToken()->generate();
        $data = [
            'token' => $token,
            'success'=> true,
        ];
        // TORNO IL TOKEN IN JSON COME RESPONSE
        return response()->json($data, 200);
    }

    public function sendPayment(Request $request, Gateway $gateway)
    {
        $cart = json_decode($request->cart);
        $result = $gateway->transaction()->sale([
            'amount' => $cart->total_amount,
            'paymentMethodNonce' => $request->token,
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => "Transazione eseguita",
                'request' => $request->all(),
            ];

            /* passare in rassegna il carrello ed instaurare le relazione nel DB */

            $new_order = new Order();
            $new_order->name            = $request->name;
            $new_order->surname         = $request->surname;
            $new_order->email           = $request->email;
            $new_order->total_amount    = $cart->total_amount;
            $new_order->checked         = 1;
            $new_order->save();

            foreach($cart->foods as $food_card){
                $new_order->foods()->attach([$food_card->id =>["quantity" => $food_card->quantity]]);
            }

            $new_lead = new Lead();
            $new_lead->email = $request->email;
            $new_lead->cart = $cart;
            $new_lead->address = $request->address;

            $email_res = Restaurant::find($cart->restaurant)->email;
            Mail::to($email_res)->send(new NewContact($new_lead));


            $name_res = Restaurant::find($cart->restaurant)->name_of_restaurant;
            $new_client = new Lead();
            $new_client->email = $email_res;
            $new_client->cart = $cart;
            $new_client->name_res = $name_res;


            Mail::to($request->email)->send(new OrderSuccess($new_client));
            /* return response()->json($data, 200); */
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione fallita"
            ];
            /* return response()->json($data, 401); */
        }

        return redirect('/completed_payment');
    }
}

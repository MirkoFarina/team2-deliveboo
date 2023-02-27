<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;

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

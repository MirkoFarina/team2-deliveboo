<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
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
        $result = $gateway->transaction()->sale([
            'amount' => 5,
            'paymentMethodNonce' => $request->token,
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => "Transazione eseguita"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione fallita"
            ];
            return response()->json($data, 401);
        }
    }
}

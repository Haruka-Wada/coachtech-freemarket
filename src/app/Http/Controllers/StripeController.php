<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripeController extends Controller
{

    public function checkout(Request $request) {
        Stripe::setApiKey(config('services.stripe.secret_key'));
        $stripe = new \Stripe\StripeClient('sk_test_51QWrFuFZPeEzOxnhgBiJmppdQZDrMw85SU5i1agu10VF5jLhTb9axPQKWMZkZUmRDf6Vh8DwRtkAvrMGvUuKv3Si00V72aSG2s');
        $user = User::find(Auth::id());
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => '腕時計',
                    ],
                    'unit_amount' => 15000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel')
        ]);
        return redirect($checkout_session->url);
    }


    public function success() {
        return view('stripe.success');
    }

    public function cancel() {
        return view('stripe.cancel');
    }
}

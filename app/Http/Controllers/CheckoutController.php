<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,string $plan='price_1PyB86RxS3ntjXgwa7RhxDHN')
    {


        return $request->user()
        ->newSubscription('prod_QpqpJfScjKxVAM', $plan)
        ->checkout([
            'success_url' => route('checkout.success'),
            'cancel_url' => route('dashboard.home'),
        ]);


    }
}

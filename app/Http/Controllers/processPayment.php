<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class processPayment extends Controller
{
    //
    public function processPayment(Request $request)
    {
        $paymentAmount = $request->input('payment');
        $user = auth()->user();

        // $difference = $paymentAmount - $user->price;

        // if ($difference > 0) {
        //     // Update the user's wallet attribute directly
        //     $user->wallet += $difference;

        //     // Use the 'update' method to persist the changes to the database
        //     User::where('id', $user->id)->update(['wallet' => $user->wallet]);
        // }

        return redirect('/login')->with('paymentSuccess', 'Payment successful!');
    }
}

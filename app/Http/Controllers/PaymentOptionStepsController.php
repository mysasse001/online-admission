<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentOption;
use App\Models\PaymentOptionStep;

class PaymentOptionStepsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Request $request,PaymentOption $paymentOption)
    {
        $data = $request->validate([
            'step'=>''
        ]);

        $paymentOption->paymentOptionSteps()->create($data);
        return back()->with('success_message','You have successfully added a payment step');
    }

    public function update(Request $request,PaymentOptionStep $paymentOptionStep)
    {
        $data = $request->validate([
            'step'=>''
        ]);

        $paymentOptionStep->update($data);
        return back()->with('success_message','You have succesfully updated'.$paymentOptionStep->name);
    }

    public function destroy(PaymentOptionStep $paymentOptionStep)
    {
        $paymentOptionStep->delete();
        return back()->with('success_message','You have successfully deleted'.$paymentOptionStep->name);
    }
}

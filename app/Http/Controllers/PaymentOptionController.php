<?php

namespace App\Http\Controllers;

use App\Models\PaymentOption;
use Illuminate\Http\Request;

class PaymentOptionController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        $paymentOptions = PaymentOption::orderBy('name')->get();
        return view('admin.paymentOptions.index',compact('paymentOptions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'',
            'description'=>''
        ]);

        PaymentOption::create($data);
        return back()->with('success_message','You have successfully added a payment option');
    }

    public function show(PaymentOption $paymentOption)
    {
        return view('admin.paymentOptions.show',compact('paymentOption'));
    }
    public function update(Request $request,PaymentOption $paymentOption)
    {
        $data = $request->validate([
            'name'=>'',
            'description'=>''
        ]);
        
        $paymentOption->update($data);
        return back()->with('success_message','You have successfully updated'.$paymentOption->name);
    }

    public function destroy(PaymentOption $paymentOption)
    {
        $paymentOption->delete();
        return back()->with('success_message','You have deleted'.$paymentOption->name);
    }
}

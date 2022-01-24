<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Cart;
use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function get_district_ajax($id){

        $district=ShippingDistrict::where('shipping_division_id',$id)->get();

        return json_encode($district);
    }

    public function get_state_ajax($id){

        $state=ShippingState::where('shipping_district_id',$id)->get();

        return json_encode($state);
    }

    public function checkout_store(Request $request){
        $data=array();

        $data['email']=$request->email;
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['note']=$request->note;
        $data['division']=$request->division;
        $data['district']=$request->district;
        $data['state']=$request->state;
        $data['postal_code']=$request->postal_code;

        $payment_method=$request->payment_method;
        $cartTotal=Cart::total();

        if($payment_method=='stripe'){
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif($payment_method=='card') {
            return 'card';
        }else{
            return 'cod';
        }
    }

      public function stripePost(Request $request)
    {   
        if(Session::has('coupon')){
            $total_amount=Session::get('coupon')['total_amount'];
        }else{
            $total_amount=Cart::total();
        }
     
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge=Stripe\Charge::create ([
                "amount" => $total_amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment From Dourjoy",
                "metadata" => ['order_id' => '6735'],
        ]);

        dd($charge);

        $order_id=Order::insertGetId([
         
          'user_id'=>Auth::id(),
          'division_id'=>$request->division,
          'district_id'=>$request->district,
          'state_id'=>$request->state,
          'name'=>$request->name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'notes'=>$request->note,
          'payment_type'=>'stripe',
          'payment_method'=>$charge->payment_method,
          'transaction_id'=>$charge->balance_transaction,
          'currency'=>$charge->currency,
          'amount'=>$total_amount,
          'transaction_id'=>$charge->balance_transaction,
          



        ]);
        
   
        // Session::flash('success', 'Payment successful!');
           
        // return back();
    }
}

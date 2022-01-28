<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

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

        $order_number=mt_rand(1,999999);
     
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge=Stripe\Charge::create ([
                "amount" => $total_amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment From Dourjoy",
                "metadata" => ['order_number' =>$order_number],
        ]);

       

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
          'order_number'=>$charge->metadata->order_number,
          'invoice_no'=>'DJ_'.mt_rand(10000000,99999999),
          'order_date'=>Carbon::now()->format('d F Y'),
          'order_month'=>Carbon::now()->format('F'),
          'order_year'=>Carbon::now()->format('Y'),
          'status'=>'pending',
          'created_at'=>Carbon::now(),
          



        ]);

        $cartContent=Cart::content();

        foreach($cartContent as $item){
            OrderItem::insert([

                'order_id'=>$order_id,
                'product_id'=>$item->id,
                'color'=>$item->options->color,
                'size'=>$item->options->size,
                'price'=>$item->price,
                'qty'=>$item->qty,
                'created_at'=>Carbon::now(),


            ]);

          
        }

        if(Session::has('coupon')){
            Session::forget('coupon');
          }  

          Cart::destroy();


        $notification = array(
            'message' => 'Order Successfully Placed!',
            'alert-type' => 'success'
        );
        return redirect()->to('/')->with($notification);
        
   
        
    }
}

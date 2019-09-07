<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Payment;
use Cart;
use Session;
class CheckoutController extends Controller
{
    public function index(){
         return view('fontEnd.checkout.checkoutContent');
    }

    public function customerRegistation(Request $request){
            // $this->validate($request ,[
                
            //     'email' => 'required|unique:customer'
            // ]);
    		$customer = new Customer();
    		$customer->firstName = $request->firstName;
    		$customer->lastName = $request->lastName;
    		$customer->email = $request->email;
    		$customer->password = bcrypt($request->password);
    		$customer->address = $request->address;
    		$customer->phone = $request->phone;
    	    $customer->districtName = $request->districtName;
    		$customer->save();
    		$customerId = $customer->id;
    		Session::put('customerId',$customerId );
    		Session::put('customerName',$customer->firstName.' '.$customer->lastName);
    		return redirect('/checkout/shipping');

    }

     public function customerLoginCheck(Request $request){
          $customer = Customer::where('email',$request->email)->first();
          if (password_verify( $request->password,$customer->password)) {
                        Session::put('customerId',$customer->id );
                        Session::put('customerName',$customer->firstName.' '.$customer->lastName);
                        return redirect('/checkout/shipping');
          }else{
            return redirect('/checkout')->with('message','invalide user email and password');
          }
     }


     public function customerLogout()
     {
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
     }

     public function newCustomerLogin()
     {

        return view('fontEnd.customer.customerLoginForm');
     }

     public function showShippingForm(){
     	$customerId = Session::get('customerId');
     	$customerById = Customer::where('id',$customerId)->first();
     	return view('fontEnd.checkout.shippingContent',['customerById'=>$customerById]);
     }
     public function saveShipping(Request $request){
     	$shipping = new Shipping();
     	$shipping->fullName = $request->fullName;
     	$shipping->email = $request->email;
     	$shipping->address = $request->address;
     	$shipping->phone = $request->phone;
     	$shipping->districtName = $request->districtName;
     	$shipping->save();
     	Session::put('shippingId',$shipping->id);
     	return redirect('/checkout/payment');

     }
     public function paymentForm(){

     	return view('fontEnd.checkout.payment');
     }

     public function newOrder(Request $request){
     	$paymentType = $request->paymentType;
     	if ($paymentType ==  'Case') {
     		$order = New Order();
     		$order->customerId = Session::get('customerId');
     		$order->shippingId = Session::get('shippingId');
     		$order->orderTotal = Session::get('orderTotel');
     		$order->save();

     		$payment = new Payment();
     		$payment->paymentType = $paymentType;
     		$payment->orderId = $order->id;
     		$payment->save();

     		$cartProduct = Cart::content();
     		foreach ($cartProduct as $cartProduct) {
     			$orderDetails = new OrderDetails();
     			$orderDetails->orderId = $order->id;
     			$orderDetails->productId = $cartProduct->id;
     			$orderDetails->productName = $cartProduct->name;
     			$orderDetails->productPrice = $cartProduct->price;
     			$orderDetails->ProductQuantity = $cartProduct->qty;
     			$orderDetails->save();
     			
     		}
     		Cart::destroy();
     		return redirect('/complete/order');





     	} elseif ($paymentType == 'Bikash') {
     		# code...
     	} elseif ($paymentType == 'Paypal') {
     		# code...
     	} elseif ($paymentType == 'SSL') {
     		# code...
     	} elseif ($paymentType == 'STRIPE') {
			
			
				$order = New Order();
				$order->customerId = Session::get('customerId');
				$order->shippingId = Session::get('shippingId');
				$order->orderTotal = Session::get('orderTotel');
				$order->save();
   
				$payment = new Payment();
				$payment->paymentType = $paymentType;
				$payment->orderId = $order->id;
				$payment->save();
   
				$cartProduct = Cart::content();
				foreach ($cartProduct as $cartProduct) {
					$orderDetails = new OrderDetails();
					$orderDetails->orderId = $order->id;
					$orderDetails->productId = $cartProduct->id;
					$orderDetails->productName = $cartProduct->name;
					$orderDetails->productPrice = $cartProduct->price;
					$orderDetails->ProductQuantity = $cartProduct->qty;
					$orderDetails->save();
					
				}
				Cart::destroy();
				return redirect('/complete/order');
		}
     		
     	
     }


     public function completeOrder(){
     	return view('fontEnd.customerHome.customerHome');
	 }
	 



}

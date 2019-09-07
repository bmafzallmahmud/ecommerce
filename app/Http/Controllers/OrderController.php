<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\Customer;
use App\Shipping;
use App\Payment;
use App\OrderDetails;
use PDF;
class OrderController extends Controller
{
    public function manageOrder()
    {
    	$orders = DB::table('orders')
    	         ->join('customers','orders.customerId','=','customers.id')
    	         ->join('payments','orders.id','=','payments.orderId')
    			 ->select('orders.*','customers.firstName','customers.lastName','payments.paymentType','payments.paymentStatus')
    			 ->get();

    	return view('admin.order.manageOrder',['orders'=>$orders]);
    }

    public function viewOrder($id)
    {
    	$order = Order::find($id);
    	$customer = Customer::find($order->customerId);
    	$shipping = Shipping::find($order->shippingId);
    	$payment = Payment::where('orderId',$order->id)->first();
    	$orderDetails = OrderDetails::where('orderId',$order->id)->get();

    	return view('admin.order.viewOrder',[
    		'order'=> $order,
    		'customer'=> $customer,
    		'shipping'=> $shipping,
    		'payment'=> $payment,
    		'orderDetails'=> $orderDetails
    	]);
    }

    public function viewOrderInvoice($id)
    {   
        $order = Order::find($id);
        $customer = Customer::find($order->customerId);
        $shipping = Shipping::find($order->shippingId);
        $orderDetails = OrderDetails::where('orderId',$order->id)->get();
        return view('admin.order.viewOrderInvoice',[
            'order'=> $order,
            'customer'=> $customer,
            'shipping'=> $shipping,
            'orderDetails'=> $orderDetails
        ]);
    }
    public function downloadOrderInvoice($id)
    {
        $order = Order::find($id);
        $customer = Customer::find($order->customerId);
        $shipping = Shipping::find($order->shippingId);
        $orderDetails = OrderDetails::where('orderId',$order->id)->get();
        $pdf = PDF::loadView('admin.order.downloadInvoice',[
            'order'=> $order,
            'customer'=> $customer,
            'shipping'=> $shipping,
            'orderDetails'=> $orderDetails

        ]);
        return $pdf->stream('hdtuto.pdf');
    }


}   
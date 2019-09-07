<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use Cart;

class CartController extends Controller
{


    public function addCart(Request $request){
             // $qty = $request->qty;
                      // $productId = $request->productId;
                      // $productById = Product::find($productId);
                      //  echo '<pre>';
                      //   print_r($productById);
                    //----------------------------
                         // $qty = $request->qty;
                         // $productId = $request->productId;
                         // $productById =  Product::where("id",$productId)->first();
                         // echo '<pre>';
                         // print_r($productById);

                       
        $product = Product::find($request->productId);
        Cart::add([
        	'id' => $request->productId,
        	'name' => $product->productName,	
        	'price' => $product->productPrice,
        	'qty' => $request->qty,
            'options'=>[
                'image' => $product->productImage,
                'price' => $product->productPrice,
            ]
        ]);
    	
    	   return redirect('cart/show');
    }


    public function showCart(){
        $cartProduct = Cart::content();
    	return view('fontend.cart.showCart',['cartProduct'=>$cartProduct]);
    }
    public function deleteCart($id){
        Cart::remove($id);
        return redirect('cart/show');
    }
    public function updateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
         return redirect('cart/show');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Product;
Use App\Category;
class masterController extends Controller
{

    public function index(){

    	$publishedProduct = Product::where('publicationStatus',1)->get();
    	return view('fontEnd.home.homeContent',['publishedProduct'=>$publishedProduct]);

    }


    public function category($id){

    	$categoryPublishedProduct = Product::where('categoryId',$id)
    								->where('publicationStatus',1)
    	                            ->get();
    	                            // return $categoryPublishedProduct;
    	                            // exit;
    	return view('fontEnd.category.categoryContent',['categoryPublishedProduct'=>$categoryPublishedProduct]);


    }
    
    public function productDetails($id){
         
        // $ProductById = Product::find($id);
        $ProductById = Product::where('id',$id)->first();
        return view('fontEnd.product.productDetails',['ProductById'=>$ProductById]);
    }


}

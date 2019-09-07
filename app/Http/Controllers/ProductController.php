<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Category;
use\App\Manufacturer;
use\App\Product;
use DB;


class ProductController extends Controller
{


  public function addProduct(){
  $categories = Category::where('publicationStatus',1)->get();
  $manufacturers = Manufacturer::where('publicationStatus',1)->get();
   	return view('admin.product.addProduct',['categories'=>$categories,'manufacturers'=>$manufacturers]);

   }

   protected function storProductValidation($request){
      
    $this->validate($request, [
              'productName' => 'required|max:255',
              'categoryId' => 'required',
              'manufacturerId' => 'required',
              'productPrice' => 'required',
              'productQuantity' => 'required',
              'productShortDescription' => 'required',
              'productLongDescription' => 'required',
              'productImage' => 'required',
              'publicationStatus' => 'required',
          ]);
  }

   public function storProduct(Request $request){
   		//return $request->all();
   
   $this->storProductValidation($request);
   $productImage = $request->file('productImage');
   $name = $productImage->getClientOriginalName();
   $uploadPath = 'public/productImage/';
   $productImage->move($uploadPath, $name);
   $imageUrl = $uploadPath.$name;
   $this->storProductInfo($request,$imageUrl);
   return redirect('/product/add')->with('message','Product save successfully');
    }



  protected function storProductInfo($request,$imageUrl){

   $product = new Product();
   $product->productName = $request->productName;
   $product->categoryId = $request->categoryId;
   $product->manufacturerId = $request->manufacturerId;
   $product->productPrice = $request->productPrice;
   $product->productQuantity = $request->productQuantity;
   $product->productShortDescription = $request->productShortDescription;
   $product->productLongDescription = $request->productLongDescription;
   $product->productImage = $imageUrl;
   $product->publicationStatus = $request->publicationStatus;
   $product->save();

    }



  public function manageProduct(){
   
   $products = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
            ->select('products.id','products.productName','products.productPrice','products.productQuantity','products.publicationStatus','categories.categoryName', 'manufacturers.manufacturerName')
            ->get();
    return view('admin.product.manageProduct',['products'=>$products]);
  }



  public function viewProduct($id){
        $productById = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
            ->where('products.id',$id)
            ->select('products.*','categories.categoryName', 'manufacturers.manufacturerName')
            ->first();
            // echo "<pre>";
            // print_r($productById);
            // exit;
      return view('admin.product.viewProduct',['productById'=>$productById ]); 
      
    }



    public function editProduct($id){
        $productById = Product::where('id',$id)->first();
        $categories = Category::where('publicationStatus',1)->get();
        $manufacturers = Manufacturer::where('publicationStatus',1)->get();
        
        return view('admin.product.editProduct',['productById'=>$productById,'categories'=>$categories,'manufacturers'=>$manufacturers]);
    }



    public function updatetProduct(Request $request){
          /*   $this->validate($request, [
              'productName' => 'required|unique:products|max:255',
              'categoryId' => 'required',
              'manufacturerId' => 'required',
              'productPrice' => 'required',
              'productQuantity' => 'required',
              'productShortDescription' => 'required',
              'productLongDescription' => 'required',
              'productImage' => 'required',
              'publicationStatus' => 'required',
          ]);*/
       
               $product = Product::find($request->productId);
               $product->productName = $request->productName;
               $product->categoryId = $request->categoryId;
               $product->manufacturerId = $request->manufacturerId;
               $product->productPrice = $request->productPrice;
               $product->productQuantity = $request->productQuantity;
               $product->productShortDescription = $request->productShortDescription;
               $product->productLongDescription = $request->productLongDescription;
               $product->productImage = $this->imageExistStatus($request);
               $product->publicationStatus = $request->publicationStatus;
               $product->save();
               return redirect('/product/manage')->with('message','product update Succesfully');

               
      
       }
  
     private function imageExistStatus($request){
          $productById = Product::where('id',$request->productId)->first();
          $productImage = $request->file('productImage');
          if ($productImage) {
               unlink($productById->productImage);
               // $productImage = $request->file('productImage');
               $name = $productImage->getClientOriginalName();
               $uploadPath = 'public/productImage/';
               $productImage->move($uploadPath, $name);
               $imageUrl = $uploadPath.$name; 

         }else{
          
          $imageUrl = $productById->productImage;
         }
         return $imageUrl;
     }

 public function deletetProduct($id){
          $product= Product::find($id);
          $product->delete();
          return redirect('/product/manage')->with('message','Product delete Succesfully');

 }



}
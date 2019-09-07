@extends('admin.master')

@section('mainContent')
 </hr>


<div class="row">
   <div class="col-lg-12">
   		<h3 class="text-center text-success">{{Session::get('message')}}</h3>

   			
   		</hr>
       <!--  <form role="form"> -->
       	{!!Form::open(['url'=>'/product/update','method'=>'POST','class'=>'form-horizotal','enctype'=>'multipart/form-data','name'=>'editProduct'])!!}
            <div class="well">                            
            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Product Name</label>
                <div class="call-sm-10">
                <input type="text"  class="form-control" value="{{$productById->productName}}" name="productName" ">
                <input type="hidden"  class="form-control" value="{{$productById->id}}" name="productId" ">
                <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
                </div>
            </div> 

            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Category Name</label>
                <select class="form-control" name="categoryId">
                    <option>Select Category Name</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                  @endforeach                                               
                </select>
                
            </div>
            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Manufacturer Name</label>
                <select class="form-control" name="manufacturerId">
                    <option>Select Manufacturer Name</option>
                  @foreach($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
                  @endforeach                                               
                </select>
                
            </div>

            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Product Price</label>
                <div class="call-sm-10">
                <input type="number"  class="form-control" value="{{$productById->productPrice}}"name="productPrice" ">
                <span class="text-danger">{{$errors->has('productPrice')?$errors->first('productPrice'):''}}</span>
                </div>
            </div>

            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Product Quantity</label>
                <div class="call-sm-10">
                <input type="number"  class="form-control" value="{{$productById->productQuantity}}" name="productQuantity" ">
                <span class="text-danger">{{$errors->has('productQuantity')?$errors->first('productQuantity'):''}}</span>
                </div>
            </div>
                                        
                                       
            <div class="form-group">
                
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Product Short Description</label>
                
                <div class="call-sm-10">
                <textarea class="form-control"
                	name="productShortDescription" rows="5">{{$productById->productShortDescription}}</textarea>
                <span class="text-danger">{{$errors->has('productShortDescription')?$errors->first('productShortDescription'):''}}</span>
                </div>
            </div>

            <div class="form-group">
                
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Product Long Description</label>
                
                <div class="call-sm-10">
                <textarea class="form-control"  name="productLongDescription" rows="8">{{$productById->productLongDescription}}</textarea>
                <span class="text-danger">{{$errors->has('productLongDescription')?$errors->first('productLongDescription'):''}}</span>
                </div>
            </div>


            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Product Image</label>
                <div class="call-sm-10">
                <input type="file" name="productImage" accept="image/*">
                <img src = '{{asset($productById->productImage)}}' alt = '' height=150px width="150">
                <span class="text-danger">{{$errors->has('productImage')?$errors->first('productImage'):''}}</span>
                </div>
            </div>

            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Status</label>
                <select class="form-control" value="{{$productById->publicationStatus}}" name="publicationStatus">
                    <option>Select Publish Status</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                                               
                </select>
                
            </div>
            <div class="coll-sm-offset-2 coll-sm-10">                     
            	<button type="submit" name="btn"class="btn btn-success btn-block">Update Product
            	</button>
            </div>
           <!-- </form> -->
           {!!Form::close()!!}
          </div>  
          <script>
          document.forms['editProduct'].elements['publicationStatus'].value={{$productById->publicationStatus}}   
          document.forms['editProduct'].elements['categoryId'].value={{$productById->categoryId}}  
          document.forms['editProduct'].elements['manufacturerId'].value={{$productById->manufacturerId}}  
          </script>               
    </div>
</div>
            
        
@endsection
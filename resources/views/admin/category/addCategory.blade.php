@extends('admin.master')

@section('mainContent')
 </hr>


<div class="row">
   <div class="col-lg-12">
   		<h3 class="text-center text-success">{{Session::get('message')}}</h3>

   			
   		</hr>
       <!--  <form role="form"> -->
       	{!!Form::open(['url'=>'/category/save','method'=>'POST','class'=>'form-horizotal'])!!}
            <div class="well">                            
            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Text Input</label>
                <div class="call-sn-10">
                <input type="text"  class="form-control" name="categoryName" ">
                <span class="text-danger">{{$errors->has('categoryName')?$errors->first('categoryName'):''}}</span>
                </div>
            </div>
                                        
                                       
            <div class="form-group">
                
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Text area</label>
                
                  <div class="call-sn-10">
                <textarea class="form-control" name="categoryDescription" rows="8"></textarea>
                <span class="text-danger">{{$errors->has('categoryDescription')?$errors->first('categoryDescription'):''}}</span>
                </div>
            </div>

            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Status</label>
                <select class="form-control" name="publicationStatus">
                    <option>Select Publish Status</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                                               
                </select>
                
            </div>
            <div class="coll-sm-offset-2 coll-sm-10">                     
            	<button type="submit" name="btn"class="btn btn-success btn-block">Save Category
            	</button>
            </div>
           <!-- </form> -->
           {!!Form::close()!!}
          </div>                    
    </div>
</div>
            
        
@endsection
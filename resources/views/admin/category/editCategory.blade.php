@extends('admin.master')

@section('mainContent')
 </hr>


<div class="row">
   <div class="col-lg-12">
   		<h3 class="text-center text-success">{{Session::get('message')}}</h3>

   			
   		</hr>
       <!--  <form role="form"> -->
       	{!!Form::open(['url'=>'/category/update','method'=>'POST','class'=>'form-horizotal','name'=>'editCategory'])!!}
            <div class="well">                            
            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Text Input</label>
                <div class="call-sn-10">
                <input type="text"  value="{{$categoryById->categoryName}}" class="form-control" name="categoryName" ">
                <input type="hidden"  value="{{$categoryById->id}}" class="form-control" name="categoryId" ">
                </div>
            </div>
                                        
                                       
            <div class="form-group">
                
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Text area</label>
                
                  <div class="call-sn-10">
                <textarea class="form-control" name="categoryDescription" rows="8">{{$categoryById->categoryDescription}}</textarea>
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
            	<button type="submit" name="btn"class="btn btn-success btn-block">Update Category
            	</button>
            </div>
           <!-- </form> -->
           {!!Form::close()!!}
          </div>    
          <script>
            document.forms['editCategory'].elements['publicationStatus'].value={{$categoryById->publicationStatus}}
          </script>                
    </div>
</div>
            
        
@endsection
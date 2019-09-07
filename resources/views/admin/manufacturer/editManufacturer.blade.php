@extends('admin.master')
@section('mainContent')
 </hr>


<div class="row">
   <div class="col-lg-12">
   		<h3 class="text-center text-success"></h3>

   			
   		</hr>
       <!--  <form role="form"> -->
       	{!!Form::open(['url'=>'/manufacturer/update','method'=>'POST','class'=>'form-horizotal','name'=>'editManufacturer'])!!}
            <div class="well">                            
            <div class="form-group">
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Text Input</label>
                <div class="call-sn-10">
                <input type="text"  value="{{$ManufacturerById->manufacturerName}}" class="form-control" name="manufacturerName" ">
                <input type="hidden"  value="{{$ManufacturerById->id}}" class="form-control" name="manufacturerId" ">
                </div>
            </div>
                                        
                                       
            <div class="form-group">
                
                <label for="inpueEmail" class="col-sm-2 cotrol-label">Text area</label>
                
                  <div class="call-sn-10">
                <textarea class="form-control" name="manufacturerDescription" rows="8">{{$ManufacturerById->manufacturerDescription}}</textarea>
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
            document.forms['editManufacturer'].elements['publicationStatus'].value={{$ManufacturerById->publicationStatus}}
          </script>   

                        
    </div>
</div>
            
        
@endsection
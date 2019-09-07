@extends('fontEnd.master');
@section('title')
    Shipping
@endsection
@section('mainContent')
    <hr/>
<div class="container">
    <div class="row">
       <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{$customerById->lastName}}</b> you have to give us product shipping information to complite your valuable order. if your product shipping information & billing information are same the just press Save Shipping</div>
       </div>
    </div>
</div>

    <div class="container">
    <div class="row">
   <div class="col-lg-12">
        <h3 class="text-center">Shipping Form Here</h3>
        <hr/>
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        </hr>
       <!--  <form role="form"> -->
        {!!Form::open(['url'=>'/new/shipping','method'=>'POST','name'=>'shippingForm'])!!}
            <div class="well">                          
            <div class="form-group">
                <label for="firstName">Full Name</label>
                <input type="text"  value="{{$customerById->firstName.' '.$customerById->lastName}}" class="form-control" name="fullName">
                
            </div> 

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  value="{{$customerById->email}}" class="form-control" name="email">
                
            </div> 
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control"  name="address" rows="5">{{$customerById->address}}</textarea>
                
            </div> 
             <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" value="{{$customerById->phone}}" >
                
            </div> 

            <div class="form-group">
                <label>District Name</label>
                <select class="form-control"  name ="districtName">
                    <option>Select Division Name</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Sylhet">Sylhet</option>                                       
                </select>
            </div>
            <div class="coll-sm-offset-2 coll-sm-10">                     
                <button type="submit" name="btn"class="btn btn-success btn-block">Save Shipping
                </button>
            </div>
           <!-- </form> -->
           {!!Form::close()!!}
          </div>     
                     

</div>
</div>
  <script>
     document.forms['shippingForm'].elements['districtName'].value="{{$customerById->districtName}}" 
 </script>  

@endsection
@extends('fontEnd.master');
@section('title')
    Checkout
@endsection
@section('mainContent')
    <hr/>
<div class="container">
    <div class="row">
       <div class="col-lg-12">
            <div class="well lead text-center text-success">you have to complete your valuable your order. register then please sine up first</div>
       </div>
    </div>
</div>

    <div class="container">
    <div class="row">
   <div class="col-lg-6">
        <h3 class="text-center">Registation Form Here</h3>
        <hr/>
        <h3 class="text-center text-danger">{{Session::get('message')}}</h3>
        </hr>
       <!--  <form role="form"> -->
        {!!Form::open(['url'=>'/checkout/sineUp','method'=>'POST','class'=>'form-horizotal'])!!}
            <div class="well">                          
            <div class="form-group">
                <label for="inpueEmail">First Name</label>
                <input type="text"  class="form-control" name="firstName" required>
                <span class="text-danger">{{$errors->has('firstName')?$errors->first('firstName'):''}}</span> 
            </div> 

            <div class="form-group">
                <label for="inpueEmail">Last Name</label>
                <input type="text"  class="form-control" name="lastName" required>
                <span class="text-danger">{{$errors->has('lastName')?$errors->first('lastName'):''}}</span> 
            </div> 

            <div class="form-group">
                <label for="inpueEmail">Email</label>
                <input type="email"  class="form-control" name="email" required>
                <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span> 
            </div> 

            <div class="form-group">
                <label for="inpueEmail">Password</label>
                <input type="text"  class="form-control" name="password" required>
                <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span> 
            </div> 

            <div class="form-group">
                <label for="Address">Address</label>
                <textarea class="form-control" name="address" rows="5"></textarea>
                <span class="text-danger">{{$errors->has('address')?$errors->first('address'):''}}</span> 
            </div> 
             <div class="form-group">
                <label for="Address">Phone</label>
                <input class="form-control" type="text" name="phone" required>
                <span class="text-danger">{{$errors->has('phone')?$errors->first('phone'):''}}</span> 
            </div> 

            <div class="form-group">
                <label for="DivisionName">District Name</label>
                <select class="form-control" name="districtName" required>
                    <option>Select Division Name</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Sylhet">Sylhet</option>                                       
                </select>
            </div>

            <div class="coll-sm-offset-2 coll-sm-10">                     
                <button type="submit" name="btn"class="btn btn-success btn-block">Registation
                </button>
            </div>
           <!-- </form> -->
           {!!Form::close()!!}
          </div>                    
    </div>


       <div class="col-lg-6">
        <h3 class="text-center">Login Form Here</h3>
        <hr/>
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        </hr>
       <!--  <form role="form"> -->
        {!!Form::open(['url'=>'/checkout/customer/login','method'=>'POST','class'=>'form-horizotal'])!!}
            <div class="well">                         
            <div class="form-group">
                <label for="inpueEmail">Email</label>
                <input type="email"  class="form-control" name="email" required>
                <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span> 
            </div> 

            <div class="form-group">
                <label for="inpueEmail">Password</label>
                <input type="text"  class="form-control" name="password" required>
                <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span> 
            </div> 
            <div class="coll-sm-offset-2 coll-sm-10">                     
                <button type="submit" name="btn" class="btn btn-success btn-block">Login
                </button>
            </div>
           <!-- </form> -->
           {!!Form::close()!!}
          </div>                    
    </div>
</div>
</div>

@endsection
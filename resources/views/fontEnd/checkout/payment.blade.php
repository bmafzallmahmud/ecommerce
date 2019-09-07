@extends('fontEnd.master')
@section('title')
    Payment
@endsection
@section('mainContent')
    <hr/>
<div class="container">
    <div class="row">
       <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{Session::get('customerName')}}</b> you have to give us product shipping information to complite your valuable order. if your product shipping information & billing information are same the just press Save Shipping
            </div>
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
        {!!Form::open(['url'=>'checkout/rorde','method'=>'POST','class'=>'form-horizotal','id'=>'payment-form'])!!}
            <div class="well">                         
            <div class="form-group">
                <label for="inpueEmail">
                <input type="radio"  name="paymentType" value="Case">Case On delivery</label>
            </div> 
            <div class="form-group">
                <label for="inpueEmail">
                <input type="radio"  name="paymentType" value="Bikash">Bikash</label>
            </div> 
             <div class="form-group">
                <label for="inpueEmail">
                <input type="radio"  name="paymentType" value="Paypal">Paypal</label>
            </div> 
              <div class="form-group">
                <label for="inpueEmail">
                <input type="radio"  name="paymentType" value="SSL">SSL</label>
            </div> 
            <div class="form-group">
                <label for="inpueEmail">
                <input type="radio"  name="paymentType" value="STRIPE">STRIPE</label>
            </div> 
            <div class="box-footer"> 
            <script src="https://js.stripe.com/v3/"></script>
                <div class="form-row">
                <label for="card-element">
                Credit or debit card
                </label>
                <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>                   
                <button type="submit" name="btn"class="btn btn-success ">Payment
                </button>
            </div>
           <!-- </form> -->
        {!!Form::close()!!}
      </div>      
    </div>
</div>

@endsection
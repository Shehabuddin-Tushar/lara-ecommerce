@extends('frontend.master')

@section('title')
Myshop | checkout
@endsection
@section('maincontent')

<div class="container checkoutpage">

 <div class="row">

    <div class="col-lg-12">
     <div class="alert alert-info">
        
        <p>you have to login to complete your valuable order.if you are not register then please sign up first.</p>
     </div>
     </div>
  </div>
</div>


<div class="container">

 <div class="row">

  <div class="col-lg-6">
    <h3 class="text-center">Registration form here</h3>
    <hr>
     <div class="well box box-primary">
      {!! Form::open(['url'=>'/checkout/save','method'=>'POST'])!!}
        <div class="box-body">
          <div class="form-group">
             <label for="firstname" class="col-sm-4 control-label">Firstname</label>
             <input type="text" class="form-control" id="firstname" name="firstname" placeholder="enter your first name"/>
          </div>

           <div class="form-group">
             <label for="lastname" class="col-sm-4 control-label">Lastname</label>
             <input type="text" class="form-control" id="lastname" name="lastname" placeholder="enter your last name"/>
          </div>


          <div class="form-group">
             <label for="email" class="col-sm-4 control-label">Email address</label>
             <input type="text" class="form-control" id="email" name="email" placeholder="enter your email"/>
          </div>
          
          <div class="form-group">
             <label for="password" class="col-sm-4 control-label">Password</label>
             <input type="text" class="form-control" id="password" name="password" placeholder="enter your password"/>
          </div>

          <div class="form-group">
             <label for="address" class="col-sm-4 control-label">Address</label>
             <textarea class="form-control" id="address" name="addrress" placeholder="enter your address"></textarea>
          </div>

          <div class="form-group">
             <label for="phone" class="col-sm-4 control-label">Phone number</label>
             <input type="text" class="form-control" id="phone" name="phone" placeholder="enter your phone number"/>
          </div>

        <div class="form-group">
          <label for="distname" class="col-sm-4 control-label">Dist. name</label>
          
           <select class="form-control" name="distname">
             <option value=''>select district name</option>
              <option value="Dhaka">Dhaka</option>
              <option value="Narayangonj">Narayangonj</option>
              <option value="savar">savar</option>
              <option value="comilla">comilla</option>
              <option value="Gazipur">Gazipur</option>
              <option value="Rajshahi">Rajshahi</option>


           </select>
          
       </div>



          </div>

      <div class="box-footer">

       <button type="submit" class="btn btn-primary btn-block">submit</button>
      </div>

     {!! Form::close() !!}
        </div>
     </div>



     <div class="col-lg-6">
    <h3 class="text-center">Login form here</h3>
    <hr>
     <div class="well box box-primary">
      {!! Form::open(['url'=>'/checkout/save','method'=>'POST'])!!}
        <div class="box-body">
          

          <div class="form-group">
             <label for="email" class="col-sm-4 control-label">Email address</label>
             <input type="text" class="form-control" id="email" name="email" placeholder="enter your email"/>
          </div>
          
          <div class="form-group">
             <label for="password" class="col-sm-4 control-label">Password</label>
             <input type="text" class="form-control" id="password" name="password" placeholder="enter your password"/>
          </div>

         


          </div>

      <div class="box-footer">

       <button type="submit" class="btn btn-primary btn-block">submit</button>
      </div>

     {!! Form::close() !!}
        </div>
     </div>
  </div>
</div>



@endsection
@extends('frontend.master')

@section('title')
Myshop | cart
@endsection
@section('maincontent')


<!-- check out -->
<div class="checkout">
  <div class="container">
    <h3>My Shopping Bag</h3>

    <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
      <?php if(Session::get('updatemessage')): ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('updatemessage')}}</p>
     </div>
      <?php endif; ?>

    <?php if(Session::get('deletemessage')): ?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('deletemessage')}}</p>
     </div>
      <?php endif; ?>
      <table class="timetable_sub">
        <thead>
          <tr>
            <th>Remove</th>
            <th>Serial no</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <?php

       $i=1;
       $total=0;

       ?>

        @foreach($cartproducts as $cartproduct)
          <tr class="rem1">
            <td class="invert-closeb">
              <div class="rem">
                <a onclick="return confirm('are you sure to delete this data')" href="{{url('/cart-delete/'.$cartproduct->rowId)}}" class="btn btn-danger">
           <span class="glyphicon glyphicon-trash"></span>
          </a>
              </div>
             
            </td>
            
            <td class="invert">{{ $i++ }}</a></td>
            <td class="invert">{{$cartproduct->name}}</td>
            <td class="invert">
               <div class="quantity"> 
                 {!! Form::open(['url'=>'/cart-update','method'=>'POST'])!!}
                   <input type="number" value="{{$cartproduct->qty}}" min="1" name="qty"/>
                   <input type="hidden" value="{{$cartproduct->rowId}}"name="rowId"/>
                  <input type="submit" value="update"/>

                 {!! Form::close() !!}
              </div>
            </td>

            
            <td class="invert">${{$cartproduct->price}}</td>
            <?php
               $subtotal=$cartproduct->price*$cartproduct->qty;

               

            ?>
            <td class="invert">${{$subtotal}}</td>
            
          </tr>
          
         @endforeach      
      </table>
    </div>





    <div class="checkout-left"> 
        
        <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
          <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
          <a href="{{url('/checkout')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>

        </div>
        <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
          <h4>Shopping basket</h4>
          <ul>

            @foreach($cartproducts as $cartproduct)
            <li>{{$cartproduct->name}}<i>({{$cartproduct->qty}})</i> <span>${{$cartproduct->price*$cartproduct->qty}}</span></li>

             <?php
               $subtotal=$cartproduct->price*$cartproduct->qty;

               $total=$total+$subtotal;

            ?>
            @endforeach
             <hr>
            <li>Total <i>-</i> <span>${{$total}}</span></li>
           
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
  </div>
</div>  
<!-- //check out -->

@endsection
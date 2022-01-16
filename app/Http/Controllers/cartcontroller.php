<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;

use Cart;

class cartcontroller extends Controller
{
    

   public function addTocart(Request $request){

   	

    $productid=$request->productid;
    $quantity=$request->qty;


    $productbyid=product::where('id',$productid)->first();

     Cart::add([

             'id'=>$productid,
             'name'=>$productbyid->productname,
             'price'=>$productbyid->productprice,
             'qty'=>$quantity,


     	]);

     return redirect('/cart-show');


   }

  public function cartshow(){

   $cartproducts=Cart::content();


      return view('frontend.cart.showcart',['cartproducts'=>$cartproducts]);
 }


  public function cartupdate(Request $request){

  Cart::update($request->rowId,$request->qty);

   return redirect('/cart-show')->with('updatemessage','Your shopping cart updated successfully');

  }

  public function cartdelete($rowId){

     Cart::remove($rowId);

      return redirect('/cart-show')->with('deletemessage','Your product deleted successfully');

  }

   public function cartempty(){

     $cartproducts=Cart::content();

     foreach($cartproducts as $cartproduct){

       Cart::remove($cartproduct->rowId);

     }

    

  

    return redirect('/');

  }
}

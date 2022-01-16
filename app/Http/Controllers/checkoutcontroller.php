<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkoutcontroller extends Controller
{
    

    public function index(){


  return view('frontend.checkout.checkoutcontent');

    }
}

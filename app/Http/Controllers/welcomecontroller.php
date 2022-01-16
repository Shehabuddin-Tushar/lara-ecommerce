<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomecontroller extends Controller
{
    

public function index(){


return view('frontend.home.homecontent');

}


public function category(){


return view('frontend.category.categorycontent');

}

public function singleproduct(){


return view('frontend.product.productdetails');

}



    
}

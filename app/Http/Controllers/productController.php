<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;

use App\manufacture;

use App\product;

use DB;


class productController extends Controller
{
   public function createproduct(){


    
    $categories=category::all();
    $manufactures=manufacture::all();
    return view('admin.product.createproduct',['categories'=>$categories,'manufactures'=>$manufactures]);


   }


  public function productstore(Request $request){

     $this->validate($request, [
    'productname'=>'required',

    'categoryid' => 'required',
    'subcategoryid' => 'required',
    'manufactureid' => 'required',
    'productshortdescription' => 'required',
    'productlongdescription' => 'required',
    'productquantity' => 'required',
    'productprice' => 'required',
    'productimage' => 'required|image|mimes:jpeg,gif,png,jpg|max:2048',
    'featurename' => 'required',
    'publicationstatus' => 'required'
     ]);
       
   

     $productimage=$request->file('productimage');

     $name=$productimage->getClientOriginalName();
     $imgname=rand().'.'.$productimage->getClientOriginalExtension();
     $uploadpath='public/productimage/';
     $productimage->move($uploadpath,$imgname);
     $imageuri=$uploadpath.$imgname;
     $product=new product();


     
     $product->productname=$request->productname;
     $product->categoryid=$request->categoryid;
     $product->subcategoryid=$request->subcategoryid;
     $product->manufactureid=$request->manufactureid;
     $product->productshortdescription=$request->productshortdescription;
     $product->productlongdescription=$request->productlongdescription;
     $product->productquantity=$request->productquantity;
     $product->productprice=$request->productprice;
     $product->productimage=$imageuri;
     $product->featurename=$request->featurename;
     $product->publicationstatus=$request->publicationstatus;
     $product->save();

     return redirect('/product/add')->with('message','product created successfully');

	}

    public function productmanage(){


     $products=product::paginate(5);
     return view('admin.product.manageproduct',['products'=>$products]);

    }

    public function productedit($id){


    $productbyid=DB::table('products')
            ->join('categories', 'products.categoryid', '=', 'categories.id')
            ->join('manufactures', 'products.manufactureid', '=', 'manufactures.id')
            ->select('products.*', 'categories.categoryname', 'manufactures.manufacturename')
            ->where('products.id',$id)
            ->first();

  

    $categories=category::all();
    $manufactures=manufacture::all();

    return view('admin.product.editproduct',['productbyid'=>$productbyid,'categories'=>$categories,'manufactures'=>$manufactures]);


    }

 public function productupdate(Request $request){
   
   $productbyid=product::where('id',$request->productid)->first();

   $this->validate($request, [
    'productname'=>'required',

    'categoryid' => 'required',
    'subcategoryid' => 'required',
    'manufactureid' => 'required',
    'productshortdescription' => 'required',
    'productlongdescription' => 'required',
    'productquantity' => 'required',
    'productprice' => 'required',
    'productimage' => 'image|mimes:jpeg,gif,png,jpg|max:2048',
    'featurename' => 'required',
    'publicationstatus' => 'required'
     ]);
       
   $productimage=$request->file('productimage');

  if($productimage){
   
     unlink($productbyid->productimage);

     $productimage=$request->file('productimage');

     $name=$productimage->getClientOriginalName();
     $imgname=rand().'.'.$productimage->getClientOriginalExtension();
     $uploadpath='public/productimage/';
     $productimage->move($uploadpath,$imgname);
     $imageuri=$uploadpath.$imgname;

     $product=product::find($request->productid);


     
     $product->productname=$request->productname;
     $product->categoryid=$request->categoryid;
     $product->subcategoryid=$request->subcategoryid;
     $product->manufactureid=$request->manufactureid;
     $product->productshortdescription=$request->productshortdescription;
     $product->productlongdescription=$request->productlongdescription;
     $product->productquantity=$request->productquantity;
     $product->productprice=$request->productprice;
     $product->productimage=$imageuri;
     $product->featurename=$request->featurename;
     $product->publicationstatus=$request->publicationstatus;
     $product->save();


  }else{

     $productimage=$productbyid->productimage;
     
     $product=product::find($request->productid);


     
     $product->productname=$request->productname;
     $product->categoryid=$request->categoryid;
     $product->subcategoryid=$request->subcategoryid;
     $product->manufactureid=$request->manufactureid;
     $product->productshortdescription=$request->productshortdescription;
     $product->productlongdescription=$request->productlongdescription;
     $product->productquantity=$request->productquantity;
     $product->productprice=$request->productprice;
     $product->productimage=$productimage;
     $product->featurename=$request->featurename;
     $product->publicationstatus=$request->publicationstatus;
     $product->save();
  
  
  }

   return redirect('/product/manage')->with('message','product updated successfully');
    

 }


 public function productdelete($id){

   
       $product=product::find($id);
       unlink($product->productimage);
       $product->delete();
       


       return redirect('/product/manage')->with('message','product info deleted successfully');


 }

 public function productsearch(Request $request){

   
   if($request->search){

       $searchs=DB::table('manufactures')
                ->where('categoryid',$request->search)
                ->get();
                ?>
 <select  class="form-control" id="manufacture" name="manufactureid">
    <option value=''>select manufacture</option>
    <?php
    if($searchs){
      
        
        foreach($searchs as $key=>$search){


           
            echo "<option value='$search->id'>$search->manufacturename</option>";
            echo"</br>";

       }
         
       
    } ?>
</select>

    <?php
   
     }
 }

 public function productsubcategorysearch(Request $request){

   
   if($request->categorysearch){

       $subcategorysearchs=DB::table('subcategories')
                ->where('categoryid',$request->categorysearch)
                ->get();
      

               ?>
 <select  class="form-control" id="subcategory" name="subcategoryid">
    <option value=''>select subcategory</option>
    <?php
    if($subcategorysearchs){
      
        
        foreach($subcategorysearchs as $key=>$subcategorysearch){


           
            echo "<option value='$subcategorysearch->id'>$subcategorysearch->subcategoryname</option>";
            echo"</br>";

       }
         
       
    } ?>
</select>

    <?php
   
     }
 }



//manufacture search by category and selected manufacture selected by ajax
 public function productmanufacturebycategory(Request $request){


$product=DB::table('products')
                ->where('id',$request->productid)
                ->first();

            $productmanufactureid=$product->manufactureid;

if($request->search){

       $searchs=DB::table('manufactures')
                ->where('categoryid',$request->search)
                ->get();



   

                ?>
 <select  class="form-control" id="manufacture" name="manufactureid">
    
    <?php
    if($searchs){
      
        
        foreach($searchs as $key=>$search){

           
           if($search->id==$productmanufactureid){
             echo "<option selected value='$search->id'>$search->manufacturename</option>";
             echo"</br>";

           }else{

            echo "<option value='$search->id'>$search->manufacturename</option>";
            echo"</br>";

           }
           
            

       }
         
       
    } ?>
</select>

    <?php
   
     }
}
///////////////////////end//////////////

//subcategory search by category and selected subcategory selected by ajax
 public function productsubcategorybycategory(Request $request){


$product=DB::table('products')
                ->where('id',$request->productid)
                ->first();

            $productsubcategoryid=$product->subcategoryid;

if($request->categorysearch){

       $subcategorysearchs=DB::table('subcategories')
                ->where('categoryid',$request->categorysearch)
                ->get();



   

                ?>
 <select  class="form-control" id="subcategory" name="subcategoryid">
    
    <?php
    if($subcategorysearchs){
      
        
        foreach($subcategorysearchs as $key=>$subcategorysearch){

           
           if($subcategorysearch->id==$productsubcategoryid){
             echo "<option selected value='$subcategorysearch->id'>$subcategorysearch->subcategoryname</option>";
             echo"</br>";

           }else{

            echo "<option value='$subcategorysearch->id'>$subcategorysearch->subcategoryname</option>";
            echo"</br>";

           }
           
            

       }
         
       
    } ?>
</select>

    <?php
   
     }






 
}
 






 }
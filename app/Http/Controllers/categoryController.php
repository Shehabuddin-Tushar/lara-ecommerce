<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;


class categoryController extends Controller
{


	public function createcategory(){


      return view('admin.category.createcategory');


	}


	public function categorystore(Request $request){

     $this->validate($request, [
    'categoryname' => 'required|unique:categories,categoryname',
    'categorydescription' => 'required',
    'categoryimage' => 'required|image|mimes:jpeg,gif,png,jpg|max:2048',
    'categorytitleimage' => 'required|image|mimes:jpeg,gif,png,jpg|max:2048',
    'publicationstatus' => 'required',
     ]);
     
     $categoryimage=$request->file('categoryimage');
     $categorytitleimage=$request->file('categorytitleimage');
      
    

     $name=$categoryimage->getClientOriginalName();
     $imgname=rand().$request->categoryname.'.'.$categoryimage->getClientOriginalExtension();
     $uploadpath='public/categoryimage/';
     $categoryimage->move($uploadpath,$imgname);
     $imageuri=$uploadpath.$imgname; 

     $nametitleimage=$categorytitleimage->getClientOriginalName();
     $titleimgname=$request->categoryname.rand().'.'.$categorytitleimage->getClientOriginalExtension();
     $uploadpath='public/categoryimage/';
     $categorytitleimage->move($uploadpath,$titleimgname);
     $titleimageuri=$uploadpath.$titleimgname; 



     $category=new category();

     $category->categoryname=$request->categoryname;
     $category->categorydescription=$request->categorydescription;
     $category->categoryimage=$imageuri;
     $category->categorytitleimage=$titleimageuri;
     $category->publicationstatus=$request->publicationstatus;
     $category->save();

     return redirect('/category/add')->with('message','category created successfully');
         


	}
   

   public function categorymanage(){

    $categories=category::paginate(3);

      return view('admin.category.managecategory',['categories'=>$categories]);



   }

   public function categoryedit($id){

    $categorybyid=category::where('id',$id)->first();

    return view('admin.category.editcategory',['categorybyid'=>$categorybyid]); 



   }

   public function categoryupdate(Request $request){
   
     $categorybyid=category::where('id',$request->categoryid)->first();


    $this->validate($request, [
    'categoryname' => 'required',
    'categorydescription' => 'required',
    'categoryimage' => 'image|mimes:jpeg,gif,png,jpg|max:2048',
    'categorytitleimage' => 'image|mimes:jpeg,gif,png,jpg|max:2048',
    'publicationstatus' => 'required',
     ]);
       
     $categoryimage=$request->file('categoryimage');
     $categorytitleimage=$request->file('categorytitleimage');
     
     if($categoryimage && $categorytitleimage){

      unlink($categorybyid->categoryimage);
      unlink($categorybyid->categorytitleimage);

    

     $name=$categoryimage->getClientOriginalName();
     $imgname=rand().$request->categoryname.'.'.$categoryimage->getClientOriginalExtension();
     $uploadpath='public/categoryimage/';
     $categoryimage->move($uploadpath,$imgname);
     $imageuri=$uploadpath.$imgname;

     $nametitleimage=$categorytitleimage->getClientOriginalName();
     $titleimgname=$request->categoryname.rand().'.'.$categorytitleimage->getClientOriginalExtension();
     $uploadpath='public/categoryimage/';
     $categorytitleimage->move($uploadpath,$titleimgname);
     $titleimageuri=$uploadpath.$titleimgname;

     $category=category::find($request->categoryid);

     $category->categoryname=$request->categoryname;
     $category->categorydescription=$request->categorydescription;
     $category->categoryimage=$imageuri;
     $category->categoryimage=$titleimageuri;
     $category->publicationstatus=$request->publicationstatus;
     $category->save();   

     }elseif($categoryimage){
    

      unlink($categorybyid->categoryimage);

    

     $name=$categoryimage->getClientOriginalName();
     $imgname=rand().$request->categoryname.'.'.$categoryimage->getClientOriginalExtension();
     $uploadpath='public/categoryimage/';
     $categoryimage->move($uploadpath,$imgname);
     $imageuri=$uploadpath.$imgname;

     $category=category::find($request->categoryid);

     $category->categoryname=$request->categoryname;
     $category->categorydescription=$request->categorydescription;
     $category->categoryimage=$imageuri;
     $category->publicationstatus=$request->publicationstatus;
     $category->save();


     }elseif($categorytitleimage){


     unlink($categorybyid->categorytitleimage);

    

     $nametitleimage=$categorytitleimage->getClientOriginalName();
     $titleimgname=$request->categoryname.rand().'.'.$categorytitleimage->getClientOriginalExtension();
     $uploadpath='public/categoryimage/';
     $categorytitleimage->move($uploadpath,$titleimgname);
     $titleimageuri=$uploadpath.$titleimgname;
     $category=category::find($request->categoryid);

     $category->categoryname=$request->categoryname;
     $category->categorydescription=$request->categorydescription;
     $category->categorytitleimage=$titleimageuri;
     $category->publicationstatus=$request->publicationstatus;
     $category->save();





     }else{

           $categoryimage=$categorybyid->categoryimage;
           $categorytitleimage=$categorybyid->categorytitleimage;


           $category=category::find($request->categoryid);

           $category->categoryname=$request->categoryname;
           $category->categorydescription=$request->categorydescription;
           $category->categoryimage=$categoryimage;
           $category->categorytitleimage=$categorytitleimage;
           $category->publicationstatus=$request->publicationstatus;
           $category->save();

     }
    

     return redirect('/category/manage')->with('message','category info updated successfully');




   }

    public function categorydelete($id){

    $category=category::find($id);
    unlink($category->categoryimage);
    unlink($category->categorytitleimage);
    $category->delete();


    return redirect('/category/manage')->with('message','category info deleted successfully');


   }
}

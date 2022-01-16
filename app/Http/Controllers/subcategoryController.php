<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;

use App\subcategory;

use DB;

class subcategoryController extends Controller
{
    


   public function createsubcategory(){

      $categories=category::all();
      return view('admin.subcategory.createsubcategory',['categories'=>$categories]);


   }

   public function subcategorystore(Request $request){

    $this->validate($request, [
    
    'categoryid' => 'required',
    'subcategoryname' => 'required',
    'subcategorydescriptiontitle' => 'required',
    'subcategorydescription' => 'required',
    'subcategoryimage' => 'required|image|mimes:jpeg,gif,png,jpg|max:2048',
    'subcategorysliderimageone' => 'required|image|mimes:jpeg,gif,png,jpg|max:2048',
    'subcategorysliderimagetwo' => 'required|image|mimes:jpeg,gif,png,jpg|max:2048',
    'publicationstatus' => 'required'
     ]);
       
   

     $subcategoryimage=$request->file('subcategoryimage');
     $nameone=$subcategoryimage->getClientOriginalName();
     $imgnameone=rand().'.'.$subcategoryimage->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategoryimage->move($uploadpath,$imgnameone);
     $imageurione=$uploadpath.$imgnameone;


     $subcategorysliderimageone=$request->file('subcategorysliderimageone');
     $nametwo=$subcategorysliderimageone->getClientOriginalName();
     $imgnametwo=rand().'.'.$subcategorysliderimageone->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimageone->move($uploadpath,$imgnametwo);
     $imageuritwo=$uploadpath.$imgnametwo;


     $subcategorysliderimagetwo=$request->file('subcategorysliderimagetwo');
     $namethree=$subcategorysliderimagetwo->getClientOriginalName();
     $imgnamethree=rand().'.'.$subcategorysliderimagetwo->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimagetwo->move($uploadpath,$imgnamethree);
     $imageurithree=$uploadpath.$imgnamethree;
     


     $subcategory=new subcategory();
     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->subcategoryimage=$imageurione;
     $subcategory->subcategorysliderimageone=$imageuritwo;
     $subcategory->subcategorysliderimagetwo=$imageurithree;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();

     return redirect('/subcategory/add')->with('message','subcategory created successfully');


   }


   public function subcategorymanage(){


    $subcategoriess=DB::table('subcategories')
            ->join('categories', 'subcategories.categoryid', '=', 'categories.id')
          
            ->select('subcategories.*', 'categories.categoryname')
            
            ->paginate(5);

     
     return view('admin.subcategory.managesubcategory',['subcategories'=>$subcategoriess]);


   }

    public function subcategoryedit($id){
    
    $categories=category::all();
    $subcategorybyid=subcategory::where('id',$id)->first();

    return view('admin.subcategory.editsubcategory',['subcategorybyid'=>$subcategorybyid,'categories'=>$categories]); 



   }


   public function subcategoryupdate(Request $request){

    $subcategorybyid=subcategory::where('id',$request->subcategoryid)->first();
    $subcategory=new subcategory();  
    $subcategory=subcategory::find($request->subcategoryid);

    $this->validate($request, [
    
    'categoryid' => 'required',
    'subcategoryname' => 'required',
    'subcategorydescriptiontitle' => 'required',
    'subcategorydescription' => 'required',
    'subcategoryimage' => 'image|mimes:jpeg,gif,png,jpg|max:2048',
    'subcategorysliderimageone' => 'image|mimes:jpeg,gif,png,jpg|max:2048',
    'subcategorysliderimagetwo' => 'image|mimes:jpeg,gif,png,jpg|max:2048',
    'publicationstatus' => 'required'
     ]);
       


     $subcategoryimage=$request->file('subcategoryimage');
     $subcategorysliderimageone=$request->file('subcategorysliderimageone');
     $subcategorysliderimagetwo=$request->file('subcategorysliderimagetwo');


     if($subcategoryimage && $subcategorysliderimageone && $subcategorysliderimagetwo){
       
       unlink($subcategorybyid->subcategoryimage);
       unlink($subcategorybyid->subcategorysliderimageone); 
       unlink($subcategorybyid->subcategorysliderimagetwo);    


     $subcategoryimage=$request->file('subcategoryimage');
     $nameone=$subcategoryimage->getClientOriginalName();
     $imgnameone=rand().'.'.$subcategoryimage->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategoryimage->move($uploadpath,$imgnameone);
     $imageurione=$uploadpath.$imgnameone;


     $subcategorysliderimageone=$request->file('subcategorysliderimageone');
     $nametwo=$subcategorysliderimageone->getClientOriginalName();
     $imgnametwo=rand().'.'.$subcategorysliderimageone->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimageone->move($uploadpath,$imgnametwo);
     $imageuritwo=$uploadpath.$imgnametwo;


     $subcategorysliderimagetwo=$request->file('subcategorysliderimagetwo');
     $namethree=$subcategorysliderimagetwo->getClientOriginalName();
     $imgnamethree=rand().'.'.$subcategorysliderimagetwo->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimagetwo->move($uploadpath,$imgnamethree);
     $imageurithree=$uploadpath.$imgnamethree;
     


     
     $subcategory->subcategoryimage=$imageurione;
     $subcategory->subcategorysliderimageone=$imageuritwo;
     $subcategory->subcategorysliderimagetwo=$imageurithree;

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();
   



     }elseif($subcategoryimage && $subcategorysliderimageone){
      
      unlink($subcategorybyid->subcategoryimage);
      unlink($subcategorybyid->subcategorysliderimageone); 
         


     $subcategoryimage=$request->file('subcategoryimage');
     $nameone=$subcategoryimage->getClientOriginalName();
     $imgnameone=rand().'.'.$subcategoryimage->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategoryimage->move($uploadpath,$imgnameone);
     $imageurione=$uploadpath.$imgnameone;


     $subcategorysliderimageone=$request->file('subcategorysliderimageone');
     $nametwo=$subcategorysliderimageone->getClientOriginalName();
     $imgnametwo=rand().'.'.$subcategorysliderimageone->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimageone->move($uploadpath,$imgnametwo);
     $imageuritwo=$uploadpath.$imgnametwo;


    


     
     $subcategory->subcategoryimage=$imageurione;
     $subcategory->subcategorysliderimageone=$imageuritwo;
     $subcategory->subcategorysliderimagetwo=$subcategorybyid->subcategorysliderimagetwo;

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();
        
        
     }elseif($subcategoryimage && $subcategorysliderimagetwo){
            
      unlink($subcategorybyid->subcategoryimage);
      unlink($subcategorybyid->subcategorysliderimagetwo); 
         


     $subcategoryimage=$request->file('subcategoryimage');
     $nameone=$subcategoryimage->getClientOriginalName();
     $imgnameone=rand().'.'.$subcategoryimage->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategoryimage->move($uploadpath,$imgnameone);
     $imageurione=$uploadpath.$imgnameone;


     $subcategorysliderimagetwo=$request->file('subcategorysliderimagetwo');
     $namethree=$subcategorysliderimagetwo->getClientOriginalName();
     $imgnamethree=rand().'.'.$subcategorysliderimagetwo->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimagetwo->move($uploadpath,$imgnamethree);
     $imageurithree=$uploadpath.$imgnamethree;

    


     
     $subcategory->subcategoryimage=$imageurione;
     $subcategory->subcategorysliderimageone=$subcategorybyid->subcategorysliderimageone;
     $subcategory->subcategorysliderimagetwo=$imageurithree;

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();
             

     }elseif($subcategorysliderimageone && $subcategorysliderimagetwo){

      
       unlink($subcategorybyid->subcategorysliderimageone); 
       unlink($subcategorybyid->subcategorysliderimagetwo);    


  


     $subcategorysliderimageone=$request->file('subcategorysliderimageone');
     $nametwo=$subcategorysliderimageone->getClientOriginalName();
     $imgnametwo=rand().'.'.$subcategorysliderimageone->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimageone->move($uploadpath,$imgnametwo);
     $imageuritwo=$uploadpath.$imgnametwo;


     $subcategorysliderimagetwo=$request->file('subcategorysliderimagetwo');
     $namethree=$subcategorysliderimagetwo->getClientOriginalName();
     $imgnamethree=rand().'.'.$subcategorysliderimagetwo->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimagetwo->move($uploadpath,$imgnamethree);
     $imageurithree=$uploadpath.$imgnamethree;
     


     
     $subcategory->subcategoryimage=$subcategorybyid->subcategoryimage;
     $subcategory->subcategorysliderimageone=$imageuritwo;
     $subcategory->subcategorysliderimagetwo=$imageurithree;

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();

     }elseif($subcategoryimage){
         
         unlink($subcategorybyid->subcategoryimage);
          


     $subcategoryimage=$request->file('subcategoryimage');
     $nameone=$subcategoryimage->getClientOriginalName();
     $imgnameone=rand().'.'.$subcategoryimage->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategoryimage->move($uploadpath,$imgnameone);
     $imageurione=$uploadpath.$imgnameone;




     
     $subcategory->subcategoryimage=$imageurione;
     $subcategory->subcategorysliderimageone=$subcategorybyid->subcategorysliderimageone;
     $subcategory->subcategorysliderimagetwo=$subcategorybyid->subcategorysliderimagetwo;

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();
       

     }elseif($subcategorysliderimageone){

       
       unlink($subcategorybyid->subcategorysliderimageone); 
          



     $subcategorysliderimageone=$request->file('subcategorysliderimageone');
     $nametwo=$subcategorysliderimageone->getClientOriginalName();
     $imgnametwo=rand().'.'.$subcategorysliderimageone->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimageone->move($uploadpath,$imgnametwo);
     $imageuritwo=$uploadpath.$imgnametwo;


     


     
     $subcategory->subcategoryimage=$subcategorybyid->subcategoryimage;
     $subcategory->subcategorysliderimageone=$imageuritwo;
     $subcategory->subcategorysliderimagetwo=$subcategorybyid->subcategorysliderimagetwo;

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save(); 

     }elseif($subcategorysliderimagetwo){
        

       unlink($subcategorybyid->subcategorysliderimagetwo);    


   


     $subcategorysliderimagetwo=$request->file('subcategorysliderimagetwo');
     $namethree=$subcategorysliderimagetwo->getClientOriginalName();
     $imgnamethree=rand().'.'.$subcategorysliderimagetwo->getClientOriginalExtension();
     $uploadpath='public/subcategoryimage/';
     $subcategorysliderimagetwo->move($uploadpath,$imgnamethree);
     $imageurithree=$uploadpath.$imgnamethree;
     


     
     $subcategory->subcategoryimage=$subcategorybyid->subcategoryimage;
     $subcategory->subcategorysliderimageone=$subcategorybyid->subcategorysliderimageone;
     $subcategory->subcategorysliderimagetwo=$imageurithree; 

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();   

     }else{


     $subcategory->subcategoryimage=$subcategorybyid->subcategoryimage;
     $subcategory->subcategorysliderimageone=$subcategorybyid->subcategorysliderimageone;
     $subcategory->subcategorysliderimagetwo=$subcategorybyid->subcategorysliderimagetwo;

     $subcategory->categoryid=$request->categoryid;
     $subcategory->subcategoryname=$request->subcategoryname;
     $subcategory->subcategorydescriptiontitle=$request->subcategorydescriptiontitle;
     $subcategory->subcategorydescription=$request->subcategorydescription;
     $subcategory->publicationstatus=$request->publicationstatus;
     $subcategory->save();  

     }

    return redirect('/subcategory/manage')->with('message','subcategory updated successfully');

   }


   public function subcategorydelete($id){

   
       $subcategory=subcategory::find($id);
       unlink($subcategory->subcategoryimage);
       unlink($subcategory->subcategorysliderimageone);
       unlink($subcategory->subcategorysliderimagetwo);
       $subcategory->delete();
       


       return redirect('/subcategory/manage')->with('message','subcategory info deleted successfully');


 }
}

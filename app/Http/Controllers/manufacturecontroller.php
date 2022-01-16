<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;

use App\manufacture;

class manufacturecontroller extends Controller
{
    

   public function createmanufacture(){

      
      $categories=category::all();
      return view('admin.manufacture.createmanufacture',['categories'=>$categories]);


	}

	public function manufacturestore(Request $request){

     $this->validate($request, [
    'categoryid' => 'required',
    'manufacturename' => 'required|unique:manufactures,manufacturename',
    'manufacturedescription' => 'required',
    'publicationstatus' => 'required',
     ]);
       
    $manufacture=new manufacture();
     
     $manufacture->categoryid=$request->categoryid;
     $manufacture->manufacturename=$request->manufacturename;
     $manufacture->manufacturedescription=$request->manufacturedescription;
     $manufacture->publicationstatus=$request->publicationstatus;
     $manufacture->save();

     return redirect('/manufacture/add')->with('message','manufacture created successfully');
         


	}

  public function manufacturemanage(){

    $manufactures=manufacture::paginate(3);

      return view('admin.manufacture.managemanufacture',['manufactures'=>$manufactures]);



   }


    public function manufactureedit($id){
    
    $categories=category::all();
    $manufacturebyid=manufacture::where('id',$id)->first();

    return view('admin.manufacture.editmanufacture',['manufacturebyid'=>$manufacturebyid,'categories'=>$categories]); 
     

     }


  public function manufactureupdate(Request $request){

    $this->validate($request, [
    'categoryid' => 'required',
    'manufacturename' => 'required',
    'manufacturedescription' => 'required',
    'publicationstatus' => 'required',
     ]);
       


     $manufacture=manufacture::find($request->manufactureid);

     $manufacture->categoryid=$request->categoryid;
     $manufacture->manufacturename=$request->manufacturename;
     $manufacture->manufacturedescription=$request->manufacturedescription;
     $manufacture->publicationstatus=$request->publicationstatus;
     $manufacture->save();

     return redirect('/manufacture/manage')->with('message','manufacture info updated successfully');


   }

   public function manufacturedelete($id){

    $manufacture=manufacture::find($id);
    $manufacture->delete();


    return redirect('/manufacture/manage')->with('message','manufacture info deleted successfully');


   }
}

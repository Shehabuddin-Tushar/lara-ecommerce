@extends('admin.master')
@section('title')

Category edit

@endsection
@section('maincontent')

<div class="row">

 <div class="col-lg-12">

  <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
  <hr/>

  <div class="well">

    {!! Form::open(['url'=>'/category/update','class'=>'form-horizontal','method'=>'POST','name'=>'categoryformedit','enctype'=>'multipart/form-data'])!!}
  	

  	   <div class="form-group">
          <label for="category" class="col-sm-2 control-label">Category</label>
          <div class="col-sm-10">
            <input type="hidden" name="categoryid" value="{{$categorybyid->id}}"/>
          	<input type="text" class="form-control" id="category" name="categoryname" value="{{$categorybyid->categoryname}}"/>
            <span class="text-danger">{{ $errors->has('categoryname')?$errors->first('categoryname'):''}}</span>

          </div>

  	   </div>

  	   <div class="form-group">
          <label for="category" class="col-sm-2 control-label">category description</label>
          <div class="col-sm-10">
           <textarea class="form-control mceEditor" rows="8" name="categorydescription">{{$categorybyid->categorydescription}}</textarea>
           <span class="text-danger">{{ $errors->has('categorydescription')?$errors->first('categorydescription'):''}}</span>

          </div>

  	   </div>

        <div class="form-group">
          <label for="categorypriviousimage" class="col-sm-2 control-label">previous menu image</label>
          <div class="col-sm-10">
            
            <img src="{{asset($categorybyid->categoryimage)}}" height="200px" width="300px"/>

          </div>

       </div>

        <div class="form-group">
          <label for="categoryprivioustitleimage" class="col-sm-2 control-label">previous title image</label>
          <div class="col-sm-10">
            
            <img src="{{asset($categorybyid->categorytitleimage)}}" height="150px" width="500px"/>

          </div>

       </div>

       <div class="form-group">
          <label for="categoryimage" class="col-sm-2 control-label">category menu image</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="categoryimage" accept="image/*" name="categoryimage"/>
            <span class="text-danger">{{ $errors->has('categoryimage')?$errors->first('categoryimage'):''}}</span>

          </div>

       </div>

        <div class="form-group">
          <label for="categorytitleimage" class="col-sm-2 control-label">category title image</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="categorytitleimage" accept="image/*" name="categorytitleimage"/>
            <span class="text-danger">{{ $errors->has('categorytitleimage')?$errors->first('categorytitleimage'):''}}</span>

          </div>

       </div>

  	   <div class="form-group">
          <label for="category" class="col-sm-2 control-label">publication status</label>
          <div class="col-sm-10">
           <select class="form-control" name="publicationstatus">
           	<option value=''>select publication status</option>
           	<option value="1">published</option>
           	<option value="0">Unpublished</option>


           </select>
           <span class="text-danger">{{ $errors->has('publicationstatus')?$errors->first('publicationstatus'):''}}</span>
          </div>

  	   </div>

  	    <div class="form-group">
         
          <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-success btn-block">Save category</button>

          </div>

  	   </div>


  	{!! Form::close() !!}

  </div>


 </div>
 <script>

document.forms['categoryformedit'].elements['publicationstatus'].value="{{$categorybyid->publicationstatus}}";

 </script>

</div>


@endsection
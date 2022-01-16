@extends('admin.master')
@section('title')

Category create

@endsection
@section('maincontent')

<div class="row">

 <div class="col-lg-12">

  <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
  <hr/>

  <div class="well">

    {!! Form::open(['url'=>'/category/save','class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
  	

  	   <div class="form-group">
          <label for="category" class="col-sm-2 control-label">Category</label>
          <div class="col-sm-10">
          	<input type="text" class="form-control" id="category" name="categoryname"/>
            <span class="text-danger">{{ $errors->has('categoryname')?$errors->first('categoryname'):''}}</span>

          </div>

  	   </div>

  	   <div class="form-group">
          <label for="category" class="col-sm-2 control-label">category description</label>
          <div class="col-sm-10">
           <textarea class="form-control mceEditor" rows="8" name="categorydescription"></textarea>
           <span class="text-danger">{{ $errors->has('categorydescription')?$errors->first('categorydescription'):''}}</span>

          </div>

  	   </div>

       <div class="form-group">
          <label for="categoryimages" class="col-sm-2 control-label">category menu image</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="categoryimages" accept="image/*" name="categoryimage"/>
            <span class="text-danger">{{ $errors->has('categoryimage')?$errors->first('categoryimage'):''}}</span>

          </div>

       </div>

       <div class="form-group">
          <label for="categorytitleimages" class="col-sm-2 control-label">category title image</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="categorytitleimages" accept="image/*" name="categorytitleimage"/>
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

</div>


@endsection
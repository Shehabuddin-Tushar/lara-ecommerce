@extends('admin.master')
@section('title')
subcategory create

@endsection
@section('maincontent')

<div class="row">

 <div class="col-lg-12">

  <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
  <hr/>

  <div class="well">

    {!! Form::open(['url'=>'/subcategory/save','class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
  	
       <div class="form-group">
          <label for="category" class="col-sm-2 control-label">category select</label>
          <div class="col-sm-10">
           <select class="form-control" name="categoryid">
            <option value=''>select category</option>

            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->categoryname}}</option>
            @endforeach


           </select>
           <span class="text-danger">{{ $errors->has('categoryid')?$errors->first('categoryid'):''}}</span>
          </div>

       </div>



       <div class="form-group">
          <label for="subcategoryname" class="col-sm-2 control-label">subcategory name</label>
          <div class="col-sm-10">
          	<input type="text" class="form-control" id="subcategoryname" name="subcategoryname"/>
            <span class="text-danger">{{ $errors->has('subcategoryname')?$errors->first('subcategoryname'):''}}</span>

          </div>

  	   </div>

       <div class="form-group">
          <label for="subcategorytitle" class="col-sm-2 control-label">subcategory title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="subcategorytitle" name="subcategorydescriptiontitle"/>
            <span class="text-danger">{{ $errors->has('subcategorydescriptiontitle')?$errors->first('subcategorydescriptiontitle'):''}}</span>

          </div>

       </div>

  	   <div class="form-group">
          <label for="subcategorydescription"class="col-sm-2 control-label">subcategory description</label>
          <div class="col-sm-10">
           <textarea class="form-control mceEditor" rows="8" name="subcategorydescription"></textarea>
           <span class="text-danger">{{ $errors->has('subcategorydescription')?$errors->first('subcategorydescription'):''}}</span>

          </div>

  	   </div>

       <div class="form-group">
          <label for="subcategoryimages" class="col-sm-2 control-label">subcategory image</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="subcategoryimages" accept="image/*" name="subcategoryimage"/>
            <span class="text-danger">{{ $errors->has('subcategoryimage')?$errors->first('subcategoryimage'):''}}</span>

          </div>

       </div>

       <div class="form-group">
          <label for="subcategorysliderimageone" class="col-sm-2 control-label">subcategory slider image one</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="subcategorysliderimageone" accept="image/*" name="subcategorysliderimageone"/>
            <span class="text-danger">{{ $errors->has('subcategorysliderimageone')?$errors->first('subcategorysliderimageone'):''}}</span>

          </div>

       </div>

       <div class="form-group">
          <label for="subcategorysliderimagetwo" class="col-sm-2 control-label">subcategory slider image two</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="subcategorysliderimagetwo" accept="image/*" name="subcategorysliderimagetwo"/>
            <span class="text-danger">{{ $errors->has('subcategorysliderimagetwo')?$errors->first('subcategorysliderimagetwo'):''}}</span>

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
           <button type="submit" class="btn btn-success btn-block">Save manufacture</button>

          </div>

  	   </div>


  	{!! Form::close() !!}

  </div>


 </div>

</div>


@endsection
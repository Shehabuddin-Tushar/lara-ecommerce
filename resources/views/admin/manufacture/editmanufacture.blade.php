@extends('admin.master')
@section('title')

manufacture edit

@endsection
@section('maincontent')

<div class="row">

 <div class="col-lg-12">

  <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
  <hr/>

  <div class="well">

    {!! Form::open(['url'=>'/manufacture/update','class'=>'form-horizontal','method'=>'POST','name'=>'manufactureformedit'])!!}
  	
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
          <label for="manufacture" class="col-sm-2 control-label">manufacture</label>
          <div class="col-sm-10">
            <input type="hidden" name="manufactureid" value="{{$manufacturebyid->id}}"/>
          	<input type="text" class="form-control" id="manufacture" name="manufacturename" value="{{$manufacturebyid->manufacturename}}"/>
            <span class="text-danger">{{ $errors->has('manufacturename')?$errors->first('manufacturename'):''}}</span>

          </div>

  	   </div>

  	   <div class="form-group">
          <label for="category" class="col-sm-2 control-label">manufacture description</label>
          <div class="col-sm-10">
           <textarea class="form-control mceEditor" rows="8" name="manufacturedescription">{{$manufacturebyid->manufacturedescription}}</textarea>
           <span class="text-danger">{{ $errors->has('manufacturedescription')?$errors->first('manufacturedescription'):''}}</span>

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
           <button type="submit" class="btn btn-success btn-block">Update manufacture</button>

          </div>

  	   </div>


  	{!! Form::close() !!}

  </div>


 </div>
 <script>

document.forms['manufactureformedit'].elements['publicationstatus'].value="{{$manufacturebyid->publicationstatus}}";
document.forms['manufactureformedit'].elements['categoryid'].value="{{$manufacturebyid->categoryid}}";

 </script>

</div>


@endsection
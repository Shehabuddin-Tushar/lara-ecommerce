@extends('admin.master')
@section('title')

product create

@endsection
@section('maincontent')
<script>

function search(){

var search=$('#category').val();



if(search!=''){
$.ajax({

      type:"POST",
      url:'{{URL::to("/product/search")}}',
      data:{
             search:search,
             _token:$('#signup-token').val()
           
      },
      datatype:'html',
      success:function(response){

         console.log(response);
         $("#success").html(response);

      }



});
}


}

function search2(){

var categorysearch=$('#category').val();




if(categorysearch!=''){
$.ajax({

      type:"POST",
      url:'{{URL::to("/product/subcategorysearch")}}',
      data:{
             categorysearch:categorysearch,
             _token:$('#signup-token').val()
           
      },
      datatype:'html',
      success:function(response){

         console.log(response);
         $("#success2").html(response);

      }



});
}


}

</script>

<div class="row">
  
  <input type="hidden" id="signup-token" name="_token" value="{{csrf_token()}}">

 <div class="col-lg-12">

  <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
  <hr/>

  <div class="well">

    {!! Form::open(['url'=>'/product/save','class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
  	

      <div class="form-group">
          <label for="productname" class="col-sm-2 control-label">productName</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="productname" name="productname"/>
            <span class="text-danger">{{ $errors->has('productname')?$errors->first('productname'):''}}</span>

          </div>

       </div>


       <div class="form-group">
          <label for="category" class="col-sm-2 control-label">category select</label>
          <div class="col-sm-10">
           <select class="form-control" onclick="search(),search2()" id="category" name="categoryid">
            <option value=''>select category</option>

            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->categoryname}}</option>
            @endforeach


           </select>
           <span class="text-danger">{{ $errors->has('categoryid')?$errors->first('categoryid'):''}}</span>
          </div>

       </div>

       <div class="form-group">
          <label for="subcategory" class="col-sm-2 control-label">subcategory select</label>
          <div class="col-sm-10" id="success2">
           <select  class="form-control" id="subcategory" name="subcategoryid">
            <option value=''>select subcategory</option>

          


           </select>
           <span class="text-danger">{{ $errors->has('subcategoryid')?$errors->first('subcategoryid'):''}}</span>
          </div>

       </div>

       <div class="form-group">
          <label for="manufacture" class="col-sm-2 control-label">manufacture select</label>
          <div class="col-sm-10" id="success">
           <select  class="form-control" id="manufacture" name="manufactureid">
            <option value=''>select manufacture</option>

          


           </select>
           <span class="text-danger">{{ $errors->has('manufactureid')?$errors->first('manufactureid'):''}}</span>
          </div>

       </div>




  	   <div class="form-group">
          <label for="productshortdescription" class="col-sm-2 control-label">product short description</label>
          <div class="col-sm-10">
           <textarea class="form-control mceEditor" id="productshortdescription" rows="5" name="productshortdescription"></textarea>
           <span class="text-danger">{{ $errors->has('productshortdescription')?$errors->first('productshortdescription'):''}}</span>

          </div>

  	   </div>

       <div class="form-group">
          <label for="productlongdescription" class="col-sm-2 control-label">product long description</label>
          <div class="col-sm-10">
           <textarea class="form-control mceEditor" id="productlongdescription" rows="8" name="productlongdescription"></textarea>
           <span class="text-danger">{{ $errors->has('productlongdescription')?$errors->first('productlongdescription'):''}}</span>

          </div>

       </div>
       
       <div class="form-group">
          <label for="productquantity" class="col-sm-2 control-label">product quantity</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="productquantity" name="productquantity"/>
            <span class="text-danger">{{ $errors->has('productquantity')?$errors->first('productquantity'):''}}</span>

          </div>

       </div>

       <div class="form-group">
          <label for="productprice" class="col-sm-2 control-label">productprice</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="productprice" name="productprice"/>
            <span class="text-danger">{{ $errors->has('productprice')?$errors->first('productprice'):''}}</span>

          </div>

       </div>

        <div class="form-group">
          <label for="productimages" class="col-sm-2 control-label">productimage</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="productimages" accept="image/*" name="productimage"/>
            <span class="text-danger">{{ $errors->has('productimage')?$errors->first('productimage'):''}}</span>

          </div>

       </div>

       <div class="form-group">
          <label for="featurename" class="col-sm-2 control-label">product feature</label>
          <div class="col-sm-10">
           <select class="form-control" name="featurename">
            <option value=''>select feature status</option>
            <option value="0">Latest design</option>
            <option value="1">Special offer</option>
            <option value="2">collection</option>
           


           </select>
           <span class="text-danger">{{ $errors->has('featurename')?$errors->first('featurename'):''}}</span>
          </div>

       </div>

  	   <div class="form-group">
          <label for="publicationstatus" class="col-sm-2 control-label">publication status</label>
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
           <button type="submit" class="btn btn-success btn-block">Save product</button>

          </div>

  	   </div>


  	{!! Form::close() !!}

  </div>


 </div>

</div>


@endsection
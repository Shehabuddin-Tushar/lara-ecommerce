@extends('admin.master')
@section('title')

subcategory manage

@endsection
@section('maincontent')

  <div class="row">
    <div class="col-md-12">
  <h2>subcategory</h2>
   <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>serial</th>
        <th>subcategory name</th>
        <th>category name</th>
        <th>publication status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   <?php $i=1; ?> 
    @foreach($subcategories as $subcategory)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ $subcategory->subcategoryname}}</td>
        <td>{{ $subcategory->categoryname}}</td>

        <td>{{ $subcategory->publicationstatus ==1 ? 'published':'Unpublished'}}</td>
        <td>
          <a href="{{url('/subcategory/edit/'.$subcategory->id)}}" class="btn btn-success">
           <span class="glyphicon glyphicon-edit"></span>
          </a>

          <a onclick="return confirm('are you sure to delete this data')" href="{{url('/subcategory/delete/'.$subcategory->id)}}" class="btn btn-danger">
           <span class="glyphicon glyphicon-trash"></span>
          </a>

        </td>
      </tr>

@endforeach
      
    </tbody>
  </table>
  {{$subcategories->links()}}
 
</div>
</div>


@endsection
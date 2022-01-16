@extends('admin.master')
@section('title')

Category manage

@endsection
@section('maincontent')

  <div class="row">
    <div class="col-md-12">
  <h2>Category</h2>
   <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>serial</th>
        <th>category name</th>
        <th>publication status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   <?php $i=1; ?> 
    @foreach($categories as $category)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ $category->categoryname}}</td>

        <td>{{ $category->publicationstatus ==1 ? 'published':'Unpublished'}}</td>
        <td>
          <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success">
           <span class="glyphicon glyphicon-edit"></span>
          </a>

          <a onclick="return confirm('are you sure to delete this data')" href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger">
           <span class="glyphicon glyphicon-trash"></span>
          </a>

        </td>
      </tr>

@endforeach
      
    </tbody>
  </table>
  {{$categories->links()}}
 <!--  {{ $categories->appends(['sort' => 'votes'])->links() }} -->
</div>
</div>


@endsection
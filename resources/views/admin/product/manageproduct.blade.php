@extends('admin.master')
@section('title')

product manage

@endsection
@section('maincontent')

  <div class="row">
    <div class="col-md-12">
  <h2>product</h2>
   <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Serial</th>
        <th>product name</th>
        <th>publication status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   <?php $i=1; ?> 
    @foreach($products as $product)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ $product->productname}}</td>

        <td>{{ $product->publicationstatus ==1 ? 'published':'Unpublished'}}</td>
        <td>
          <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success">
           <span class="glyphicon glyphicon-edit"></span>
          </a>

          <a onclick="return confirm('are you sure to delete this data')" href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger">
           <span class="glyphicon glyphicon-trash"></span>
          </a>

        </td>
      </tr>

@endforeach
      
    </tbody>
  </table>
  {{$products->links()}}
 
</div>
</div>


@endsection
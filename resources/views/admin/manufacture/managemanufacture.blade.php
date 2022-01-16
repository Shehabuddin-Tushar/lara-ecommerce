@extends('admin.master')
@section('title')

manufacture manage

@endsection
@section('maincontent')

  <div class="row">
    <div class="col-md-12">
  <h2>Manufacture</h2>
   <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>serial</th>
        <th>manufacture name</th>
        <th>publication status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   <?php $i=1; ?> 
    @foreach($manufactures as $manufacture)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ $manufacture->manufacturename}}</td>

        <td>{{ $manufacture->publicationstatus ==1 ? 'published':'Unpublished'}}</td>
        <td>
          <a href="{{url('/manufacture/edit/'.$manufacture->id)}}" class="btn btn-success">
           <span class="glyphicon glyphicon-edit"></span>
          </a>

          <a onclick="return confirm('are you sure to delete this data')" href="{{url('/manufacture/delete/'.$manufacture->id)}}" class="btn btn-danger">
           <span class="glyphicon glyphicon-trash"></span>
          </a>

        </td>
      </tr>

@endforeach
      
    </tbody>
  </table>
  {{$manufactures->links()}}
 
</div>
</div>


@endsection
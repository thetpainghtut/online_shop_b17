@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1 class="h3 mb-0 text-gray-800 d-inline-block">All Map List</h1>
        <a href="{{route('maps.create')}}" class="btn btn-info float-right">Add New</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Address</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($maps as $map)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$map->name}}</td>
              <td>{{$map->address}}</td>
              <td>
                <a href="{{route('maps.show',$map->id)}}" class="btn btn-primary" target="_blank">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
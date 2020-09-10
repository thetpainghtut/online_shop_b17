@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1 class="h3 mb-0 text-gray-800 d-inline-block">Videos List</h1>
        <a href="{{route('videos.create')}}" class="btn btn-info float-right">Add New</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>File Path</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($videos as $video)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$video->name}}</td>
              <td>{{$video->file_path}}</td>
              <td>
                <a href="{{asset($video->file_path)}}" class="btn btn-primary" target="_blank">Show File</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
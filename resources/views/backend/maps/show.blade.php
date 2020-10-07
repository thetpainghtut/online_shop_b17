@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1 class="h3 mb-0 text-gray-800">Show Post</h1>
        {!!$post->content!!}
      </div>
    </div>

  </div>
@endsection
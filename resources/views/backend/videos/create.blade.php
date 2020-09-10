@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="row">
        <div class="col-md-12">
          <h1 class="h3 mb-0 text-gray-800">Video Create Form</h1>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <strong>{{ $message }}</strong>
          </div>
        @endif

        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        
        <form action="{{route('videos.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            {{-- <label for="inputVideo" class="col-sm-2 col-form-label">Select File</label> --}}
            <div class="col-sm-5">
              <input type="file" class="form-control-file @error('video') is-invalid @enderror" id="inputVideo" name="video">
              <span class="text-danger">{{ $errors->first('video') }}</span>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-5">
              <input type="submit" class="btn btn-primary" name="btnsubmit" value="Upload">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
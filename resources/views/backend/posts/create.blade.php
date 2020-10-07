@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="row">
        <div class="col-md-12">
          <h1 class="h3 mb-0 text-gray-800">Post Create Form</h1>
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
        
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title">
              <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputContent" class="col-sm-2 col-form-label">Content!</label>
            <div class="col-sm-5">
              <textarea class="summernote form-control @error('content') is-invalid @enderror" id="inputContent" name="content"></textarea>
              <span class="text-danger">{{ $errors->first('content') }}</span>
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

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script>
    $('.summernote').summernote({
      placeholder: 'Something...',
      tabsize: 2,
      height: 200
    });
  </script>
@endsection
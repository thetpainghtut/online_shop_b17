@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1 class="h3 mb-0 text-gray-800">Show Video</h1>
        
        {{-- <video width="800" controls>
          <source src="{{asset($video->file_path)}}" type="video/mp4">
          <source src="mov_bbb.ogg" type="video/ogg">
          Your browser does not support HTML video.
        </video> --}}

        <video id="player" playsinline controls data-poster="{{asset('storage/posters/1598857429.jpeg')}}">
          <source src="{{asset($video->file_path)}}" type="video/mp4" />
          <source src="/path/to/video.webm" type="video/webm" />

          <!-- Captions are optional -->
          <track kind="captions" label="English captions" src="{{asset('storage/vtt/captions.vtt')}}" srclang="en" default />
          <a href="{{asset($video->file_path)}}" download>Download</a>
        </video>
      </div>
    </div>

  </div>
@endsection
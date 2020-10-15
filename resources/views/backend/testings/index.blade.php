@extends('backendtemplate')

@section('content')
	<div class="container-fluid">
    <!-- Page Heading -->
  	<div class="row">
  		<div class="col-md-12 mb-3">
    		<h1 class="h3 mb-0 text-gray-800 d-inline-block">Testing Index</h1>
  		</div>
  	</div>
    
    <div class="row">
    	<div class="col-md-8">
        <div class="row brands">
          @foreach($testings as $testing)
            <p>{{$testing->item_type->name}}</p>
          @endforeach
        </div>
    	</div>
    </div>
 	</div>
@endsection

@section('script')
    <script type="text/javascript">
      $(document).ready(function () {
        
      })
    </script>
@endsection
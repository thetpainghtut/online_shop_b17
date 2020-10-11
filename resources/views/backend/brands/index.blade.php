@extends('backendtemplate')

@section('content')
	<div class="container-fluid">
    <!-- Page Heading -->
  	<div class="row">
  		<div class="col-md-12 mb-3">
    		<h1 class="h3 mb-0 text-gray-800 d-inline-block">Brand With Dynamic Blade Component!</h1>
  		</div>
  	</div>
    
    <div class="row">
    	<div class="col-md-8">
        <div class="row brands">
          @foreach($brands as $brand)
            <x-brand-component :brand="$brand"></x-brand-component>
          @endforeach
        </div>
    	</div>
      <div class="col-md-4">
        <input type="text" name="search" id="search" class="form-control" placeholder="Brand Name..">
      </div>
    </div>
 	</div>
@endsection

@section('script')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#search').change(function () {
          var keyword = $(this).val();
          var html = "";
          $.get("{{route('getAllItem')}}",{keyword:keyword},function (response) {
            // console.log(response);
            for(row of response){
            html +=`<div class="col-md-4">
                <div class="card">
                  <img src="/${row.photo}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">${row.name}</h5>
                  </div>
                </div>
              </div>`;
            }
          $('.items').html(html);
          })
        })
      })
    </script>
@endsection
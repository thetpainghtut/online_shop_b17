@extends('backendtemplate')

@section('content')
	<div class="container-fluid">
    <!-- Page Heading -->
  	<div class="row">
  		<div class="col-md-12 mb-3">
    		<h1 class="h3 mb-0 text-gray-800 d-inline-block">Sale Here!</h1>
  		</div>
  	</div>
    
    <div class="row">
    	<div class="col-md-8">
    		<div class="row items">
          
        </div>
    	</div>

      <div class="col-md-4"></div>
    </div>
 	</div>

@endsection

@section('script')
    <script type="text/javascript">
      $(document).ready(function () {
        getAllItem();

        function getAllItem() {
          var html = "";
          $.get("{{route('getAllItem')}}",function (response) {
            // console.log(response);
            for(row of response){
            html +=`<div class="col-md-4">
                <div class="card">
                  <img src="/${row.photo}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">${row.name}</h5>
                    <p class="card-text">${row.stocks.length>1?row.stocks[row.stocks.length-1].price:row.price} MMK</p>
                    <a href="#" class="btn btn-primary">Add Cart</a>
                  </div>
                </div>
              </div>`;
            }
          $('.items').html(html);
          })
        }
      })
    </script>
@endsection
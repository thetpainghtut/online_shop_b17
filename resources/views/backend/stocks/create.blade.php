@extends('backendtemplate')

@section('content')
	<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<div class="row">
    		<div class="col">
      		<h1 class="h3 mb-0 text-gray-800">Stock Add Form</h1>
    		</div>
    	</div>
    </div>
    
    <div class="container">
      <div class="row">
      	<div class="col-md-6">
    		 	<div class="form-group row {{ $errors->has('codeno') ? 'has-error' : '' }}">
		        <label for="inputCodeno" class="col-sm-2 col-form-label">Codeno</label>
		        <div class="col-sm-5">
		          <input type="text" class="form-control" id="inputCodeno" name="codeno">
		          <span class="text-danger">{{ $errors->first('codeno') }}</span>
		        </div>
		      </div>

		      <div id="item">
			      
			    </div>
      	</div>
      	<div class="col-md-6">
      		<form action="{{route('stocks.store')}}" method="post" enctype="multipart/form-data">
			      @csrf
			      <input type="hidden" name="itemId" id="itemId">
			      
			      <div class="form-group row">
			        <label for="inputAmount" class="col-sm-2 col-form-label">Amount</label>
			        <div class="col-sm-5">
			          <input type="number" class="form-control @error('amount') is-invalid @enderror" id="inputAmount" name="amount">
			          <span class="text-danger">{{ $errors->first('amount') }}</span>
			        </div>
			      </div>

			      <div class="form-group row {{ $errors->has('price') ? 'has-error' : '' }}">
			        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
			        <div class="col-sm-5">
			          <input type="number" class="form-control" id="inputPrice" name="price">
			          <span class="text-danger">{{ $errors->first('price') }}</span>
			        </div>
			      </div>

			    	<div class="form-group row">
			        <label for="inputInDate" class="col-sm-2 col-form-label">Date</label>
			        <div class="col-sm-5">
			          <input type="date" class="form-control @error('indate') is-invalid @enderror" id="inputInDate" name="indate">
			          <span class="text-danger">{{ $errors->first('indate') }}</span>
			        </div>
			      </div>

			      <div class="form-group row">
			        <div class="col-sm-5">
			          <input type="submit" class="btn btn-primary" name="btnsubmit" value="Add">
			        </div>
			      </div>
			    </form>
      	</div>
      </div>
    </div>
 	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function () {
			$('#item').hide();
			$('#inputCodeno').change(function () {
				var codeno = $(this).val();
				var html = "";
				$.get("{{route('getItemInfo')}}",{codeno:codeno},function (response) {
					console.log(response);
					$('#itemId').val(response.id);
					$('#item').show();
					html +=`<div class="form-group row">
			        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
			        <div class="col-sm-5">
			          <input type="text" class="form-control" id="inputName" name="name" value="${response.name}" readonly>
			        </div>
			      </div>
			      <div class="form-group row">
			        <div class="col-sm-5 offset-sm-2">
			      		<img src="/${response.photo}" class="img-fluid" id="itemImg">
			      	</div>
			      </div>`;
			    $('#item').html(html);
				})
			})
		})
	</script>
@endsection
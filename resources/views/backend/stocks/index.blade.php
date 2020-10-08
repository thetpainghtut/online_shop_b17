@extends('backendtemplate')

@section('content')
	<div class="container-fluid">
    <!-- Page Heading -->
      	<div class="row">
      		<div class="col-md-12 mb-3">
        		<h1 class="h3 mb-0 text-gray-800 d-inline-block">Items Stock List</h1>
        		<a href="{{route('stocks.create')}}" class="btn btn-info float-right">Add New</a>
      		</div>
      	</div>
        
        <div class="row">
        	<div class="col-md-12">
        		<table class="table table-bordered">
        			<thead class="thead-dark">
        				<tr>
        					<th>No</th>
        					<th>Codeno</th>
        					<th>Name</th>
        					<th>Price</th>
                  <th>Amount</th>
        					<th>Actions</th>
        				</tr>
        			</thead>
        			<tbody>
        				@php $i=1; @endphp
        				@foreach($stocks as $stock)
        				<tr>
        					<td>{{$i++}}</td>
        					<td>{{$stock->item->codeno}}</td>
        					<td>{{$stock->item->name}}</td>
        					<td>{{$stock->price}} MMK</td>
        					<td>
        						<a href="{{route('stocks.show',$stock->id)}}" class="btn btn-primary">Detail</a>
        						<a href="{{route('stocks.edit',$stock->id)}}" class="btn btn-warning">Edit</a>
                    <form method="post" action="{{route('stocks.destroy',$stock->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>    
        					</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
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
@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1 class="h3 mb-0 text-gray-800 d-inline-block">Order List</h1>

        <form method="get" action="{{route('orders.index')}}" class="mt-2">
          <div class="form-row">
            <div class="col">
              <input type="date" class="form-control" placeholder="Start Date" name="sdate">
            </div>
            <div class="col">
              <input type="date" class="form-control" placeholder="End Date" name="edate">
            </div>
            <div class="col">
              <input type="submit" class="btn btn-success" value="Search">
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Voucherno</th>
              <th>Date</th>
              <th>User</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($orders as $order)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$order->voucherno}}</td>
              <td>{{$order->orderdate}}</td>
              <td>{{$order->user->name}}</td>
              <td>{{$order->total}} MMK</td>
              <td>
                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
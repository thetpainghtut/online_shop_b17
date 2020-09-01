@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1 class="h3 mb-0 text-gray-800">Voucherno : {{$order->voucherno}}</h1>
        <h1 class="h3 mb-0 text-gray-800">Orderdate : {{$order->orderdate}}</h1>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Item Name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; $total=0; @endphp
            @foreach($order->items as $item)
            @php 
              $subtotal = $item->price * $item->pivot->qty;
              $total += $subtotal;
            @endphp
            <tr>
              <td>{{$i++}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->price}} MMK</td>
              <td>{{$item->pivot->qty}}</td>
              <td>
                {{$subtotal}}
              </td>
            </tr>
            @endforeach

            <tr class="bg-dark text-white">
              <td colspan="4">Total:</td>
              <td>{{$total}} MMK</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
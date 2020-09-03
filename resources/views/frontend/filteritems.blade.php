@extends('frontendtemplate')

@section('content')
  <!-- Subcategory Title -->
  <div class="jumbotron jumbotron-fluid subtitle">
    <div class="container">
      <h1 class="text-center text-white"> {{$subcategory->name}} </h1>
    </div>
  </div>
  
  <!-- Content -->
  <div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-transparent">
          <li class="breadcrumb-item">
            <a href="{{route('homepage')}}" class="text-decoration-none secondarycolor"> Home </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('itemsbycategorypage',$subcategory->category->id)}}" class="text-decoration-none secondarycolor"> {{$subcategory->category->name}} </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{$subcategory->name}}
          </li>
        </ol>
    </nav>

    <div class="row mt-5">

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <ul class="list-group">
          @foreach($subcategory->category->subcategories as $sidesubcategory)
            <li class="list-group-item">
              <a href="{{route('filteritemspage',$sidesubcategory->id)}}" class="text-decoration-none secondarycolor"> {{$sidesubcategory->name}} </a>
            </li>
          @endforeach
        </ul>
      </div>  


      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

        <div class="row">
          @if(count($subcategory->items)>0)
            @foreach($subcategory->items as $item)
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card pad15 mb-3">
                  <a href="{{route('itemdetailpage',$item->id)}}" class="text-dark text-decoration-none">
                    <img src="{{ asset($item->photo)}}" class="card-img-top" alt="...">
                    
                    <div class="card-body text-center">
                      <h5 class="card-title text-truncate">{{$item->name}}</h5>
                      
                      <p class="item-price mb-2">
                        @php $discount = $item->price-($item->price*($item->discount/100)) @endphp
                        <span class="d-block">Ks {{number_format($discount)}}</span>
                        <small><strike class="mr-2">{{number_format($item->price)}} Ks </strike>  -{{$item->discount}}%</small>
                      </p>
                    </div>
                  </a>
                  <div class="card-footer text-center">
                    <button class="addtocartBtn text-decoration-none" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-codeno="{{$item->codeno}}">Add to Cart</button>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="col-12">
              There are no item!
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12 justify-content-center">
            {!! $subcategory->items->render() !!}
          </div>
        </div>

      </div>
    </div>

    
  </div>
@endsection
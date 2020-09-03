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
            <a href="#" class="text-decoration-none secondarycolor"> {{$subcategory->category->name}} </a>
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
                    <img src="{{ asset($item->photo)}}" class="card-img-top" alt="...">
                    
                    <div class="card-body text-center">
                      <h5 class="card-title text-truncate">{{$item->name}}</h5>
                      
                      <p class="item-price">
                        <strike>{{$item->price}} Ks </strike> 
                        <span class="d-block">{{$item->discount}} Ks</span>
                      </p>

                      <div class="star-rating">
                        <ul class="list-inline">
                          <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                          <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                          <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                          <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                          <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                        </ul>
                      </div>

                      <a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
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
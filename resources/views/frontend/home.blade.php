@extends('frontendtemplate')

@section('content')
  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('frontend/image/banner/ac.jpg')}}" class="d-block w-100 bannerImg" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/image/banner/giordano.jpg')}}" class="d-block w-100 bannerImg" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/image/banner/garnier.jpg')}}" class="d-block w-100 bannerImg" alt="...">
        </div>
      </div>
  </div>

  <!-- Content -->
  <div class="container mt-5 px-5">
    <!-- Category -->
    <div class="row">
      @foreach($categories as $category)
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
          <div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
              <img src="{{ asset($category->photo)}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text font-weight-bold text-truncate"> {{$category->name}} </p>
              </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
    
    <!-- Discount Item -->
    <section>
      <div class="row mt-5">
        <h1> Discount Item </h1>
      </div>

      <!-- Disocunt Item -->
      <div class="row">
        <div class="col-12">
          <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
              @foreach($discountItems as $item)
              <div class="item">
                <div class="pad15">
                  <a href="{{route('itemdetailpage',$item->id)}}" class="text-dark text-decoration-none">
                    <img src="{{ asset($item->photo)}}" class="img-fluid">
                    <p class="text-truncate my-1">{{$item->name}}</p>
                    <p class="item-price mb-2">
                      @php $discount = $item->price-($item->price*($item->discount/100)) @endphp
                      <span class="d-block">Ks {{number_format($discount)}}</span>
                      <small><strike class="mr-2">{{number_format($item->price)}} Ks </strike>  -{{$item->discount}}%</small>
                    </p>
                  </a>
                  {{-- <div class="star-rating">
                    <ul class="list-inline">
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                    </ul>
                  </div> --}}

                  <button class="addtocartBtn text-decoration-none" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-codeno="{{$item->codeno}}">Add to Cart</button>
                </div>
              </div>
              @endforeach
              <button class="btn btnMain leftLst"><</button>
              <button class="btn btnMain rightLst">></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Flash Sale Item -->
    <section>
      <div class="row mt-5">
        <h1> Flash Sale </h1>
      </div>

      <!-- Flash Sale Item -->
      <div class="row">
        <div class="col-md-12">
          <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
              <div class="item">
                  <div class="pad15">
                    <img src="{{ asset('frontend/image/item/saisai_one.jpg')}}" class="img-fluid">
                    <p class="text-truncate">Multi Item Carousel</p>
                    <p class="item-price">
                      <strike>250,000 Ks </strike> 
                      <span class="d-block">230,000 Ks</span>
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
            <button class="btn btnMain leftLst"><</button>
            <button class="btn btnMain rightLst">></button>
          </div>
        </div>
      </div>
    </section>

    <!-- Random Catgory ~ Item -->

    <section>
      <div class="row mt-5">
        <h1> Fresh Picks </h1>
      </div>

        <!-- Random Item -->
      <div class="row">
        <div class="col-12">
          <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
              <div class="item">
                <div class="pad15">
                  <img src="{{ asset('frontend/image/item/saisai_one.jpg')}}" class="img-fluid">
                  <p class="text-truncate">Multi Item Carousel</p>
                  <p class="item-price">
                    <strike>250,000 Ks </strike> 
                    <span class="d-block">230,000 Ks</span>
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
            <button class="btn btnMain leftLst"><</button>
            <button class="btn btnMain rightLst">></button>
          </div>
        </div>
      </div>
    </section>

    
    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

      <!-- Brand Store -->
      <div class="row mt-5">
        <h1> Top Brand Stores </h1>
      </div>

      <!-- Brand Store Item -->
      <div class="row">
        <section class="customer-logos slider mt-5">
          @foreach($brands as $brand)
            <div class="slide">
              <a href="{{route('itemsbybrandpage',$brand->id)}}">
                <img src="{{ asset($brand->photo)}}" class="img-fluid">
              </a>
            </div>
          @endforeach
        </section>
      </div>
      <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
  </div>
@endsection
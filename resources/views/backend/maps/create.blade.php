@extends('backendtemplate')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h2>Google Map</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('maps.store')}}" method="post" id="boxmap">
          @csrf
            <div class="form-group">
                <label for="name">Place Name</label>
                <input type="text" name="name" placeholder="Place Name" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Address" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="lat">lat</label>
                <input type="text" name="lat" placeholder="lat" class="form-control" id="lat" />
            </div>
            <div class="form-group">
                <label for="lng">lng</label>
                <input type="text" name="lng" placeholder="lng" class="form-control" id="lng" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Add Map" class="btn btn-success"/>
            </div>
        </form>
      </div>
      <div class="col-md-8">
        <h2>Show google Map</h2>
        <div id="map"></div>  
        {{-- <pre id="info"></pre>     --}}
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>

  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoidGhldHBhaW5naHR1dCIsImEiOiJjazdzb3JjY2UwaHpkM2VxcjVuejBuZXJrIn0.mI7Y1Cg2UIRtkGbEBYMC-Q';
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [95.9013786,16.8396098],
      zoom: 7
    });

    // Add zoom and rotation controls to the map.
    map.addControl(new mapboxgl.NavigationControl());

    var test ='<?php echo $data;?>';  //ta nhận dữ liệu từ Controller
    var dataMap = JSON.parse(test); //chuyển đổi nó về dạng mà Mapbox yêu cầu

    // ta tạo dòng lặp để for ra các đối tượng
    dataMap.features.forEach(function(marker) {

        //tạo thẻ div có class là market, để hồi chỉnh css cho market
        var el = document.createElement('div');
        el.className = 'marker';

        //gắn marker đó tại vị trí tọa độ
        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
        .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
            .addTo(map);
    });

    var marker = new mapboxgl.Marker();

    map.on('click', function (e) {
      // document.getElementById('info').innerHTML =
      // e.point is the x, y coordinates of the mousemove event relative
      // to the top-left corner of the map
      // JSON.stringify(e.point) +
      // '<br />' +
      // e.lngLat is the longitude, latitude geographical position of the event
      // JSON.stringify(e.lngLat.wrap());
      marker.setLngLat([e.lngLat.lng,e.lngLat.lat]).addTo(map);
      $('#lng').val(e.lngLat.lng);
      $('#lat').val(e.lngLat.lat);
    });

    
    
    

  </script>
@endsection
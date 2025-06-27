<x-layout>
<body class="home">

  <div id="carouselExampleInterval" class="carousel slide w-100 position-relative" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <img src="images/slider/22083f35b76cfa2f3868201f3e3efe7ef0db33c5_1741184804.webp" class="d-block w-100"
          alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="images/slider/289663691468a5fe56a486993d5bb46ea4b93869_1741177630.webp" class="d-block w-100"
          alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="images/slider/2c6d2a1004008126a7c71d21571bb8b060954fa8_1741444190.webp" class="d-block w-100"
          alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="images/slider/69e966666c1264b32c0dee7e630e6328a83a16d2_1741528917.webp" class="d-block w-100"
          alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="images/slider/80aa00f1fb5df5e93cc6d3252b5724d512e0ae8a_1741427980.webp" class="d-block w-100"
          alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="images/slider/88be5114f0ab0277325d527a637e947925f83f6e_1741704559.webp" class="d-block w-100"
          alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="images/slider/99ca866f9873c4ef5744e57c60d5d856722c6cfc_1741515275.webp" class="d-block w-100"
          alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Box takhfifiat -->
  <div class="container">
    <div class="box-takhfif mt-2 w-100">

      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
          <p>پیشنهاد شـگـفت انگیـــز</p>
        </div>
@foreach ($products as $product)
  
<a href="{{route('product.show',$product->id)}}" class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2 p-2">
  <div class="card h-100">
  <div class="product-box radius-right">
    <img class="img-thumbnail card-img-top" style="max-height: 200px; object-fit:contain;" width="100%" 
        @if ($product->cover != null)
        src="{{asset("storage/".$product->gallery()[0])}}"
        @else
        src="{{asset("storage/Product_images/noimage.jpg")}}"
        @endif
    
     >
<h5>{{$product->name}}</h5>
    <hr>
    <h6>{{$product->fa_num()}} تومان</h6>
  </div>
</div>
</a>
@endforeach
      </div>
    </div>
  </div>


</body>
</x-layout>
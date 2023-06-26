@extends('layouts.app')

@section('title')
UMKMJaksel
@endsection

@section('content')
    <div class="page-content page-home">
<section class="store-carousel">
  <div class="container">
    <div class="row">
      <div class="col-lg-12" data-aos="zoom-in">
        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#storeCarousel" data-slide-to="1"></li>
            
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('images/frame.jpg') }}" class="d-block w-100" alt="Carousel Image" />
            </div>
            <div class="carousel-item">
              <img src="{{ asset('images/frame1.jpg') }}" class="d-block w-100" alt="Carousel Image" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


      <!-- kategori favorit -->
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Kategori Favorit</h5>
            </div>
          </div>
          <div class="row">
            @php
              $incrementCategory = 0
            @endphp
            @forelse ($categories as $category )
               <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="{{ $incrementCategory+= 100 }}"
            >
              <a class="component-categories d-block" href="{{ route('categories-detail', $category->slug) }}">
                <div class="categories-image">
                  <img
                    src="{{ Storage::url($category->photo) }}"
                    alt=""
                    class="w-100"
                  />
                   <p class="categories-text">{{ $category->name }}
                </div>
               
              </a>
            </div>
            @empty
              <div class="col-12 text-center py-5" data-aos="fade-up"
              data-aos-delay="100">
                Tidak ada Kategori yang ditemukkan
              </div>
            @endforelse

           
          </div>
        </div>
      </section>


      <section class="store-new-products">
        <div class="container">
          <div class="row">
            
            <div class="col-12" data-aos="fade-up">
              <h5>Produk Baru</h5>
            </div>
          </div>
          <div class="row">
              @php
              $incrementCategory = 0
            @endphp
            @forelse ($products as $product)
              <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="{{ $incrementCategory+= 100 }}"
            >
              <a class="component-products d-block" href="{{ route('details', $product->slug) }}">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                     @if($product->galleries->count())
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                        @else
                                            background-color: #eee;
                                        @endif
                    "
                  ></div>
                </div>
                <div class="products-text">{{ $product->name }}</div>
                <div class="products-price">Rp {{ number_format($product->price) }}</div>
              </a>
            </div>
               @empty
              <div class="col-12 text-center py-5" data-aos="fade-up"
              data-aos-delay="100">
                Tidak ada Kategori yang ditemukkan
              </div>
            @endforelse
          </div>
        </div>
      </section>
    </div>
@endsection
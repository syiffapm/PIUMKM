@extends('layouts.app')

@section('title')
KSBI
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

 <!-- UMKM KSBI Explanation Section -->
  <section class="store-umkm-ksbi">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>UMKM Komunitas Sukses Berjamaah (KSBI)</h5>
          <p>
           UMKM Komunitas Sukses Berjamaah Indonesia, adalah kelompok UMKM di daerah Jakarta Selatan. UMKM kami mendorong para pengusaha yang sedang merintis bisnisnya untuk dibantu proses pemasarannya. Mitra dibantu dengan mudah oleh team dan di fasilitasi sistem yang mudah dimengerti untuk mengelola proses penjualannya.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Register UMKM Section -->
  <section class="store-register-umkm">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Kaya Ingin Memajukan UMKM-mu?</h5>
          <p>
            Bergabunglah dengan UMKM KSBI sekarang dan nikmati berbagai keuntungannya! Daftarkan UMKM Anda di sini dan jadilah bagian dari komunitas UMKM yang maju bersama.
          </p>
          <a href="{{ route('register') }}" class="btn btn-success mt-3">Daftar Sekarang</a>
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

<style>
  .store-umkm-ksbi {
    background-color: #f5f5f5;
    padding: 80px 0;
  }

  .store-umkm-ksbi h5 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
  }

  .store-umkm-ksbi p {
    font-size: 16px;
    color: #666;
    text-align: center;
    line-height: 1.8;
  }

  .store-register-umkm {
    background-color: #fff;
    padding: 80px 0;
    text-align: center;
  }

  .store-register-umkm h5 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
  }

  .store-register-umkm p {
    font-size: 16px;
    color: #666;
    line-height: 1.8;
  }

  .store-register-umkm .btn {
    font-size: 16px;
    padding: 10px 30px;
    background-color: #28a745;
    color: #fff;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .store-register-umkm .btn:hover {
    background-color: #218838;
  }
</style>

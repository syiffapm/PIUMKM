@extends('layouts.app')

@section('title')
KSBI Detail Toko
@endsection

@section('content')
<div class="page-content page-details">
    <section class="section-title-profile-umkm">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12 col-md-12">
                    <h3>PROFILE UMKM</h3>
                    <h1>{{ $store_name }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile section -->
    <section class="section-profile-umkm">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="deskripsi">
                        <h4 class="text-center mt-4">Deskripsi Singkat</h4>
                        <br>
                        <br>
                        {{ $description }}
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 deskripsi-lengkap">
                    <div class="card">
                        <div class="card-body">
                            <h4>Keterangan</h4>
                            <hr>
                            <div class="row item1">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-keterangan table-sm">
                                            <tr>
                                                <th style="width: 40%;">Nama Toko</th>
                                                <td>{{ $store_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pemilik</th>
                                                <td>{{ $nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $address_one }}</td>
                                            </tr>
                                            <tr>
                                                <th>No. Telpon</th>
                                                <td>{{ $phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $email }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                          <h4>Products:</h4>
<div class="row">
    @foreach ($products as $product)
        <div class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="{{ $loop->index * 100 }}"
        >
            <a href="{{ route('details', $product->slug) }}" class="component-products d-block">
                <div class="products-thumbnail">
                    <div class="products-image"
                        style="
                            @if($product->galleries->count())
                                background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                            @else
                                background-color: #eee
                            @endif
                        "
                    ></div>
                </div>
                <div class="products-text">
                    {{ $product->name }}
                </div>
                <div class="products-price">
                    Rp {{ number_format($product->price) }}
                </div>
            </a>
        </div>
    @endforeach
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@push('addon-script')
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 3,
          photos: [
            {
              id: 1,
              url: "/images/product-details-1.jpg",
            },
            {
              id: 2,
              url: "/images/product-details-2.jpg",
            },
            {
              id: 3,
              url: "/images/product-details-3.jpg",
            },
            {
              id: 4,
              url: "/images/product-details-4.jpg",
            },
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush

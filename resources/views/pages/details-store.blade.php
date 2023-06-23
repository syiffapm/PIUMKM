@extends('layouts.app')

@section('title')
UMKMJaksel Detail Toko
@endsection

@section('content')
<div class="page-content page-details">
        <section class="section-title-profile-umkm">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-12 col-md-12">
                        <h3>PROFILE UMKM</h3>
                        <p>Detail profile anggota UMKM binaan kami</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- Konten Profile UMKM -->

        <section class="section-profile-umkm">
        <div class="container">
            <div class="row deskripsi">
                <!-- Deskripsi singkat & photo di kiri layar -->
                <div class="col-lg-4 col-md-12 deskripsi-singkat mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="assets/images/banner-umkm-small.jpg" class="img-fluid rounded"
                                style="width: 100%; height: auto;" alt="">
                            <h4 class="text-center mt-4">Deskripsi Singkat</h4>
                            <hr>
                            <p>{{ $description }}</p>
                        </div>
                    </div>
                </div>
                <!-- Deskripsi lengkap di kanan layar -->
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
                            
                            <!-- Marketplace & Maps -->
                            <div class="row item4">
                                <div class="col-lg-6 col-md-6">
                                    <h4>Lokasi Usaha</h4>
                                    <hr>
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <iframe
                                                src=""
                                                width="100%" height="auto" style="border:0;" allowfullscreen=""
                                                loading="lazy"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Produk UMKM -->
                            <div class="row produk mt-4">
                                <div class="col-lg-12 col-md-12">
                                    <h4>Demo Produk</h4>
                                    <hr>
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="assets/images/banner-umkm-small.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/banner-umkm-small.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/banner-umkm-small.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/banner-umkm-small.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/banner-umkm-small.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/banner-umkm-small.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
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
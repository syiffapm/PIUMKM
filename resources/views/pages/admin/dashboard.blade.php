@extends('layouts.admin')

@section('title')
UMKMJaksel Dashboard
@endsection

@section('content')
       <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">
                  Halaman Admin
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Produk
                        </div>
                        <div class="dashboard-card-subtitle">
                          {{ $product }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Mitra
                        </div>
                        <div class="dashboard-card-subtitle">
                          {{ $user }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
         <div class="row mt-3">
    <div class="col-12 mt-2">
        <h5 class="mb-3">Produk Terbaru</h5>
        @foreach ($product_data->take(100) as $product)
            <a class="card card-list d-block" href="{{ route('product.index', $product->id) }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="{{ Storage::url($product->galleries->first()->photos ?? '') }}" class="w-75" />
                        </div>
                        <div class="col-md-4">
                            {{ $product->name ?? '' }}
                        </div>
                        <div class="col-md-3">{{ $product->created_at ?? '' }}</div>
                        <div class="col-md-1 d-none d-md-block">
                            <img src="/images/dashboard-arrow-right.svg" alt="" />
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

              </div>
            </div>
          </div>
@endsection
@extends('layouts.app')

@section('title')
UMKMJaksel 
@endsection


@section('content')
<div class="page-content page-categories">
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Mitra</h5>
                </div>
            </div>
            <div class="row">
              @php
              $incrementCategory = 0
            @endphp
            @forelse ($users as $user)
              <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="{{ $incrementCategory+= 100 }}"
            >
              <a class="component-products d-block" href="{{ route('details-store', $user->id) }}">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                     @if($user->photos)
                                            background-image: url('{{ Storage::url($user->photos->first()->photos) }}');
                                        @else
                                            background-color: #eee;
                                        @endif
                    "
                  ></div>
                </div>
                <div class="products-text">{{ $user->store_name }}</div>
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
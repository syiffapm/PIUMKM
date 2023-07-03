@extends('layouts.admin')

@section('title')
Product
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Produk</h2>
        <p class="dashboard-subtitle">
            Edit "{{ $item->name }}" Produk
        </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{ route('product.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Produk</label>
                      <input type="text" class="form-control" name="name" value="{{ $item->name }}" required />
                    </div>
                  </div>

                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Pemilik Produk</label>
                      <select name="users_id" class="form-control">
                        <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                        @foreach ($users as $user )
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori Produk</label>
                      <select name="categories_id" class="form-control">
                        <option value="{{ $item->categories_id }}" selected>{{ $item->category->name }}</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                   <div class="col-md-12">
                      <div class="form-group">
                        <label>Harga Produk</label>
                         <input type="number" name="price" class="form-control" value="{{ $item->price }}" required>
                      </div>
                   </div>
                    
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Deskripsi Produk</label>
                           <textarea name="description" id="editor">{!!  $item->description !!}</textarea>
                         </div>
                      </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Simpan Data
                    </button>
                  </div>
              </div>
            </div>
              </div>
            </div>
            
          </form>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
  </script>
@endpush
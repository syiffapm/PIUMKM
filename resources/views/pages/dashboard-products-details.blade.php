@extends('layouts.dashboard')

@section('title')
UMKMJaksel Dashboard Product Detail
@endsection

@section('content')
       <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Shirup Marzan</h2>
                <p class="dashboard-subtitle">
                 Detail Produk
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="name"
                                  name="storeName"
                                  value="Papel La Casa"
                                />
                              </div>
                            </div>
                       <div class="col-md-6">
                                  <div class="form-group">
          <label for="price">Harga</label>
          <input type="text" name="price" id="price" class="form-control">
        </div>

                <script>
                  // Fungsi untuk mengubah angka menjadi format rupiah
                  function formatRupiah(angka) {
                    var numberString = angka.toString();
                    var split = numberString.split(',');
                    var sisa = split[0].length % 3;
                    var rupiah = split[0].substr(0, sisa);
                    var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                      var separator = sisa ? '.' : '';
                      rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                    return 'Rp ' + rupiah;
                  }

                  // Mendapatkan elemen input harga
                  var priceInput = document.getElementById('price');

                  // Event listener ketika nilai input berubah
                  priceInput.addEventListener('input', function() {
                    var value = this.value;
                    // Menghilangkan karakter selain angka
                    value = value.replace(/\D/g, '');
                    // Mengubah angka menjadi format rupiah
                    value = formatRupiah(value);
                    // Menampilkan harga dengan format rupiah pada label
                    this.value = value;
                  });
                </script>
                                    </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Deskripsi Produk</label>
                                <textarea
                                  name="descrioption"
                                  id=""
                                  cols="30"
                                  rows="4"
                                  class="form-control"
                                >
The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for unimaginable, all-day comfort. There's super breathable fabrics on the upper, while colours add a modern edge. Bring the past into the future with the Nike Air Max 2090, a bold look inspired by the DNA of the iconic Air Max 90. Brand-new Nike Air cushioning
                                </textarea>
                              </div>
                            </div>
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-success btn-block px-5"
                              >
                                Update Produk
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="/images/product-card-1.png"
                                alt=""
                                class="w-100"
                              />
                              <a class="delete-gallery" href="#">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="/images/product-card-2.png"
                                alt=""
                                class="w-100"
                              />
                              <a class="delete-gallery" href="#">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="/images/product-card-3.png"
                                alt=""
                                class="w-100"
                              />
                              <a class="delete-gallery" href="#">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          <div class="col mt-3">
                            <input
                              type="file"
                              id="file"
                              style="display: none;"
                              multiple
                            />
                            <button
                              class="btn btn-secondary btn-block"
                              onclick="thisFileUpload();"
                            >
                              Tambahkan Foto
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    function thisFileUpload() {
      document.getElementById("file").click();
    }
  </script>
  <script>
    CKEDITOR.replace("editor");
  </script>
@endpush
        @extends('layouts.dashboard')

        @section('title')
        UMKMJaksel Dashboard Tambahkan Product 
        @endsection

        @section('content')
        <div
                    class="section-content section-dashboard-home"
                    data-aos="fade-up"
                  >
                    <div class="container-fluid">
                      <div class="dashboard-heading">
                        <h2 class="dashboard-title">Buat Produk</h2>
                        <p class="dashboard-subtitle">
                          Buatlah produk baru tokomu!
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
          <label for="product-name">Nama Produk</label>
          <input type="text" id="product-name" name="product-name" class="form-control">
        </div>

                  </div>

                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori</label>
                      <select name="categories_id" class="form-control">
                        <option value="">Tidak diganti</option>
                      </select>
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

                      <label>Deskripsi Produk</label>
                      <textarea name="description" id="editor"></textarea>
                    </div>

                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="thumbnails">Foto Produk</label>
                                        <input
                                          type="file"
                                          multiple
                                          class="form-control pt-1"
                                          id="thumbnails"
                                          aria-describedby="thumbnails"
                                          name="thumbnails"
                                        />
                                        <small class="text-muted">
                                          Kamu dapat memilih lebih dari satu file
                                        </small>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row mt-2">
                                <div class="col">
                                  <button
                                    type="submit"
                                    class="btn btn-success btn-block px-5"
                                  >
                                    Simpan Data
                                  </button>
                                </div>
                              </div>
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
    CKEDITOR.replace("editor");
  </script>
@endpush
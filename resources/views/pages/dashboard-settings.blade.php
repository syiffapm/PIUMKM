@extends('layouts.dashboard')

@section('title')
Pengaturan Toko
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Pengaturan Toko</h2>
                <p class="dashboard-subtitle">
                    Jadikan toko Anda menguntungkan
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('dashboard-settings-update', 'dashboard-settings-store' ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="storeName">Nama Toko</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="storeName"
                                                    aria-describedby="emailHelp"
                                                    name="store_name"
                                                    value="{{ $user->store_name }}"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category">Kategori</label>
                                                <select name="categories_id" class="form-control">
    <option value="{{ $user->categories_id }}">Tidak Diganti</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $user->categories_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status Toko</label>
                                                <p class="text-muted">
                                                    Apakah saat ini toko Anda buka?
                                                </p>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input
                                                        class="custom-control-input"
                                                        type="radio"
                                                        name="store_status"
                                                        id="openStoreTrue"
                                                        value="1"
                                                        {{ $user->store_status == 1 ? 'checked' : '' }}
                                                    />
                                                    <label
                                                        class="custom-control-label"
                                                        for="openStoreTrue"
                                                    >Buka</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input
                                                        class="custom-control-input"
                                                        type="radio"
                                                        name="store_status"
                                                        id="openStoreFalse"
                                                        value="0"
                                                        {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : '' }}
                                                    />
                                                    <label
                                                        class="custom-control-label"
                                                        for="openStoreFalse"
                                                    >Tutup Sementara</label>
                                                </div>
                                            </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">User</h2>
                <p class="dashboard-subtitle">Buat User Baru</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $errors )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>                            
                        @endif
                               <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama User</label>
                      <input type="text" class="form-control" name="name" required />
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Email User</label>
                      <input type="text" class="form-control" name="email">
                    </div>
                  </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Password User</label>
                      <input type="password" class="form-control" name="password" required />
                    </div>
                  </div>

                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Roles</label>
                      <select name="roles" required class="form-control">
                        <option value="ADMIN">Admin</option>
                        <option value="USER">User</option>
                      </select>
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
          </form>

                    </div>
                </div>
             </div>
        </div>
    </div>
        
@endsection


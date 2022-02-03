@extends('layouts.admin')

@section('title', 'Dashboard Admin Users Create | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create User</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
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
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="name" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Email User</label>
                            <input type="email" class="form-control" name="email" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Password User</label>
                            <input type="password" class="form-control" name="password" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Roles</label>
                            <select name="roles" class="form-control" required>
                              <option value="ADMIN">Admin</option>
                              <option value="CUSTOMER">CUSTOMER</option>
                              <option value="SELLER">SELLER</option>
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
                            Save Now
                          </button>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>
@endsection
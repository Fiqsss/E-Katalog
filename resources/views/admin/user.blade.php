@extends('layout.dashboard')
@section('container')
<div class="container pt-5" style="position:relative;">
    <div style="background-color:#FDF4F5; min-height:90vh;" class="componen-wrap rounded px-3 py-3 shadow">
        <div class="btn-wrapper d-flex justify-content-center mb-3">
            <button class="bg-info btn ms-2 text-white" data-bs-toggle="modal" data-bs-target="#modal" style="min-width: 20rem;">Tambah User</button>
        </div>
        <div class="info d-flex justify-content-center position-relative">
            <h2 class="text-uppercase text-sm mb-3">User Information</h2>
        </div>
        <div id="modal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white">Tambah User</h5>
                        <button type="button" class="btn-close shadow " data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div>
                        <form enctype="multipart/form-data" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <label for="name">User</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>
                                <br>
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required>
                                <br>
                                <label for="level" >level</label>
                                <select name="level" class="form-select @error('level') is-invalid @enderror" name="level" id="level" required>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                </select><br>
                                <label for="password">password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                <br>
                                <label for="password-confirm">Konfirmasi password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="modal-footer">
                                <button  type="submit" class="btn btn-info  w-100 shadow">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $item)
            <div class="col-md-6 mb-4 ">
                <div class="card shadow">
                <div class="card-body shadow">
                    <div class="card text-center shadow">
                        <div class="card-body ">
                            <h5 class="card-title"></h5>
                            <p class="card-text fw-bold">Name: <span class="fw-bold" style="color: #FF6969"> {{ $item['name'] }}</span></p>
                            <p class="card-text fw-bold">E-mail: <span class="fw-bold" style="color: #FF6969"> {{ $item['email'] }}</span></p>
                            <p class="card-text fw-bold">Level: <span class="fw-bold" style="color: #FF6969"> {{ $item['level'] }}</span></p>
                            <a href="#" style="min-width: 10rem;" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">Edit</a>
                            <a href="#" style="min-width: 10rem;" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">Delete</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
          <!-- Edit -->
          <div id="edit{{ $item->id }}" class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h5 class="modal-title text-white">Edit User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('updateuser', $item['id']) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input class="form-control" name="edtid" type="hidden" value="{{ $item['id'] }}">
                    <label for="user">User</label>
                    <input value="{{ $item['name'] }}" name="edtname" id="user" class="form-control" type="text" value="">
                    <br>
                    <label for="nama">Nama</label>
                    <input value="{{ $item['email'] }}" name="edtemail" id="nama" class="form-control" type="text" value="">
                    <br>
                    <label for="nama">Level</label>
                    <select name="edtlevel" class="form-select @error('level') is-invalid @enderror" name="level" id="level" required>
                        <option value="">Pilih Level</option>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                    </select><br>
                    <label for="password">password</label>
                    <input name="edtpass" id="password" class="form-control" type="password">
                    <br>
                    <label for="konpas">Konfirmasi password</label>
                    <input id="konpas" name="konpas" class="form-control" type="password">

                    <div class="modal-footer">
                        <button type="submit" name="btnUserEdt" class="btn btn-warning text-white">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- delete -->

          <div id="delete" class="modal" tabindex="-1">

            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-danger">
                  <h5 class="modal-title text-white">Delete User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    <input type="hidden" name="idUser" value="">
                    <p>apa anda yakin ingin menghapus user <span class="fw-bold fs-5" style="color: #FF6969">"{{ $item['name'] }}"</span></p>
                    <div class="modal-footer">
                      <a href="/hapususer/{{ $item['id'] }}" type="submit" name="hapusUser" class="btn btn-danger mt-0 mb-0">Hapus</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
            @endforeach
        </div>
    </div>
</div>

  @endsection

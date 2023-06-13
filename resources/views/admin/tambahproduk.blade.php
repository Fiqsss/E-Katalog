<!-- create.blade.php -->
@extends('layout.dashboard')

@section('container')
    <div class="container py-4" style="min-height: 90vh">
        <div class="row">
            <div class="col-lg-8 offset-2">
                <div class="card mb-4 mt-4 shadow">
                    <h4 class="text-center mt-5">Tambah Barang</h4>
                    <form enctype="multipart/form-data" method="post" action="/insertproduk"
                        class="row g-3 needs-validation px-5 mb-4 mx-4 bg-warnings" novalidate>

                        @csrf
                        <label for="nama" class="form-label">Nama</label>
                        <input name="namabarang" type="text" class="form-control mt-2" id="nama"
                            autocomplete="off" required>

                        <label for="matcode" class="form-label">MATCODE</label>
                        <input name="matcode" type="text" class="form-control mt-2" id="matcode"
                            autocomplete="off" required>

                        <label for="kategori" class="form-label">Kategori</label>
                        <input name="kategori" type="text" class="form-control mt-2" id="kategori"
                             autocomplete="off" required>

                        <label for="gambar" class="form-label">Gambar</label>
                        <input name="gambar" type="file" class="form-control mt-2" id="gambar"
                             >

                        <label for="deskripsi" class="form-label mt-3">Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control mt-2" id="deskripsi"
                            autocomplete="off" required>

                        <label for="Qty" class="form-label">Qty</label>
                        <input name="qty" type="number" class="form-control mt-2" id="Qty" autocomplete="off"  required>

                        <label for="tanggal" class="form-label">Tanggal Input</label>
                        <input name="tanggal" type="date" class="form-control mt-2" id="tanggal" >

                        <button type="submit" class="tambah btn bg-primary text-white">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

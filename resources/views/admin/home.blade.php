
@extends('layout.dashboard')
@section('container')
@include('partials.search')
<style>
    .wrap-full
    {
        display: flex;
        justify-content: center;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        position: relative;
        min-height: 30vh;
        min-width:150%;
        border: 0;
        border-radius: 0;
        margin-left: -100px
    }
.modal-content-fullscreen {
    display: flex;
    justify-content: center

}

.modal-body {
    overflow-y: auto;
}

</style>
<div class="btntambah d-flex justify-content-center w-100 my-3">
    <a class="btn btn-primary w-25 shadow" href="/admin/tambahproduk">Tambah Produk</a>
</div>
<section id="kategori" style="position: relative; margin-top:0px">
    <div class="container bg-white rounded shadow">
    <!-- Chard -->
    <div class="tabelKategori  mb-2 d-flex pt-3 justify-content-center ">
        <h6>Produk</h6>
    </div>
    <div class="row rounded pt-3 overflow-auto" style="height: 71vh">
        @foreach ($produk as $item )
        <div class="col-lg-4 col-md-6 mt-1 col-12">
            <div class="card mb-2 shadow">
            <div class="gambar">
                <a data-bs-toggle="modal" data-bs-target="#gam{{ $item['id'] }}">
                    <img class="w-100 rounded gam-det" style=" height:15rem; object-fit:cover;" src="{{ asset('produk/'.$item['gambar']) }}">
                </a>
                <div class="card-body pb-1">
                    <div class="nmabrg d-flex align-items-center" style="height: 100px">
                        <h5 class="card-title text-bold">{{ $item['namabarang'] }}</h5>
                    </div>
                    <p class="badge badge-sm bg-warning">{{ $item['kategori'] }}</p>
                    <p class="">{{ $item['matcode'] }}</p>
                    <a data-bs-toggle="modal" data-bs-target="#detail{{ $item['id'] }}" class="btn text-white w-100 mb-2" style="height: 2rem; background-color:#57C5B6;">
                        <p style="font-size:10px;">Detail</p>
                    </a>
                </div>
            </div>
            </div>
        </div>
        {{-- detail --}}
        <div class="modal"  tabindex="-1"  id="detail{{ $item['id'] }}" >
            <div class="modal-dialog d-flex align-items-center" style="width:100%; height:90% !important;" >
                <div class="wrap-full">
                    <div class="modal-content modal-content-fullscreen" style="overflow: auto; width: 100vh;">
                        <div class="wrap-modalhead d-flex justify-content-center">
                            <div class="modal-header " style="width: 100%;">
                                <h5 class="modal-title">Detail Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                            <div class="wrap-modalbody d-flex justify-content-center">
                                <div class="modal-body " style="width: 70vh;" >
                                    <table class="table table-success shadow" >
                                        <tr class="">
                                            <th>Matcode</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $item['matcode'] }}</td>
                                            <td>{{ $item['namabarang'] }}</td>
                                            <td>{{ $item['kategori'] }}</td>
                                            <td>{{ $item['tanggal'] }}</td>
                                        </tr>
                                    </table>
                                <hr>
                                <div class="editDelete d-flex justify-content-evenly">
                                    <a data-bs-toggle="modal" data-bs-target="#edit{{ $item['id'] }}" class="btn w-45 text-white h-25 w-25" style="background-color: #F2CD5C;">Edit</a>
                                    <a data-bs-toggle="modal" data-bs-target="#hapus{{ $item['id'] }}"  name="btnHapus" class="btn w-45 text-white h-25 w-25" style="background-color: #EB455F;">Delete</a>
                                </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- modal Gambar -->
            <div class="modal modalgambar shadow"   id="gam{{ $item['id'] }}" tabindex="-1">
            <div class="modal-dialog d-flex align-items-center justify-content-center " style=" height:90%;!important;">
                    <img id="gambaran" class="img-fluid shadow" src="{{ asset('produk/'.$item['gambar']) }}">
            </div>
            </div>
            {{-- modal hapus --}}
                <div class="modal w-100" id="hapus{{ $item['id'] }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idh">
                        <p>Yakin ingin menghapus data ini <span class="text-danger">  "{{ $item['namabarang'] }}"</span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <a name="btnHapus" href="/delete/{{ $item['id'] }}" class="delete btn bg-danger w-50 d-flex justify-content-center text-white">Hapus</a>
                    </div>
                    </div>
                </div>
                </div>
                {{-- modal Edit --}}
                <div class="modal" id="edit{{ $item['id'] }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-white">
                                <h5 class="modal-title">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('produkupdate', $item['id']) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="gambarLama" value="{{ $item['gambar'] }}">
                                    <label for="edtnama">Nama</label>
                                    <input id="edtnama" type="text" name="edtnama" class="form-control" value="{{ $item['namabarang'] }}"><br>
                                    <label for="edtmatcode">Matcode</label>
                                    <input id="edtmatcode" type="text" name="edtMatcode" class="form-control" value="{{ $item['matcode'] }}" required autocomplete="off"><br>
                                    <label for="edtkategori">Kategori</label>
                                    <input id="edtkategori" type="text" name="edtkategori" class="form-control" value="{{ $item['kategori'] }}"><br>
                                    <label for="edtgambar">Gambar</label><br>
                                    <img style="width: 50px; height:50px" src="{{ asset('produk/'.$item['gambar']) }}" alt=""><br>
                                    <input id="edtgambar" type="file" name="gambar" class="form-control"><br>
                                    <label for="edttanggal">Tanggal</label>
                                    <input id="edttanggal" type="date" name="edttanggal" class="form-control" value="{{ $item['tanggal'] }}"><br>
                                    <div class="modal-footer">
                                        <button type="submit" name="btnEdit" class="btn bg-warning w-100 text-white">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

</section>
 <div class="pagination d-flex justify-content-end align-items-center mt-3">

            <div class="keterangan me-3">
                    Menampilkan
                {{ $produk->firstItem() }}
                dari
                {{ $produk->lastItem() }}
                jumlah data
                {{ $produk->total() }}
            </div>
            <div class="tombol d-flex align-items-center mt-3 ">
            {{ $produk->links() }}
            </div>
        </div>
@endsection



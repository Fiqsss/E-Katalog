
@extends('layout.operator')
@section('container')
@include('partials.search')
<section id="kategori" style=" position: relative;">
    <div class="container my-3 bg-white rounded shadow">
    <!-- Chard -->
    <div class="tabelKategori  mb-2 mt-4 d-flex pt-3 justify-content-center ">
        <h6>Produk</h6>
    </div>
    <div class="row rounded pt-3">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item )
        <div class="col-lg-4 col-md-6 mt-1 col-12">
            <div class="card mb-2 shadow">
            <div class="gambar">
                <a data-bs-toggle="modal" data-bs-target="#gam{{ $item['id'] }}">
                    <img class="w-100 rounded gam-det" style=" height:15rem; object-fit:cover;" src="{{ asset('produk/'.$item['gambar']) }}">
                </a>
                <div class="card-body pb-1">
                    <h4 class="card-title text-bold">{{ $item['namabarang'] }}</h4>
                    <p class="badge bg-warning ">{{ $item['matcode'] }}</p><br>
                    <p class="badge badge-sm text-black-50">Qty :{{ $item['qty'] }}</p><br>

                    <div class="editDelete d-flex justify-content-evenly">
                        <a data-bs-toggle="modal" data-bs-target="#edit{{ $item['id'] }}" class="btn w-50 text-white me-1" style="height: 2rem ; background-color: #00DFA2;"><i class="fa-sharp fa-solid fa-cart-shopping fa-fade fa-sm"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#detail{{ $item['id'] }}" class="btn text-white w-50" style="height: 2rem; background-color:#57C5B6;">
                            <i class="fa-solid fa-circle-info"></i>
                        </a>
                    </div>

                </div>
            </div>
            </div>
        </div>
        {{-- detail --}}
        <div class="modal"  tabindex="-1"  id="detail{{ $item['id'] }}" >
            <div class="modal-dialog d-flex align-items-center justify-content-center" style="width:100%; height:90% !important;" >
                <div class="modal-content " style="overflow: auto; width: 100vh;">
                        <div class="modal-header" style="width: 70vh;">
                            <h5 class="modal-title">Detail Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body " style="width: 70vh;" >
                            <table class="table table-success shadow" >
                                <tr class="">
                                    <th>No</th>
                                    <th>Matcode</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Tgl Update</th>
                                </tr>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item['matcode'] }}</td>
                                    <td>{{ $item['namabarang'] }}</td>
                                    <td>{{ $item['kategori'] }}</td>
                                    <td>{{ $item['deskripsi'] }}</td>
                                    <td>{{ $item['tanggal'] }}</td>
                                </tr>
                            </table>
                        <hr>
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
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idh">
                        <p> ingin menghapus<span class="text-danger">  "{{ $item['namabarang'] }}"</span></p>
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
                                <h5 class="modal-title">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('produkupdate', $item['id']) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="gambarLama" value="{{ $item['gambar'] }}">
                                    <label for="edtmatcode">Matcode</label>
                                    <input id="edtmatcode" type="text" name="edtMatcode" class="form-control" value="{{ $item['matcode'] }}" required autocomplete="off"><br>
                                    <label for="edtnama">Nama</label>
                                    <input id="edtnama" type="text" name="edtnama" class="form-control" value="{{ $item['namabarang'] }}"><br>
                                    <label for="edtkategori">Kategori</label>
                                    <input id="edtkategori" type="text" name="edtkategori" class="form-control" value="{{ $item['kategori'] }}"><br>
                                    <img style="width: 50px; height:50px" src="{{ asset('produk/'.$item['gambar']) }}" alt=""><br>
                                    <input id="edtgambar" type="file" name="gambar" class="form-control"><br>
                                    <label for="edtgambar">Gambar</label><br>
                                    <label for="edtdeskripsi">Deskripsi</label>
                                    <input id="edtdeskripsi" type="text" name="edtdeskripsi" class="form-control" value="{{ $item['deskripsi'] }}"><br>
                                    <label for="edttanggal">Tanggal</label>
                                    <input id="edttanggal" type="time" name="edttanggal" class="form-control" value="{{ $item['tanggal'] }}"><br>
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

@endsection



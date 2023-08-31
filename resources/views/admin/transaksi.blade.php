@extends('layout.dashboard')

@section('container')

<section style="position: absolute; margin-top:220px; width:100%">
    {{-- Tombol untuk menambah transaksi --}}
    <button class="btn btn-primary shadow mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Transaksi</button>

    {{-- Modal untuk menambah transaksi --}}
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('inserttransaksi') }}">
                        @csrf
                        <select class="form-select" name="prod" id="">
                            <option>Pilih Produk</option>
                            @foreach ($produk as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->namabarang }} ({{ $prod->matcode }})</option>
                            @endforeach
                        </select><br>
                        <input class="form-control" type="number" name="qty_permintaan" placeholder="Qty Permintaan"><br>
                        <input class="form-control" type="date" name="tanggal_transaksi" placeholder="Tanggal Transaksi"><br>
                        <div class="modal-footer">
                            <button type="submit" name="btntransaksi" class="btn btn-primary">Tambah Transaksi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table style="background-color: #FFFAD7" class="table table-striped rounded shadow">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Matcode</th>
                <th scope="col">Qty Permintaan</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($transaksi as $item)
                <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->produk->namabarang }}</td>
                <td>{{ $item->produk->matcode }}</td>
                <td>
                    {{ $item->qty_permintaan }}
                </td>
                <td>
                    {{ $item->tanggal_transaksi }}
                </td>
                <td>
                    <form action="{{ route('status') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $item->id }}" name="idtransaksi">
                        <button type="submit" value="KOMPLIT" name="status" class="btn {{ $item->status == 'KOMPLIT' ? 'bg-success' : 'bg-info' }} text-white">{{ $item->status }}</button>
                    </form>
                </td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $item['id'] }}"class="btn btn-warning text-white">Edit</button>
                    <button class="btn btn-danger text-white text-center" data-bs-toggle="modal" data-bs-target="#hapus{{ $item['id'] }}">Del</button>
                </td>
                </tr>
            <!-- Modal Konfirmasi Hapus Data -->
            <div class="modal fade" id="hapus{{ $item['id'] }}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Hapus Transaksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p> Apakah Anda yakin ingin menghapus data ini <span class="text-danger">{{ $item->produk->namabarang }}</span> </p>
                        </div>
                        <div class="modal-footer">
                            <form action=""></form>
                            <!-- Tambahkan tombol submit untuk menghapus data -->
                            <a type="button" href="/transaksidelete/{{ $item['id'] }}" class="btn btn-danger" id="hapusDataConfirm">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal Edit --}}
            <div class="modal fade" id="edit{{ $item['id'] }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Transaksi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('edittransaksi',$item['id']) }}">
                                @csrf
                                @method('PUT')
                                <input type="text" readonly class="form-control" value="{{ $item->produk->namabarang }}"><br>
                                <input class="form-control" type="number" value="{{ $item['qty_permintaan'] }}" name="editqty" placeholder="Qty Permintaan"><br>
                                <input class="form-control" value="{{ $item->tanggal_transaksi }}" type="date" name="edittanggal" placeholder="Tanggal Transaksi"><br>
                                <div class="modal-footer">
                                    <button type="submit" name="btnedittransaksi" class="btn btn-primary">Edit Transaksi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </table>
    </tbody>
</div>

    <div class="pagination d-flex justify-content-between">
        <div class="keterangan">
            Menampilkan
            {{ $transaksi->firstItem() }}
            dari
            {{ $transaksi->lastItem() }}
            jumlah data
            {{ $transaksi->total() }}
        </div>
        <div class="tombol">
            {{ $transaksi->links() }}
        </div>
    </div>
</section>
@endsection

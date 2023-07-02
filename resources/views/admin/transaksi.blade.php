@extends('layout.dashboard')
@section('container')
    <section  style="position: absolute; margin-top:220px; width:100%">
        <table style="background-color: #FFFAD7" class="table table-striped rounded shadow">
            <button class="btn btn-primary shadow mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Transaksi
            </button>
            <thead >
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Matcode</th>
                    <th scope="col">Qty Permintaan</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider ">
                @foreach ($transaksi as $item)
                <tr class="text-center">
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $item->produk->namabarang }}</td>
                    <td>{{ $item->produk->matcode }}</td>
                    <td>
                        {{ $item->qty_permintaan }}
                    {{-- @foreach ($produk->transaksi as $transaksi )
                    @endforeach --}}
                    </td>
                    <td>
                        {{ $item->tanggal_transaksi }}
                        {{-- @foreach ($produk->transaksi as $transaksi )
                        @endforeach --}}
                    </td>
                    <form  action="{{ route('status') }}" method="POST" >
                        @csrf
                        @method('POST')
                        <td>
                            <input type="text" hidden value="{{ $item->id }}" name="idtransaksi">
                            <button type="submit" value="KOMPLIT" name="status" class="btn {{ $item->status == 'KOMPLIT' ? 'bg-success' : 'bg-warning' }} text-white">{{ $item->status }}</button>
                        </td>
                    </form>
                </tr>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            </tbody>

            @endforeach
        </table>
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


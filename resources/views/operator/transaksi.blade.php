@extends('layout.operator')
@section('container')
    <section  style="position: absolute; margin-top:220px; width:100%">
        <table style="background-color: #FFFAD7" class="table table-striped rounded shadow">
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
                    </td>
                    <td>
                        {{ $item->tanggal_transaksi }}
                    </td>
                        <td>
                            <h6 value="KOMPLIT" name="status" class="{{ $item->status == 'KOMPLIT' ? 'text-success' : 'text-warning' }}">{{ $item->status }}</h6>
                        </td>
                </tr>
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


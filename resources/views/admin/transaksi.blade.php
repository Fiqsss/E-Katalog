@extends('layout.dashboard')
@section('container')
    <table class="table table-bordered table-primary shadow rounded" style="position: absolute; margin-top:250px">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Matcode</th>
                <th scope="col">No Transaksi</th>
                <th scope="col">Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($produk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namabarang}}</td>
                    <td>{{ $item->matcode}}</td>
                    <td>{{ $item->transaksi->no_transaksi}}</td>
                    <td>{{ $item->tanggal}}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
@endsection

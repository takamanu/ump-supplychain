@extends('layouts.main')

@section('container')
    <h2>Transaksi {{ $transaksi->id }}</h2>
    <p>{{ $transaksi->created_at->format('D, d F Y H:i:s') }}</p>

    <table class="table table-striped">
        <tr>
            <th>Nama Pembeli</th>
            <td>{{ $transaksi->pembeli }}</td>
        </tr>
        <tr>
            <th>Nama Penjual</th>
            <td>{{ $transaksi->penjual }}</td>
        </tr>
        <tr>
            <th>Metode Pembayaran</th>
            <td>{{ $transaksi->bank->nama_bank }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $transaksi->produk->nama }}</td>
        </tr>
        <tr>
            <th>Jumlah Transaksi</th>
            <td>{{ $transaksi->jumlah_transaksi }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp{{ $transaksi->produk->harga }} x {{ $transaksi->jumlah_transaksi }} = Rp{{ $transaksi->total_harga }}</td>
        </tr>
    </table>
@endsection
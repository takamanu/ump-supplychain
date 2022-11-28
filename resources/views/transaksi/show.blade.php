@extends('layouts.main')

@section('container')
    <h2>Transaksi {{ $transaksi->id }}</h2>
    <p>{{ $transaksi->created_at->format('D, d F Y H:i:s') }}</p>

    <table class="table table-striped">
        <tr>
            <th>Nama Pembeli</th>
            <td>{{ $transaksi->pembeli }}</td>
            <td>
                <a href="/agen/{{ $transaksi->pembeli_id }}" role="button" class="btn btn-info"><i class="bi bi-person-fill"></i></a>
            </td>
        </tr>
        <tr>
            <th>Nama Penjual</th>
            <td>{{ $transaksi->penjual }}</td>
            <td>
                <a href="/agen/{{ $transaksi->penjual_id }}" role="button" class="btn btn-info"><i class="bi bi-person-fill"></i></a>
            </td>
        </tr>
        <tr>
            <th>Metode Pembayaran</th>
            <td colspan="2">{{ $transaksi->bank->nama_bank }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td colspan="2">{{ $transaksi->produk->nama }}</td>
        </tr>
        <tr>
            <th>Jumlah Transaksi</th>
            <td colspan="2">{{ $transaksi->jumlah_transaksi }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td colspan="2">Rp{{ $transaksi->produk->harga }} x {{ $transaksi->jumlah_transaksi }} = Rp{{ $transaksi->total_harga }}</td>
        </tr>
    </table>

    <br>

    <a href="/transaksi" role="button" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
    <a href="/transaksi/{{ $transaksi->id }}/edit" role="button" class="btn btn-warning">
        <i class="bi bi-pencil-square"></i>
        Edit
    </a>
@endsection
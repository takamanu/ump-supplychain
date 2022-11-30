@extends('layouts.main')

@section('container')
    <h2>Transaksi {{ $transaksi->id }}</h2>
    <p>{{ $transaksi->created_at->format('D, d F Y H:i:s') }}</p>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Nama Pembeli</span>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" value="{{ $transaksi->pembeli }}" disabled>
            </div>
            <div class="col-md-1">
                <a href="/agen/{{ $transaksi->pembeli_id }}" role="button" class="btn btn-info"><i
                    class="bi bi-person-fill"></i></a>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Nama Penjual</span>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" value="{{ $transaksi->penjual }}" disabled>
            </div>
            <div class="col-md-1">
                <a href="/agen/{{ $transaksi->penjual_id }}" role="button" class="btn btn-info"><i
                    class="bi bi-person-fill"></i></a>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Metode Pembayaran</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $transaksi->bank->nama_bank }}" disabled>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Nama Produk</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $transaksi->produk->nama }}" disabled>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Jumlah Transaksi</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $transaksi->jumlah_transaksi }}" disabled>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Total Harga</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $transaksi->total_harga }}" disabled>
            </div>
        </div>
        
    </div>

    <br>

    <a href="/transaksi" role="button" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Menu Utama
    </a>
    @if ($transaksi->penjual_id === $user)
        <a href="/transaksi/{{ $transaksi->id }}/edit" role="button" class="btn btn-warning">
            <i class="bi bi-pencil-square"></i>
            Edit
        </a>
        <form action="/transaksi/{{ $transaksi->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i
                    class="bi bi-trash"></i>Hapus</button>
        </form>
    @endif
@endsection

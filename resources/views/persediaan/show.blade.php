@extends('layouts.main')

@section('container')
    <h2>{{ $stock->produk->nama }}</h2>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">ID Produk</span>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" value="{{ $stock->produk->id }}" disabled>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Harga</span>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" value="{{ $stock->produk->harga }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Harga Member</span>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" value="{{ $stock->produk->harga_member }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Stock</span>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" value="{{ $stock->jumlah_barang }}" disabled>
            </div>
        </div>
    </div>

    <br>

    <a href="/persediaan" role="button" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
    <a href="/persediaan/{{ $stock->id }}/edit" role="button" class="btn btn-warning">
        <i class="bi bi-pencil-square"></i>
        Edit
    </a>
@endsection
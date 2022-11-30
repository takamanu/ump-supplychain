@extends('layouts.main')

@section('container')
<h2>Edit Persediaan</h2>

<br>

<div class="col-lg-5">
    <form method="post" action="/persediaan/{{ $stock->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <input type="hidden" name="produk_id" value="{{ $stock->produk->id }}">
            <label for="nama" class="form-label">Nama Produk</label>
            <br>
            <input class="form-control" type="text" name="nama" id="nama" value="{{ $stock->produk->nama }}" readonly="readonly">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <br>
            <input class="form-control form-label" type="number" name="harga" id="harga" value="{{ $stock->produk->harga }}" readonly="readonly">
            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_member" class="form-label">Harga Member</label>
            <br>
            <input class="form-control" type="number" name="harga_member" id="harga_member" value="{{ $stock->produk->harga_member }}" readonly="readonly">
            @error('harga_member')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Stock</label>
            <br>
            <input class="form-control" type="number" name="jumlah_barang" id="jumlah_barang" value="{{ old('jumlah_barang', $stock->jumlah_barang) }}">
            @error('jumlah_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <br>
        <a href="/persediaan" role="button" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Menu Utama
        </a>
        <button type="submit" class="btn btn-primary">Edit Persediaan</button>
    </form>
</div>
@endsection
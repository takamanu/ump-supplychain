@extends('layouts.main')


@section('container')
    <h2>Tambah Transaksi</h2>

    <div class="col-lg-5">
        <form method="post" action="/transaksi">
            @csrf
            <div class="mb-3">
                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                <br>
                <select class="form-select form-select-sm @error('jenis_transaksi') is-invalid @enderror" name="jenis_transaksi" required>
                    <option selected disabled>Pilih Jenis Transaksi</option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Penjualan">Penjualan</option>
                </select>
                @error('jenis_transaksi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembeli_id" class="form-label">Pihak Pembeli/Penjual</label>
                <br>
                <select name="pembeli_id" id="pembeli_id" class="form-select form-select-sm @error('pembeli_id') is-invalid @enderror" required>
                    <option selected disabled>Pilih Pembeli/Penjual</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('pembeli_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="produk" class="form-label">Nama Produk</label>
                <br>
                <select class="form-select form-select-sm @error('produk') is-invalid @enderror" name="produk_id" required>
                    <option selected disabled>Pilih Produk</option>
                    @foreach ($products as $product)
                        @if (old('produk_id') === $product->id)
                            <option value="{{ $product->id }}" selected>{{ $product->nama }}</option>
                        @else
                            <option value="{{ $product->id }}">{{ $product->nama }}</option>
                        @endif
                    @endforeach
                </select>
                @error('produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="hargaProduk" class="form-label">Harga Produk</label>
                <input type="text" class="form-control" id="hargaProduk" name="hargaProduk">
            </div> --}}
            <div class="mb-3">
                <label for="jumlah_transaksi" class="form-label">Jumlah Transaksi</label>
                <br>
                <input type="number" class="form-control w-25 @error('jumlah_transaksi') is-invalid @enderror"
                    id="jumlah_transaksi" name="jumlah_transaksi" required value="{{ old('jumlah_transaksi') }}">
                @error('jumlah_transaksi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <br>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-select form-select-sm @error('metode_pembayaran') is-invalid @enderror" required>
                    <option selected disabled>Pilih Metode Pembayaran</option>
                    @foreach($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
        </form>
    </div>
@endsection

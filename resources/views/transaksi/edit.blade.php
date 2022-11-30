@extends('layouts.main')


@section('container')
    <h2>Edit Transaksi</h2>

    <div class="col-lg-5">
        <form method="post" action="/transaksi/{{ $transaksi->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="pembeli" class="form-label">Pembeli</label>
                <br>
                <select name="pembeli" id="pembeli" class="form-control form-select form-select-sm @error('pembeli') is-invalid @enderror"
                    required>
                    <option selected disabled>Pilih Pembeli</option>
                    @foreach ($users as $user)
                        @if (old('user_id', $transaksi->pembeli) === $user->id)
                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('pembeli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="produk" class="form-label">Nama Produk</label>
                <br>
                <select class="form-control form-select form-select-sm @error('produk') is-invalid @enderror" name="produk_id" required>
                    <option selected disabled>Pilih Produk</option>
                    @foreach ($products as $product)
                        @if (old('produk_id', $transaksi->produk_id) === $product->id)
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
                <input type="number" class="form-control @error('jumlah_transaksi') is-invalid @enderror"
                    id="jumlah_transaksi" name="jumlah_transaksi" required
                    value="{{ old('jumlah_transaksi', $transaksi->jumlah_transaksi) }}">
                @error('jumlah_transaksi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bank_id" class="form-label">Metode Pembayaran</label>
                <br>
                <select name="bank_id" id="bank_id"
                    class="form-control form-select form-select-sm @error('metode_pembayaran') is-invalid @enderror" required>
                    <option selected disabled>Pilih Metode Pembayaran</option>
                    @foreach ($banks as $bank)
                        @if (old('bank_id', $transaksi->bank_id) == $bank->id)
                            <option value="{{ $bank->id }}" selected>{{ $bank->nama_bank }}</option>
                        @else
                            <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <a href="{{ url()->previous() }}" role="button" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
            <button type="submit" class="btn btn-primary">Edit Transaksi</button>
        </form>
    </div>
@endsection

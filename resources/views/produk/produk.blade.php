@extends('layouts.main')

@section('container')
    <h2>Informasi Produk</h2>
    <hr>

    @if ($userRole === 1)
        <div class="card d-flex mb-3">
            <a href="/produk/create" class="btn btn-primary">Tambah Produk</a>
        </div>
    @endif


    @if (session()->has('success'))
        <div class="card-body">
            <br>
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Harga Member</th>
                @if ($userRole === 1)
                    <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->harga_member }}</td>
                    @if ($userRole === 1)
                        <td>
                            <form action="/produk/{{ $product->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection

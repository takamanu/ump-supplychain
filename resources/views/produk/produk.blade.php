@extends('layouts.main')

@section('container')
<div class="container">
  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                  <h2>Products list</h2>
              </div>
              <div class="card-body">
                  <a href="{{ url('/produk/create') }}" class="btn btn-success btn-sm float-left" title="Add New Product">
                      <i class="fa fa-plus" aria-hidden="true"></i> Add new product
                  </a>
                  {{-- <form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                      <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" name="cari" id="cari" placeholder="Search for..."
                          value={{ $cari }}>
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="submit" name="submit">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form> --}}
                  <br><br>
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                  @if (session('status2'))
                      <div class="alert alert-success">
                          {{ session('status2') }}
                      </div>
                  @endif
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>QR Code</th>
                                  <th>Name</th>
                                
                                  <th>Created by</th>
                                  
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($products as $item)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td><img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl={{$item->qr_code_produk}}"/></td>
                                  <td>{{ $item->nama }}</td>
                              
                                  <td>{{ $item->user->name}}</td>

                                  <td><a href="#" title="View Produk"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a></td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                      {{-- <div class="row">
                          <div class="col-md-8">
                              Showing data from {{ $products->firstItem() }} to {{ $agen->lastItem() }} of total {{ $agen->total() }} data.
                          </div>
                          <div class="col-md-4">
                              {{-- {{ $siswa->links() }} --}}
                              {{-- $agen->links()}}
                          </div>
                      </div> --}}
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

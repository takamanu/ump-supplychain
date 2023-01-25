@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Location of Product</h2>
                </div>
                <div class="card-body">
                    <a href="{{ url('/katalog/create') }}" class="btn btn-success btn-sm float-left" title="Add New Product">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add tracking
                    </a>
                    {{-- <div class="float-left">
                      <div class="col d-flex justify-content-center">
                          <button type="button" id="bukaqr" class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#qrModal" data-backdrop="static" data-keyboard="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                              <path d="M2 2h2v2H2V2Z"></path>
                              <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"></path>
                              <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"></path>
                              <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"></path>
                              <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"></path>
                          </svg>&nbsp;Scan with QR
                          </button>
  
                          <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
                                          <button class="close" id="tutupeqr" type="button" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="d-flex align-content-center justify-content-center col-md-12">
                                              <div id="reader" width="2000px"></div>  
                                              <input type="hidden" id="result">
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="btn btn-secondary" id="tutupqr" type="button" data-dismiss="modal">Batal</button>
                                      </div>
                                  </div>    
                              </div>
                          </div>
                      </div>
                  </div> --}}
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
                                    <th>Product Name</th>
                                    <th>Created by</th>
                                    <th>Last Location</th>
                                    <th>Total Footprint</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach($location as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl={{$item->qr_code_produk}}"/></td>
                                    <td>{{ $item->nama }}</td>
                                
                                    <td>{{ $item->user->name}}</td>
  
                                    <td><a href="#" title="View Produk"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a></td>
                                </tr>
                            @endforeach --}}
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
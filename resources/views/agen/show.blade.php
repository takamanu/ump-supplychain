@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-header"><b>Staff: {{ $agen->name }}</b></div>
    
        <div class="card-body">
            <div class="container">
                <main>
                    <div class="row g-10">
                        <div class="col-md-7 col-lg-8">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center"><h3><b>Qr Code</b></h3></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    
                                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{$agen->qr_code}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Name</b></div>
                                <div class="col-md-8">{{ $agen->name }}</div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4"><b>NIK</b></div>
                                <div class="col-md-8">{{ $agen->nik }}</div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-4"><b>Email</b></div>
                                <div class="col-md-8">{{ $agen->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Date of Birth</b></div>
                                <div class="col-md-8">{{ $agen->date }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Password default</b></div>
                                <div class="col-md-8">{{ $agen->date_string }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Phone Number</b></div>
                                <div class="col-md-8">{{ $agen->phone }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Company</b></div>
                                <div class="col-md-8">{{ $agen->companies->company_name }}</div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4"><b>Rekening</b></div>
                                <div class="col-md-8">{{ $agen->rekening }} <b>({{ $banks->nama_bank }})</b></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Jenis Kelamin</b></div>
                                @if($agen->gender =='1') 
                                    <div class="col-md-8">Laki-laki</div>
                                @elseif($agen->gender =='2')
                                    <div class="col-md-8">Perempuan</div>
                                @else
                                    <div class="col-md-8">Belum menentukan gender</div>
                                @endif
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-md-4"><b>Provinsi</b></div>
                                <div class="col-md-8">{{$provinces->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Kabupaten/Kota</b></div>
                                <div class="col-md-8">{{ $regencies->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Kecamatan</b></div>
                                <div class="col-md-8">{{ $districts->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Kode Pos</b></div>
                                <div class="col-md-8">{{ $agen->postal_code }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Alamat</b></div>
                                <div class="col-md-8">{{ $agen->address }}</div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-4"><b>Date created</b></div>
                                <div class="col-md-8">{{ $agen->created_at }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>Date updated</b></div>
                                <div class="col-md-8">{{ $agen->updated_at }}</div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4"><b>Status</b></div>
                                @if($agen->role =='1') 
                                    <div class="col-md-8">Admin</div>
                                @elseif($agen->role =='2') 
                                    <div class="col-md-8">Supervisor</div>
                                @else
                                    <div class="col-md-8">Member</div>
                                @endif
                            </div> --}}
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Back</a>
                                </div>
                                <div class="col-md-8"></div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    
</div>
@stop
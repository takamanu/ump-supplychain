@extends('layouts.main')

@section('container')
<script>
        function fixAspect(img) {
            var $img = $(img),
                width = $img.width(),
                height = $img.height(),
                tallAndNarrow = width / height < 1;
            if (tallAndNarrow) {
                $img.addClass('tallAndNarrow');
            }
            $img.addClass('loaded');
        }
    </script>
<div class="card">
    <div class="card-header">
        <h2>Profil</h2>
    </div>
    
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @elseif (session('flash_message_error'))
        <div class="alert alert-danger">
            {{ session('flash_message_error') }}
        </div>
    @endif
    <div class="card-body">
        <div class="input-group mb-3 w-25">
            <div class="circle">
                <img src="{{asset(Auth::user()->avatar)}}" alt="" onload='fixAspect(this);'>
            </div>
        </div>
        
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Name</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{$agen->name}}" disabled>
            </div>
        </div>
    
    
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">NIK</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="nik" class="form-control" value="{{$agen->nik}}" disabled>
            </div>
        </div>                 
    
    
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Email</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="email" class="form-control" value="{{$agen->email}}" disabled>
            </div>
        </div>             
    
    
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">No. Telpon</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="phone" class="form-control" value="{{$agen->phone}}" disabled>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Rekening</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="rekening" class="form-control" value="{{$agen->rekening}} ({{$banks->nama_bank}}) " disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Jenis Kelamin</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="gender" class="form-control" value="{{$agen->gender}}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Provinsi</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="provinsi" class="form-control" value="{{$provinces->name}}" disabled>
            </div>
        </div>      
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Kabupaten/Kota</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="kabupaten" class="form-control" value="{{$regencies->name}}" disabled>
            </div>    
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Kecamatan</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="kecamatan" class="form-control" value="{{$districts->name}}" disabled>
            </div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Kode Pos</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="postal_code" class="form-control" value="{{$agen->postal_code}}" disabled>
            </div>    
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Alamat</span>
            </div>
            <div class="col-md-10">
                <input type="text" aria-label="address" class="form-control" value="{{$agen->address}}" disabled>
            </div>  
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <span class="input-group-text bg-primary text-white">Password</span>
            </div>
            <div class="col-md-10">
                <input type="password" aria-label="password" class="form-control" value="password123" disabled>
            </div>
        </div>
        <a href="{{ url('/profile/' . $agen->id . '/edit') }}" class="btn btn-success">Edit Profil
        </a>

    </div>
</div>
@endsection
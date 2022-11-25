@extends('layouts.main')

@section('container')
<body class="bg-gradient-primary">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    {{-- <script>
        function onChangeSelect(url, id, name) {
          // send ajax request to get the cities of the selected province and append to the select tag
          $.ajax({
            url: url,
            type: 'GET',
            data: {
              id: id
            },
            success: function (data) {
              $('#' + name).empty();
              $('#' + name).append('<option>==Pilih Salah Satu==</option>');
              $.each(data, function (key, value) {
                $('#' + name).append('<option value="' + key + '">' + value + '</option>');
              });
            }
          });
        }
        $(function () {
          $('#provinsi').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
          });
          $('#kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
          })
          $('#kecamatan').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
          })
        });
    </script> --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <div class="card">
        <div class="card-header"><b>Tambah Member Kopti Salatiga</b></div>
        
        <div class="card-body">
            
            <div class="container">
                <main>
                    <div class="row g-5">
                        <div class="col-md-7 col-lg-8">
                            
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <h4 class="mb-3">Identitas Pengguna</h4>
                                    
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                                    <br>
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="" required>
                                            @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                            
                                        <div class="col-sm-6">
                                            <label for="telepon" class="form-label">No. Telepon</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="" required>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="date" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="" placeholder="" required>
                                            @error('tanggal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="gender" class="form-label">Jenis Kelamin</label>
                                            {{-- <input type="text" class="form-control @error('') is-invalid @enderror" id="kecamatan" placeholder="" value="" required> --}}
                                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" required>
                                                <option>Pilih salah satu</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                                
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                            
                                        <div class="col-sm-4">
                                            @if(Auth::user()->role =='1')
                                                <label for="role" class="form-label">Role</label>
                                                {{-- <input type="text" class="form-control @error('') is-invalid @enderror" id="kecamatan" placeholder="" value="" required> --}}
                                                <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                                                    <option value="0" selected>Member</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Supervisor</option>
                                                    
                                                </select>
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @elseif(Auth::user()->role =='2')
                                                <label for="role" class="form-label">Role</label>
                                                {{-- <input type="text" class="form-control @error('') is-invalid @enderror" id="kecamatan" placeholder="" value="" required> --}}
                                                <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                                                    <option value="0" selected>Member</option>
                                                    <option value="2">Supervisor</option>
                                                    
                                                </select>
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @else
                                                <label for="role" class="form-label">Role</label>
                                                {{-- <input type="text" class="form-control @error('') is-invalid @enderror" id="kecamatan" placeholder="" value="" required> --}}
                                                <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" disabled>
                                                    <option value="0" selected>Member</option>
                                                    
                                                </select>
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @endif

                                        </div>
                                        {{-- <div class="col-sm-4">
                                            <label for="bulan" class="form-label">Bulan</label>
                                            <input type="text" class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan" value="" placeholder="" required>
                                            @error('bulan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="tahun" class="form-label">Tahun</label>
                                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="" placeholder="" required>
                                            @error('tahun')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="rekening_type" class="form-label">Nama Bank</label>
                                            <select class="form-control @error('rekening_type') is-invalid @enderror" name="rekening_type" id="rekening_type" required>
                                            <option>==Pilih Salah Satu==</option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                                            @endforeach
                                            </select>
                                            @error('rekening_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                            
                                        <div class="col-sm-6">
                                            <label for="rekening" class="form-label">No. Rekening</label>
                                            <input type="text" class="form-control @error('rekening') is-invalid @enderror" id="rekening" name="rekening" value="{{ old('rekening') }}">
                                            @error('rekening')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        
                                    </div>
                                    <br><br>
                                    <h4 class="mb-3">Alamat Pengguna</h4>
                                    
                                
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            {{-- <input type="text" class="form-control @error('') is-invalid @enderror" id="province" placeholder="" value="" required> --}}
                                            <select class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" required>
                                                <option>Pilih salah satu</option>
                                                
                                                @foreach ($provinces as $provinsi)
                                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('provinsi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                            
                                        <div class="col-sm-6">
                                            <label for="city" class="form-label">Kota/Kabupaten</label>
                                            {{-- <input type="text" class="form-control @error('') is-invalid @enderror" id="city" placeholder="" value="" required> --}}
                                            <select class="form-control @error('city') is-invalid @enderror" name="kabupaten" id="kabupaten" required>
                                                <option>Pilih salah satu</option>
                                                
                                                {{-- @foreach ($regencies as $kabupaten)
                                                    <option value="{{ $kabupaten->name }}">{{ $kabupaten->name }}</option>
                                                @endforeach --}}
                                            </select>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="kecamatan" class="form-label">Kecamatan</label>
                                            {{-- <input type="text" class="form-control @error('') is-invalid @enderror" id="kecamatan" placeholder="" value="" required> --}}
                                            <select class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" required>
                                                <option>Pilih salah satu</option>
                                                {{-- @foreach ($districts as $kecamatan)
                                                    <option value="{{ $kecamatan->name }}">{{ $kecamatan->name }}</option>
                                                @endforeach --}}
                                            </select>
                                            @error('kecamatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                            
                                        <div class="col-sm-6">
                                            <label for="postal_code" class="form-label">Kode Pos</label>
                                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" placeholder="" required>
                                            @error('postal_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <br>
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea rows="3" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" style="resize:none"></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br>
                                    
                                    
                                </div>
                                <br>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                                
                            </form>
                        </div>

                    </div>
                </main>
            
            </div>
        
        </div>

    </div>  
             

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script>
    $(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){
            $('#provinsi').on('change', function(){
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkabupaten') }}",
                    data: {id_provinsi:id_provinsi},
                    cache: false,

                    success: function(msg){
                        
                        $('#kabupaten').html(msg).prepend('<option selected>Pilih salah satu</option>');
                        $('#kecamatan').html(msg).prepend('<option selected>Pilih salah satu</option>');

                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            })

            $('#kabupaten').on('change', function(){
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {id_kabupaten:id_kabupaten},
                    cache: false,

                    success: function(msg){
                        $('#kecamatan').html(msg).prepend('<option selected>Pilih salah satu</option>');
                        
                        
                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            })

        })
    });
    
</script>
</body>

@stop
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-flex justify-content-center"><img src="koptiLogo.jpg" alt="Kopti"/></div> --}}
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Dashboard Supply Chain</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" class="form-control form-control-user" placeholder="Password"
                                            name="password" required autocomplete="current-password">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col d-flex justify-content-center">
                                                <button type="button" id="bukaqr" class="btn btn-primary" href="#" data-toggle="modal" data-target="#logoutModal" data-backdrop="static" data-keyboard="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                                                    <path d="M2 2h2v2H2V2Z"></path>
                                                    <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"></path>
                                                    <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"></path>
                                                    <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"></path>
                                                    <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"></path>
                                                </svg>&nbsp;Scan with QR
                                                </button>

                                                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        </div>
                                            {{-- <div class="col d-flex justify-content-center">
                                                <button type="button" id="bukaqr" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                                                    <path d="M2 2h2v2H2V2Z"></path>
                                                    <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"></path>
                                                    <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"></path>
                                                    <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"></path>
                                                    <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"></path>
                                                  </svg>&nbsp;Scan with QR
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Scan to login</h1>
                                                                <button type="button" id="tutupeqr" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" id="tutupqr" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                            
                                            <!-- Button trigger modal -->
                                            
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Ingat saya') }}
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Masuk') }}
                                        </button>
                                        <br>
                                        <p style="color:black;">Ingin memberi kritik dan saran? <a href="/helpdesk">Klik disini.</a></p>
                                        
                                        {{-- <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                    </form>
                                    
                                    <!--@if (Route::has('password.request'))-->
                                    <!--    <a class="btn btn-link" href="{{ route('password.request') }}">-->
                                    <!--        {{ __('Forgot Your Password?') }}-->
                                    <!--    </a>-->
                                    <!--@endif-->
                                    
                                    {{-- @if (Route::has('register'))
                                        <a class="btn btn-link" href="{{ route('register') }}">{{ __('Create an Account') }}</a>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
    <script src="/js/templateadmin.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            $('#bukaqr').click(function(){
                console.log("Test");
                let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader",
                { fps: 30, qrbox: {width: 1200, height: 1200} },
                /* verbose= */ false);
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                $('#tutupqr').click(function(){
                    console.log("Test tutup");
                    html5QrcodeScanner.clear().then(_ => {
                        // the UI should be cleared here      
                    }).catch(error => {
                        // Could not stop scanning for reasons specified in `error`.
                        // This conditions should ideally not happen.
                    });
                });
                $('#tutupeqr').click(function(){
                    console.log("Test tutup");
                    html5QrcodeScanner.clear().then(_ => {
                        // the UI should be cleared here      
                    }).catch(error => {
                        // Could not stop scanning for reasons specified in `error`.
                        // This conditions should ideally not happen.
                    });
                });
            });
        });


        // function closeCamera(){
        //     console.log("Test tutup");
        //     html5QrcodeScanner.clear().then(_ => {
        //         // the UI should be cleared here      
        //     }).catch(error => {
        //         // Could not stop scanning for reasons specified in `error`.
        //         // This conditions should ideally not happen.
        //     });
        // };

        
           
        

    function onScanSuccess(decodedText, decodedResult) {
            
            $("#result").val(decodedText)
            
            // $t=time();
            // alert($t . "<br>");
            // alert(date("Y-m-d",$t));
           
            let id= decodedText

            csrf_token = $('meta[name="csrf-token"]').attr('content');
            Swal.fire({
                
                title : 'Sukses Login!',
                text : 'Klik ok untuk melanjutkan!',
                confirmButtonColor:'#3085d6',
                confirmButtonText:'Ok',
            }).then((result)=>{
                // $("#staticBackdrop").modal('toggle');
                if(result.value){
                    $.ajax({
                        url : "{{ route('validasiqr')}}",
                        type : "POST",
                        data : {
                            '_method' : 'POST',
                            '_token' : csrf_token,
                            'qr_code' : id,
                        },
                        success: function (response){
                            
                            // BAGIAN SETTING JAM BERAPA TELATNYA
                            // var numHour = 8;
                            // var numMin = 40;

                            // console.log(response.nama);
                            // var asiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Bangkok"});
                            // now = new Date(asiaTime);
                            // var hour = now.getHours();
                            // var day = now.getDay();
                            // var minutes = now.getMinutes();
                            // console.log(hour);
                            // console.log(minutes);

                            if(response.status_error){
                                Swal.fire({
                                    type: 'error',
                                    title : 'Oh, tidak!',
                                    text : 'QR code tidak ditemukan.'
                                });
                            
                            // else if(hour >= numHour && minutes >= numMin){
                            //     Swal.fire({
                            //         icon : 'info',
                            //         type : 'error',
                            //         title : 'Telat!',
                            //         html:
                            //                 '<b>'+ response.nama +'</b>, ' +
                            //                 'kamu telat karena baru masuk pada jam ' + '<b>'+ response.waktu +'</b> !', 
                            //     });
                            } else {
                            Swal.fire({
                                icon : 'success',
                                title : 'Sukses! ',
                                timer: 5000,
                                html:
                                        '<b>'+ response.nama +'</b>, ' +
                                        'berhasil login ' + ' WIB</b> !', 
                            }).then(function(){
                                window.location.href = "/";});
                            }
                        }
                    })
                }
            })
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }
        // $("#exampleModal").on('shown', function(){
        //     let html5QrcodeScanner = new Html5QrcodeScanner(
        //     "reader",
        //     { fps: 30, qrbox: {width: 1200, height: 1200} },
        //     /* verbose= */ false);
        //     html5QrcodeScanner.render(onScanSuccess, onScanFailure);    
        //});
        
    </script>

</body>
    

            {{-- <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Login') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main> --}}
</html>

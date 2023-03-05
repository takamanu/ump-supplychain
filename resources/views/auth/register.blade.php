<!DOCTYPE html> 

<head>
            
            
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Register - {{ config('app.name', 'Laravel') }}</title>


        <!-- Custom fonts for this template-->
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="/css/templateadmin.css" rel="stylesheet">

        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        </head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-center"><img src="scmslogo.png" width="100%" alt="Kopti"/></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Agency Register</h1>
                            </div>
                            <div class="card text-center">
                                <nav class="nav nav-pills nav-fill">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-transaksi-tab" data-bs-toggle="tab" data-bs-target="#nav-transaksi"
                                            type="button" role="tab" aria-controls="nav-transaksi" aria-selected="true">
                                            Customer
                                        </button>
                        
                                        <button class="nav-link" id="nav-pemasukan-tab" data-bs-toggle="tab" data-bs-target="#nav-pemasukan"
                                            type="button" role="tab" aria-controls="nav-pemasukan" aria-selected="true">
                                            Non-Customer
                                        </button>
                        
                                        {{-- <button class="nav-link" id="nav-pengeluaran-tab" data-bs-toggle="tab" data-bs-target="#nav-pengeluaran"
                                            type="button" role="tab" aria-controls="nav-pengeluaran" aria-selected="true">
                                            Pengeluaran
                                        </button> --}}
                                    </div>
                                </nav>
                                <div class="tab-content" id="new-tabContent">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active p-3" id="nav-transaksi" role="tabpanel"
                                            aria-labelledby="nav-transaksi-tab">
                                            
                        
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-sm-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                                    </div> --}}
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col d-flex justify-content-start">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Register') }}
                                                        </button>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="text-center">
                                                    Already have an account? <a href="{{ route('login') }}">Login</a>
                                                </div>
                                                
                                                {{-- <a href="#" class="btn btn-google btn-user btn-block">
                                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                                </a>
                                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                                </a> --}}
                                            </form>
                                        </div>
                        
                                        <div class="tab-pane fade p-3" id="nav-pemasukan" role="tabpanel" aria-labelledby="nav-pemasukan-tab">
                                            
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name" required autocomplete="company_name" autofocus>
                                            
                                                        @error('company_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                                                            <option value="" disabled selected>Select company role</option>
                                                            <option value="2">Customer</option>
                                                            <option value="1">Retailer</option>
                                                            <option value="1">Transport</option>
                                                            <option value="1">Vendor</option>
                                                            <option value="1">Warehouse</option>
                                                            <option value="1">Wholesaler</option>
                                                            <option value="0">Manufacturer</option>
                                                            
                                                        </select>
                                                        @error('role')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input id="company_location" type="text" class="form-control @error('company_location') is-invalid @enderror" name="company_location" value="{{ old('company_location') }}" placeholder="Company location" required autocomplete="company_location" autofocus>
                                            
                                                        @error('company_location')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col d-flex justify-content-start">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Register') }}
                                                        </button>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="text-center">
                                                    Already have an account? <a href="{{ route('login') }}">Login</a>
                                                </div>
                                                {{-- <a href="#" class="btn btn-google btn-user btn-block">
                                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                                </a>
                                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                                </a> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <!-- Bootstrap core JavaScript-->

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <script src="/js/templateadmin.js"></script>
    <!-- Custom scripts for all pages-->

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level plugins -->

    <!-- Page level custom scripts -->
    <script src="/js/chart-area-demo.js"></script>
    <script src="/js/chart-pie-demo.js"></script>
    
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <!-- Page level custom scripts -->

    <!-- chart.js script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- chart.js script -->
    @yield('script')

</body>

</html>
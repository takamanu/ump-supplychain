@extends('layouts.main')

@section('container')
<div class="container">
  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                  <h2>Components list</h2>
              </div>
              <div class="card-body">
                  <a href="{{ url('/persediaan/create') }}" class="btn btn-success btn-sm float-left" title="Add New Product">
                      <i class="fa fa-plus" aria-hidden="true"></i> Add new components
                  </a>
                  <div class="float-left">
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
                </div>
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
                          {{-- @foreach($components as $item)
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{--
    <!-- Material Design Bootstrap-->
    <script type="text/javascript" src="/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script> --}}

    <!-- Web3.js -->
    <script src="/assets/js/web3.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>

    <!-- QR Code Library-->

    <!-- QR Code Reader -->
	<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>

    <script src="/assets/js/app.js"></script>
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
                
                title : 'Sukses Scan!',
                text : 'Klik ok untuk melanjutkan!',
                confirmButtonColor:'#3085d6',
                confirmButtonText:'Ok',
            }).then((result)=>{
                // // Initialize Web3
                // if (typeof web3 !== 'undefined') {
                //     web3 = new Web3(web3.currentProvider);
                //     web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
                // } else {
                //     web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
                // }

                // // Set the Contract
                // var contract = new web3.eth.Contract(contractAbi, contractAddress);
                
                web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));

        // Set the Contract
                var contract = new web3.eth.Contract(contractAbi, contractAddress);
                event.preventDefault(); // to prevent page reload when form is submitted
                // greeting = $('input').val();
                console.log(id);
            //$("#database").text(greeting);

                contract.methods.searchProduct(id).call(function(err, result) {
                    console.log(err, result)
                    Swal.fire({
                        icon : 'success',
                        title : 'Sukses! ',
                        confirmButtonColor:'#3085d6',
                        confirmButtonText:'Ok',
                        html:
                                result,
                    }).then((result)=>{
                        contract.methods.getTotalValue(id).call(function(err, result) {
                        console.log(err, result)
                        Swal.fire({
                            icon : 'success',
                            title : 'Sukses! ',
                            confirmButtonColor:'#3085d6',
                            confirmButtonText:'Ok',
                            html:
                                    '<b>Your total carbon footprint is: <span style="color:blue">'+ result +' kg Co2</span></b>', 
                            })
                        })

                    })
                    // $(".cardstyle").show("fast","linear");
                    // $("#database").html(result);
                });
                // contract.methods.getTotalValue(id).call(function(err, result) {
                //     console.log(err, result)
                //     Swal.fire({
                //         icon : 'success',
                //         title : 'Sukses! ',
                //         confirmButtonColor:'#3085d6',
                //         confirmButtonText:'Ok',
                //         html:
                //                 '<b>Total of your carbon footprint: '+ result +' kg Co2</b>, ', 
                //     })
                // });
                // $("#staticBackdrop").modal('toggle');
                // if(result.value){
                //     $.ajax({
                //         url : "{{ route('validasiqr')}}",
                //         type : "POST",
                //         data : {
                //             '_method' : 'POST',
                //             '_token' : csrf_token,
                //             'qr_code' : id,
                //         },
                //         success: function (response){
                            
                //             // BAGIAN SETTING JAM BERAPA TELATNYA
                //             // var numHour = 8;
                //             // var numMin = 40;

                //             // console.log(response.nama);
                //             // var asiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Bangkok"});
                //             // now = new Date(asiaTime);
                //             // var hour = now.getHours();
                //             // var day = now.getDay();
                //             // var minutes = now.getMinutes();
                //             // console.log(hour);
                //             // console.log(minutes);

                //             if(response.status_error){
                //                 Swal.fire({
                //                     type: 'error',
                //                     title : 'Oh, tidak!',
                //                     text : 'QR code tidak ditemukan.'
                //                 });
                            
                //             // else if(hour >= numHour && minutes >= numMin){
                //             //     Swal.fire({
                //             //         icon : 'info',
                //             //         type : 'error',
                //             //         title : 'Telat!',
                //             //         html:
                //             //                 '<b>'+ response.nama +'</b>, ' +
                //             //                 'kamu telat karena baru masuk pada jam ' + '<b>'+ response.waktu +'</b> !', 
                //             //     });
                //             } else {
                //             Swal.fire({
                //                 icon : 'success',
                //                 title : 'Sukses! ',
                //                 timer: 5000,
                //                 html:
                //                         '<b>'+ response.nama +'</b>, ' +
                //                         'berhasil login ' + ' WIB</b> !', 
                //             }).then(function(){
                //                 window.location.href = "/";});
                //             }
                //         }
                //     })
                // }
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
@endsection

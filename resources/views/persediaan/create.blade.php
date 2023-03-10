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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}
    <!-- Bootstrap -->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> --}}
    {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="assets/css/mdb.min.css" rel="stylesheet"> --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Product QR Code</h5>
            <button class="close" id="closeModal" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="row d-flex justify-content-center">
                <div id="alertText"> &nbsp </div>
              </div>
              <div class="row d-flex justify-content-center">
                <img id="qrious">
              </div>
              <div class="row d-flex justify-content-center">
                <div id="bottomText" style="margin-top: 10px; margin-bottom: 15px;"> &nbsp </div>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" id="closeModal2" type="button" data-dismiss="modal">Done</button>
          </div>
        </div>    
      </div>
    </div>
    <div class="card">
      <div class="card-header"><b>Add Component</b></div>
      
      <div class="card-body">
          
          <div class="container">
            <main>
              <div class="row g-5">
                <div class="col">

                  <form method="POST" action="{{ route('persediaan.store') }}">
                    @csrf

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="prodname" class="form-label">Components Name</label>
                        <input type="text" class="form-control" name="components_name" id="components_name">
                      </div>
                      <div class="col-md-6">
                        <label for="components_value" class="form-label">Carbon Value</label>
                          <div class="input-group">
                            <input type="number" class="form-control w-75" name="components_value" id="components_value" aria-describedby="basic-addon2" required>
                            <span class="input-group-text" id="basic-addon2">kg Co2</span>
                        </div>
                      </div> 
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="user" class="form-label">User Info</label>
                        <input type="text" class="form-control" name="user" id="user" value="{{ Auth::user()->name }}" disabled>
                      </div>
                      <div class="col-md-6">
                        <label for="company" class="form-label">Company Info</label>
                        <input type="text" class="form-control" name="company" id="company" value="{{ Auth::user()->companies->company_name }}" disabled>
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="check_company" class="form-label">Check Company</label>
                        <div class="input-group">
                          <input type="text" name="check_company" id="check_company" class="form-control" placeholder="Check Company" aria-label="Check Company" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Check</button>
                          </div>
                        </div>
                      </div> --}}
                                        
                    {{-- <div class="row mb-3">
                      
                        <div class="col-md-8">
                          <div class="input-group">
                            <span class="input-group-text w-25">First and last name</span>
                          <input type="text" aria-label="First name" class="form-control w-75 w-25">
                          <input type="text" aria-label="Last name" class="form-control w-75 w-25">
                        </div>
                        
                      </div>
                    </div> --}}
                    {{-- <p>NB: All components unit are counted to kg CO2.</p>
                    
                    <p><b>Input format: [Value of carbon] [Company ID]</b></p>
                    <p><b>Input format: [3900] [2]</b></p> --}}



                    {{-- <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="prodname" class="form-label">Name</label>
                        <div class="input-group">
                          <input type="number" class="form-control w-75" name="components_name" id="components_name" required>
                        </div>
                      </div> --}}
                      
                      {{--<div class="col-md-6">
                        <label for="prodname" class="form-label">Camshaft</label>
                        <div class="input-group">
                          <input type="number" class="form-control w-75" name="camshaft" id="camshaft" required>
                          <input type="number" class="form-control w-25" name="camshaft_from" id="camshaft_from" placeholder="CID" required>
                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="prodname" class="form-label">Cylinder head</label>
                        <div class="input-group">
                          <input type="number" class="form-control w-75" name="cylinder_head" id="cylinder_head" required>
                          <input type="number" class="form-control w-25" name="cylinder_head_from" id="cylinder_head_from" placeholder="CID" required>
                          
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      
                      <div class="col-md-6">
                        <label for="prodname" class="form-label">Valves</label>
                        <div class="input-group">
                          <input type="number" class="form-control w-75" name="valves" id="valves" required>
                          <input type="number" class="form-control w-25" name="valves_from" id="valves_from" placeholder="CID" required>
                          
                        </div>
                      </div>
                    </div> --}}

                    <div class="row mb-3">
                      <div class="col-md-6 d-flex">
                          <div class="p-2"><a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                          </div>
                          <div class="p-2"><button type="submit" id="mansub" class="btn btn-primary">
                            {{ __('Register Components') }}
                          </button></div>
                        </div>
                        
                      </div>
                    </div>
                      
                  </form> 
                </div>
              </div>
            </main>
              
          
          </div>
      
      </div>

  </div>

        
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Material Design Bootstrap-->
    {{-- <script type="text/javascript" src="/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script> --}}
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Web3.js -->
    <script src="/assets/js/web3.min.js"></script>

    <!-- QR Code Library-->
    <script src="/assets/dist/qrious.js"></script>

    <!-- QR Code Reader -->
	<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>

    <script src="/assets/js/app.js"></script>

    
  <!-- Web3 Injection -->
    <script>

        $("#closeModal").on("click", function(){
          $('#showModal').modal('hide');
        });

        $("#closeModal2").on("click", function(){
          $('#showModal').modal('hide');
        });
          // Initialize Web3
          if (typeof web3 !== 'undefined') {
            web3 = new Web3(web3.currentProvider);
            web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
          } else {
            web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
          }

          // Set the Contract
        var contract = new web3.eth.Contract(contractAbi, contractAddress);

        $('#form1').on('submit', function(event) {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            event.preventDefault(); // to prevent page reload when form is submitted
            csrf_token = $('meta[name="csrf-token"]').attr('content');
            prodname = $('#prodname').val();
            username = $('#user').val();
            onlyProdname = $('#prodname').val();
            totalCombustion = parseInt($('#cylinder').val(), 10) + parseInt($('#piston').val(), 10) + parseInt($('#crankshaft').val(), 10) + 
            parseInt($('#connecting_rod').val(), 10) + parseInt($('#join_our_newsletter').val(), 10) + parseInt($('#cylinder_head').val(), 10) + 
            parseInt($('#camshaft').val(), 10) + parseInt($('#valves').val(), 10);
            console.log(totalCombustion);
            // user_id = auth()->user()->id;
            
            prodname=prodname+"<br>Registered By: "+username;
            console.log(prodname);
            var today = new Date();
            var thisdate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

            web3.eth.getAccounts().then(async function(accounts) {
              var receipt = await contract.methods.newItem(prodname, thisdate).send({ from: accounts[0], gas: 1000000 })

              .then(receipt => {
                  var msg="<h5 style='color: #53D769'><b>Item added successfully!</b></h5><p>Product ID: "+receipt.events.Added.returnValues[0]+"</p>";
                  qr.value = receipt.events.Added.returnValues[0];
                  console.log(receipt.events.Added.returnValues[0]);
                  contract.methods.addValue(receipt.events.Added.returnValues[0], totalCombustion).send({ from: accounts[0], gas: 1000000 });
                  $.ajax({
                        type: 'POST',
                        url: "{{ route('getProdukName') }}",
                        data: {
                          '_method' : "POST",
                          '_token' : csrf_token,
                          'onlyProdname': onlyProdname,
                          'username' : username,
                          'qr_value' : qr.value,
                          // 'user_id' : user_id,
                        },
                        cache: false,

                        success: function(msg){
                            
                            console.log('Berhasil!')

                        },
                        error: function(data){
                            console.log('error:', data)
                        },
                    })
                  contract.methods.searchProduct(1).call(function(err, result) {
                    console.log(err, result)
          
                  });
                  $bottom="<p style='color: #FECB2E'> You may print the QR Code if required </p>"
                  $("#alertText").html(msg);
                  $("#qrious").show();
                  $("#bottomText").html($bottom);
                  $('#showModal').modal('show');

                  // $(".customalert").show("fast","linear");
              });
              //console.log(receipt);
            });
            $("#prodname").val('');
            
        });


        function isInputNumber(evt){
          var ch = String.fromCharCode(evt.which);
          if(!(/[0-9]/.test(ch))){
              evt.preventDefault();
          }
        }

        (function() {
            var qr = window.qr = new QRious({
                element: document.getElementById('qrious'),
                size: 200,
                value: '0'
            });

            
        })();

        function openQRCamera(node) {
        var reader = new FileReader();
        reader.onload = function() {
          node.value = "";
          qrcode.callback = function(res) {
          if(res instanceof Error) {
            alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
          } else {
            node.parentNode.previousElementSibling.value = res;
            document.getElementById('searchButton').click();
          }
          };
          qrcode.decode(reader.result);
        };
        reader.readAsDataURL(node.files[0]);
      }

      function showAlert(message){
          $("#alertText").html(message);
          $("#qrious").hide();
          $("#bottomText").hide();
          $(".customalert").show("fast","linear");
        }

      $("#aboutbtn").on("click", function(){
          showAlert("A Decentralised End to End Logistics Application that stores the whereabouts of product at every freight hub to the Blockchain. At consumer end, customers can easily scan product's QR CODE and get complete information about the provenance of that product hence empowering	consumers to only purchase authentic and quality products.");
      });

    </script>
</body>
@stop

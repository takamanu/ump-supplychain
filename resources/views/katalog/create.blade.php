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
            <button class="close" type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
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
            <button class="btn btn-secondary" type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">Done</button>
          </div>
        </div>    
      </div>
    </div>
    <div class="card">
      <div class="card-header"><b>Add Product</b></div>
      
      <div class="card-body">
          
          <div class="container">
            <main>
              <div class="row g-5">
                <div class="col">

                  <form id="form2" autocomplete="off">

                    <div class="row mb-3">
                      <div class="col-md-2">
                        <label for="prodid" class="form-label">Product ID</label>
                        <input type="text" class="form-control" name="prodid" id="prodid">
                      </div>
                      <div class="col-md-4">
                        <label for="prodlocation" class="form-label">Distance (km)</label>
                        <input type="text" class="form-control" name="prodlocation" id="prodlocation">
                    </div>
                    </div>
                    <h2 class="mb-3">Send Product (Coming soon)</h2>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="prodlocation_from" class="form-label">From</label>
                            <input type="text" class="form-control" name="prodlocation_from" id="prodlocation_from" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="prodlocation_to" class="form-label">Where to?</label>
                            <input type="text" class="form-control" name="prodlocation_to" id="prodlocation_to" disabled>
                        </div>
                    </div>


                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="user" class="form-label">User Info</label>
                        <input type="text" class="form-control" name="user" id="user" value="{{ Auth::user()->name }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="company" class="form-label">Company Info</label>
                        <input type="text" class="form-control" name="company" id="company" value="{{ Auth::user()->companies->company_name }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6 d-flex">
                          <div class="p-2"><a href="{{ url('/katalog') }}" class="btn btn-danger">Back</a>
                          </div>
                          <div class="p-2"><button type="submit" id="mansub" class="btn btn-primary">
                            {{ __('Update location') }}
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
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Material Design Bootstrap-->
{{-- <script type="text/javascript" src="/assets/js/popper.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/mdb.min.js"></script> --}}
{{-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

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
    
    <script>
    // Initialize Web3
    if (typeof web3 !== 'undefined') {
      web3 = new Web3(web3.currentProvider);
      web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
    } else {
      web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
    }

    // Set the Contract
  var contract = new web3.eth.Contract(contractAbi, contractAddress);

  // Code for detecting location
//   if (navigator.geolocation) {
//       navigator.geolocation.getCurrentPosition(showPosition);
//   }
//   function showPosition(position) {
//       var autoLocation = position.coords.latitude +", " + position.coords.longitude;
//       $("#prodlocation").val(autoLocation);
//   }

  $('#form2').on('submit', function(event) {
      event.preventDefault(); // to prevent page reload when form is submitted
      prodid = $('#prodid').val();
      prodlocation = $('#prodlocation').val();
      prodvalue = prodlocation * 0.13;
      console.log(prodid);
      console.log(prodlocation);
      console.log(prodvalue);
      const floatValue = parseInt(prodvalue, 10);
      console.log(floatValue);
      var today = new Date();
      var thisdate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var info = "<br><br><b>Date: "+thisdate+"</b><br>Distance traveled: " + prodlocation +"</b><br>Value Emission: "+prodvalue + " kg Co2";
      
      web3.eth.getAccounts().then(async function(accounts) {
        var receipt = await contract.methods.addState(prodid, info).send({ from: accounts[0], gas: 1000000 })
        .then(receipt => {
            var msg = "Distance traveled <b>" + prodlocation + " km</b>" + ", you have obtained " + prodvalue + " kg Co2!";
            $("#alertText").html(msg);
            $("#qrious").hide();
            $("#bottomText").hide();
            $('#showModal').modal('show');
            contract.methods.addValue(prodid, floatValue).send({ from: accounts[0], gas: 1000000 });
        });
      });
      $("#prodid").val('');
    });


  function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
  }


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
@stop
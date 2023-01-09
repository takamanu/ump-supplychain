{{-- @extends('layouts.main')

@section('container')
    <h2>Tambah Produk</h2>

    <div class="col-lg-12">
        <form method="post" action="/produk">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <br>
                <input type="text" class="form-control w-25 @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <br>
                <input type="number" class="form-control w-25 @error('harga') is-invalid @enderror"
                    id="harga" name="harga" required value="{{ old('harga') }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_member" class="form-label">Harga Member</label>
                <br>
                <input type="number" class="form-control w-25 @error('harga_member') is-invalid @enderror"
                    id="harga_member" name="harga_member" required value="{{ old('harga_member') }}">
                @error('harga_member')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
@endsection --}}
@extends('layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="SHORTCUT ICON" href="images/fibble.png" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="ICON" href="images/fibble.png" type="image/ico" />

    <title>Supply Chain</title>
    {{-- <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}
    <!-- Bootstrap -->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> --}}
    {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="assets/css/mdb.min.css" rel="stylesheet"> --}}

    <link href="/assets/css/style.css" rel="stylesheet">

  </head>

  <body class="violetgradient">

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

    </center>

    <div class="bgrolesadd">
      <center>
        <div class="mycardstyle">
            <div class="greyarea">
                <h5> Please fill company details  </h5>
                <form id="form1" autocomplete="off">
                    <div class="formitem">
                        <label type="text" class="formlabel"> Company Name </label>
                        <input type="text" class="forminput" id="prodname" required>
                        <input type="hidden" class="forminput" id="user" value="{{ Auth::user()->name }}" required>
                    </div>
                    <button class="formbtn" id="mansub" type="submit">Register Company</button>
                </form>
            </div>
        </div>


      </center>
    <div class='box'>
      <div class='wave -one'></div>
      <div class='wave -two'></div>
      <div class='wave -three'></div>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Material Design Bootstrap-->
    <script type="text/javascript" src="/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>

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



    $("#manufacturer").on("click", function(){
        $("#districard").hide("fast","linear");
        $("#manufacturercard").show("fast","linear");
    });

    $("#distributor").on("click", function(){
        $("#manufacturercard").hide("fast","linear");
        $("#districard").show("fast","linear");
    });

    $("#closebutton").on("click", function(){
        $(".customalert").hide("fast","linear");
    });


    $('#form1').on('submit', function(event) {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        event.preventDefault(); // to prevent page reload when form is submitted
        csrf_token = $('meta[name="csrf-token"]').attr('content');
        prodname = $('#prodname').val();
        username = $('#user').val();
        onlyProdname = $('#prodname').val();
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

    $('#form2').on('submit', function(event) {
        event.preventDefault(); // to prevent page reload when form is submitted
        prodid = $('#prodid').val();
        prodlocation = $('#prodlocation').val();
        console.log(prodid);
        console.log(prodlocation);
        var today = new Date();
        var thisdate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var info = "<br><br><b>Date: "+thisdate+"</b><br>Location: "+prodlocation;
        web3.eth.getAccounts().then(async function(accounts) {
          var receipt = await contract.methods.addState(prodid, info).send({ from: accounts[0], gas: 1000000 })
          .then(receipt => {
              var msg="Item has been updated ";
              $("#alertText").html(msg);
              $("#qrious").hide();
              $("#bottomText").hide();
              $(".customalert").show("fast","linear");
          });
        });
        $("#prodid").val('');
        $("#prodlocation").val('');
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
</html>
@endsection

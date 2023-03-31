@extends('layouts.main')

@section('container')
<body class="bg-gradient-primary">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBQobWPf8WyglvONc2lYAzIwUNqQsVPnYk" type="text/javascript"></script>
    <script src="map.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
      a:hover{
      cursor: pointer;
      text-decoration: unset;
      }

      .heading_anchor{
         background: #8142b1 !important; 
         color: #fff !important;
      }

      .define_height{
          height: 450px;
      }
   </style>
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
                  <div class='container-fluid'>
                     <div class='container-fluid'>
                        <div class='row'>
                           <div class='col-md-4'>
                              <p>Enter your origin point and your destination where you want to go.</p>
                              <div class='well define_height'>
                                 <form id="distance_form">
                                    <div class="form-group">
                                       <label>Enter Origin</label>
                                       <input class="form-control" id="from_places" placeholder="Enter Origin"/>
                                       <input id="origin" name="origin" required="" type="hidden"/>
                                       <br>
                                       <a class="btn-sm btn-primary" onclick="getCurrentPosition()"><i class="fa fa-map" aria-hidden="true"></i> Set Current Location</a>
                                    </div>
                                    <div class="form-group">
                                       <label>Enter Destination</label>
                                       <input class="form-control" id="to_places" placeholder="Enter Destination"/>
                                       <input id="destination" name="destination" required="" type="hidden"/>
                                    </div>
                                    <div class="form-group">
                                       <label>Travel Mode</label>
                                       <select class="form-control" id="travel_mode" name="travel_mode">
                                          <option value="Click ok to continue">Click ok to continue</option>
                                       </select>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Find" style="background: #8142b1; width: 100%; border: 0px;" />
                                 </form>
                                 <div class="row" style="padding-top: 20px;">
                                    <div class="container">
                                       <p id="in_mile"></p>
                                       <p id="in_kilo"></p>
                                       <p id="duration_text"></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class='col-md-8'>
                              <noscript>
                                 <div class='alert alert-info'>
                                    <h4>Your JavaScript is disabled</h4>
                                    <p>Please enable JavaScript to view the map.</p>
                                 </div>
                              </noscript>
                              <div id="map" style="height: 500px; width: 100%" ></div>
                           </div>
                        </div>
                     </div>
                  
                  <br><br>

                  <form id="form2" autocomplete="off">

                    <div class="row mb-3">
                      <div class="col-md-2">
                        <label for="prodid" class="form-label">Product ID</label>
                        <input type="text" class="form-control" name="prodid" id="prodid">
                      </div>
                      <div class="col-md-4">
                        <label for="prodlocation" class="form-label">Distance (km)</label>
                        <input type="text" class="form-control" name="prodlocation" id="prodlocation" disabled>
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
                          <div class="p-2"><a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
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
      $(function () {
        var origin, destination, map;

        // add input listeners
        google.maps.event.addDomListener(window, 'load', function (listener) {
            setDestination();
            initMap();
        });

        // init or load map
        function initMap() {

            var myLatLng = {
                lat: 20.5937,
                lng: 78.9629
            };
            map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: myLatLng,});
        }

        function setDestination() {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });


        }

        function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: travel_mode,
                avoidTolls: true
            }, function (response, status) {
                if (status === 'OK') {
                    directionsDisplay.setMap(map);
                    directionsDisplay.setDirections(response);
                } else {
                    directionsDisplay.setMap(null);
                    directionsDisplay.setDirections(null);
                    alert('Could not display directions due to: ' + status);
                }
            });
        }

        // calculate distance , after finish send result to callback function
        function calculateDistance(travel_mode, origin, destination) {

            var DistanceMatrixService = new google.maps.DistanceMatrixService();
            DistanceMatrixService.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode[travel_mode],
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, save_results);
        }

        // save distance results
        function save_results(response, status) {

            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    var distance_in_kilo = distance.value / 1000; // the kilo meter
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    appendResults(distance_in_kilo, distance_in_mile, duration_text);
                    sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
                }
            }
        }

        // append html results
        function appendResults(distance_in_kilo, distance_in_mile, duration_text) {
            $("#result").removeClass("hide");
            $('#in_mile').html(" Distance in Mile: <span class='badge badge-pill badge-secondary'>" + distance_in_mile.toFixed(2) + "</span>");
            $('#in_kilo').html("Distance in KM: <span class='badge badge-pill badge-secondary'>" + distance_in_kilo.toFixed(2) + "</span>");
            $('#duration_text').html("Duration: <span class='badge badge-pill badge-success'>" + duration_text + "</span>");
            distanceFix = parseInt((distance_in_kilo.toFixed(2)), 10)
            $('#prodlocation').val(distanceFix);
        }

        // send ajax request to save results in the database
        

        // on submit  display route ,append results and send calculateDistance to ajax request
        $('#distance_form').submit(function (e) {
            e.preventDefault();
            var origin = $('#origin').val();
            var destination = $('#destination').val();
            var travel_mode = $('#travel_mode').val();
            var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
            var directionsService = new google.maps.DirectionsService();
           displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
            calculateDistance(travel_mode, origin, destination);
        });

    });

    // get current Position
    function getCurrentPosition() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setCurrentPosition);
        } else {
            alert("Geolocation is not supported by this browser.")
        }
    }

    // get formatted address based on current position and set it to input
    function setCurrentPosition(pos) {
        var geocoder = new google.maps.Geocoder();
        var latlng = {lat: parseFloat(pos.coords.latitude), lng: parseFloat(pos.coords.longitude)};
        geocoder.geocode({ 'location' :latlng  }, function (responses) {
            console.log(responses);
            if (responses && responses.length > 0) {
                $("#origin").val(responses[1].formatted_address);
                $("#from_places").val(responses[1].formatted_address);
                //    console.log(responses[1].formatted_address);
            } else {
                alert("Cannot determine address at this location.")
            }
        });
    }
    </script>
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
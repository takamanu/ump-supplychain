@extends('layouts/main')

@section('container')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
        <h6>Welcome, {{ $user->name }}</h6>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Your carbon value total </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="hasilTotal">
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total trees you must've plant</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="pohonTotal">
                                                                    
                                                            </div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Carbon Level
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="carbonLevel">
                                                                                    
                                                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        {{-- --}}

    <!-- Content Row -->
    {{-- <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- Color System -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-light text-black shadow">
                        <div class="card-body">
                            Light
                            <div class="text-black-50 small">#f8f9fc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-dark text-white shadow">
                        <div class="card-body">
                            Dark
                            <div class="text-white-50 small">#5a5c69</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                            href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div> --}}

    {{-- Script Chart --}}
    {{-- <script>
        var ctx = document.getElementById('penjualanChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($dataPenjualan->labels) !!},
                datasets: [
                    {
                        label: 'Data Penjualan Bulanan',
                        backgorundColor: {!! json_encode($dataPenjualan->colors) !!},
                        data: {!! json_encode($dataPenjualan->dataset) !!},
                    },
                ]
            }
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if(value % 1 === 0) {return value;}}
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: '#122C4B',
                    fontFamily: 'Montserrat',
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
        )
    </script> --}}

    {{-- Script Chart --}}
    <script src="/assets/js/web3.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>

    <!-- QR Code Library-->

    <!-- QR Code Reader -->
	<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var id = {!! json_encode($masuk->toArray()) !!};
        var tambahCarbon = 0;
        var valuePohon = 0;

        $(document).ready(function(){
            console.log(id);

            web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));

            // Set the Contract
            var contract = new web3.eth.Contract(contractAbi, contractAddress); // to prevent page reload when form is submitted
            // greeting = $('input').val();
            //$("#database").text(greeting);

            Promise.all(id.map((id) => {
                return contract.methods.getTotalValue(id).call();
            })).then((results) => {
                console.log(results);
                tambahCarbon = results.reduce((acc, cur) => acc + Number(cur), 0);
                valuePohon = tambahCarbon * 0.3;
                $("#hasilTotal").append(tambahCarbon + " kg Co2");
                $("#pohonTotal").append(valuePohon + " trees");
                tambahCarbon = 20000;
                if (tambahCarbon > 30000) {
                    $("#carbonLevel").append("<span style='color:red'><b>DANGEROUS</b>");

                } else {
                    $("#carbonLevel").append("<span style='color:green'><b>SAFE</b>");
                }
                
            });
        });
        //     then(() => {
        //             return contract.methods.getTotalValue(id).call(function(err, result) {
        //                 console.log(err, result);
        //                 let treePlant = 0.0;
        //                 treePlant = result * 0.3;
        //                 parseInt(treePlant, 10);
        //                 valuePohon += treePlant;
        //             })
        //         })
        //     })

        // });

        console.log('<b>Your total carbon footprint is: <span style="color:blue">'+ tambahCarbon +' kg Co2</span></b>');
        console.log('<b>Your must plant <span style="color:blue">'+ valuePohon +' trees.</span></b>');

    </script>
@endsection



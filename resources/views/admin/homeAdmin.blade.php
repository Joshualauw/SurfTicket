<?php
$pro = \App\Models\Provinsi::all();
$jan = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 1 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($jan == null) {
    $jan = 0;
}
$feb = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 2 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($feb == null) {
    $feb = 0;
}
$mar = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 3 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($mar == null) {
    $mar = 0;
}
$apr = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 4 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($apr == null) {
    $apr = 0;
}
$mei = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 5 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($mei == null) {
    $mei = 0;
}
$jun = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 6 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($jun == null) {
    $jun = 0;
}
$jul = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 7 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($jul == null) {
    $jul = 0;
}
$ags = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 8 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($ags == null) {
    $ags = 0;
}
$sep = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 9 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($sep == null) {
    $sep = 0;
}
$okt = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 10 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($okt == null) {
    $okt = 0;
}
$nov = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 11 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($nov == null) {
    $nov = 0;
}
$des = \App\Models\HTransaksi::join("transaksis","transaksis.transaksi_id","=","h_transaksis.id")
                ->whereRaw("MONTH(h_transaksis.tanggal_acc) = 12 AND YEAR(h_transaksis.tanggal_acc) = ". \Carbon\Carbon::now()->year)
                ->select(DB::raw("sum(transaksis.jumlah) as jumlah"))
                ->first()->jumlah;
if($des == null) {
    $des = 0;
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <link href="css/style.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

</head>

<body>




    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        @include('./admin/must')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total User</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">
                                        <?= \App\Models\User::count() ?>
                                    </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Ticket</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span
                                        class="counter text-purple"><?= \App\Models\Ticket::count() ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Transaksi</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span
                                        class="counter text-info"><?= \App\Models\HTransaksi::count() ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Grafik Penjualan Ticket <?= \Carbon\Carbon::now()->year ?></h3>
                            <canvas id="chart_pj">

                            </canvas>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Top 5 penjualan ticket</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <select class="form-control shadow-none row border-top js-example-basic-single" id="sel_pro">
                                        @foreach ($pro as $item)
                                            <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive" id="isi">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function initChart() {
            var ambil = [];
            var tgl = [];

            ambil.push(<?=$jan?>);
            tgl.push("Januari");

            ambil.push(<?=$feb?>);
            tgl.push("Febuari");

            ambil.push(<?=$mar?>);
            tgl.push("Maret");

            ambil.push(<?=$apr?>);
            tgl.push("April");

            ambil.push(<?=$mei?>);
            tgl.push("Mei");

            ambil.push(<?=$jun?>);
            tgl.push("Juni");

            ambil.push(<?=$jul?>);
            tgl.push("Juli");

            ambil.push(<?=$ags?>);
            tgl.push("Agustus");

            ambil.push(<?=$sep?>);
            tgl.push("September");

            ambil.push(<?=$okt?>);
            tgl.push("Oktober");

            ambil.push(<?=$nov?>);
            tgl.push("November");

            ambil.push(<?=$des?>);
            tgl.push("Desember");



            var datax = {
                labels: tgl,
                datasets: [{
                    label: "Penjualan Ticket",
                    data: ambil,
                }]
            };

            var ctxOption = {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        boxWidth: 80,
                        fontColor: 'black'
                    }
                }
            };

            var ctx = document.getElementById('chart_pj');
            var line_ctx = new Chart(ctx, {
                type: 'line',
                data: datax,
                options: ctxOption
            });
        };

        function loadData(){
            var key = $("#sel_pro").val();
            $.ajax({
                method: "GET",
                url: "{{ url('/dataTop') }}",
                data: {
                    key: key
                },
                success: function(res) {
                    $("#isi").html('');
                    console.log(res);
                    $("#isi").append(res);
                }
            });
        }

        $(document).ready(function() {
            initChart();
            loadData();
            $("#sel_pro").change(function() {
                loadData();
            });
        });
    </script>

</body>

</html>

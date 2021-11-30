<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Master Transaksi</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <link href="css/style.min.css" rel="stylesheet">

</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        @include('./admin/must')

        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Transaksi</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Transaksi</h3>

                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Tanggal Beli</th>
                                            <th class="border-top-0">Nama Ticket</th>
                                            <th class="border-top-0">Pembeli</th>
                                            <th class="border-top-0">Jumlah</th>
                                            <th class="border-top-0">Total Harga</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01/12/2021</td>
                                            <td>Ticket Bali Zoo</td>
                                            <td>John Doe</td>
                                            <td>2</td>
                                            <td>Rp. 300.000</td>
                                            <td style="color:orange">Menunggu</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-success mx-2 d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white"
                                                >Terima</button>
                                                <button class="btn btn-danger mx-2 d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white"
                                                >Tolak</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

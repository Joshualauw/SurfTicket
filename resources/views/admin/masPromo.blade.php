<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Master Promo</title>
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
                        <h4 class="page-title">Table Promo</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                            </ol>
                            <a href="/addAdmin"
                                class="btn btn-primary d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                Tambahkan Promo Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Table Promo</h3>
                            <div class="form-group pull-right">
                                <input type="text" class="search form-control" placeholder="Cari Promo">
                            </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Kode Promo</th>
                                            <th class="border-top-0">Nama Promo</th>
                                            <th class="border-top-0">Nama Ticket</th>
                                            <th class="border-top-0">Diskon</th>
                                            <th class="border-top-0">Harga</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>SURFTICKETMANTAP</td>
                                            <td>Diskon Launching</td>
                                            <td>Jogja Bay</td>
                                            <td>25%</td>
                                            <td>
                                                <span class="text-muted text-decoration-line-through">Rp. 150.000</span>
                                                Rp. 112.500
                                            </td>
                                            <td style="color:lime">
                                                Aktif
                                            </td>
                                            <td>
                                                <button class="btn btn-warning d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white"
                                                >Ubah status</button>
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

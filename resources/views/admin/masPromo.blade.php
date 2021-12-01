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

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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
                            <button data-toggle="modal" data-target="#exampleModalCenter"
                                class="btn btn-primary d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                Tambahkan Promo Baru
                            </button>
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
                                            <th class="border-top-0">Diskon</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>SURFTICKETMANTAP</td>
                                            <td>Diskon Launching</td>
                                            <td>25%</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-warning mx-2 d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white"
                                                >Edit</button>

                                                <button class="btn btn-danger mx-2 d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white"
                                                >Delete</button>
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


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-outline-dark d-flex align-items-center justify-content-center"
                        data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body p-4 py-5 p-md-5">
                    <h3 class="text-center mb-3">Tambahkan Promo Baru </h3>
                    <form action="/cek_changePromo" method="post" enctype="multipart/form-data" class="signup-form">
                        @csrf
                        <div class="form-group mb-2">
                            <label>Kode Promo</label>
                            <input type="text" class="form-control" name="kd_txt" placeholder="kode promo">
                        </div>
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nm_txt" placeholder="nama promo">
                        </div>
                        <div class="form-group mb-2">
                            <label>Deskripsi</label>
                            <textarea name="ds_txt" class="form-control" placeholder="deskripsi" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label>Presentase Diskon</label>
                            <input type="number" min="0" name="dk_txt" class="form-control"
                                placeholder="diskon">
                        </div>
                        <div class="form-group mb-2">
                            <label>Banner Promo</label>
                            <input type="file" name="gb_txt" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">add promo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

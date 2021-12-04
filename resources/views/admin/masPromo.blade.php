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
                            <button data-toggle="modal" data-target="#exampleModalCenter" id="btn_add_new"
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
                                <input type="text" id="cari_dt" class="search form-control"
                                    placeholder="Cari berdasarkan kode Promo">
                            </div>
                            <div class="table-responsive" id="isi">

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
                    <h3 class="text-center mb-3" id="judul_modal">Tambahkan Promo Baru </h3>
                    <form action="/cek_changePromo" method="post" enctype="multipart/form-data" class="signup-form">
                        @csrf
                        <div class="form-group mb-2">
                            <label>Kode Promo</label>
                            <input type="text" id="kd_txt" class="form-control" name="kd_txt"
                                placeholder="kode promo">
                        </div>
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="text" id="nm_txt" class="form-control" name="nm_txt"
                                placeholder="nama promo">
                        </div>
                        <div class="form-group mb-2">
                            <label>Deskripsi</label>
                            <textarea name="ds_txt" id="ds_txt" class="form-control" placeholder="deskripsi"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label>Presentase Diskon</label>
                            <input type="number" min="0" id="dk_txt" name="dk_txt" class="form-control"
                                placeholder="diskon">
                        </div>
                        <div class="form-group mb-2" id="banner_promo">
                            <label>Banner Promo</label>
                            <input type="file" name="gb_txt" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" name="btn_chg"
                                class="form-control btn btn-primary rounded submit px-3" value="add"
                                id="btn_sub_Promo">add promo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            alert('validation error');
        </script>
    @endif


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function loadData() {
            var key = $("#cari_dt").val();
            $.ajax({
                method: "GET",
                url: "{{ url('/dataPromo') }}",
                data: {
                    key: key
                },
                success: function(res) {
                    $("#isi").html('');
                    $("#isi").append(res);
                }
            });
        }

        $(document).ready(function() {
            loadData();
            $("#cari_dt").keyup(function() {
                loadData();
            });

            $("#isi").on('click', '.tombol_edit', function() {
                var vl = $(this).val();
                console.log(vl);

                $.ajax({
                    method: "GET",
                    url: "{{ url('/cariPromo') }}",
                    data: {
                        id_promo: vl
                    },
                    success: function(res) {
                        $("#kd_txt").val(res["kode"]);
                        $("#kd_txt").prop("disabled", true);
                        $("#nm_txt").val(res["nama"]);
                        $("#ds_txt").val(res["deskripsi"]);
                        $("#dk_txt").val(res["diskon"]);
                    }
                });

                $("#banner_promo").hide();
                $("#judul_modal").html("Edit Promo");
                $("#btn_sub_Promo").html("Edit");
                $("#btn_sub_Promo").val(vl);
            });

            $("#btn_add_new").click(function() {
                $("#banner_promo").show();
                $("#judul_modal").html("Tambahkan Promo baru");
                $("#btn_sub_Promo").html("Add Promo");
                $("#btn_sub_Promo").val('add');

                $("#kd_txt").prop("disabled", false);
                $("#kd_txt").val("");
                $("#nm_txt").val("");
                $("#ds_txt").val("");
                $("#dk_txt").val("");
            });


            $("#isi").on('click', '.tombol_delete', function() {
                var vl = $(this).val();
                console.log(vl);

                if (confirm('konfirmasi delete promo')) {
                    $.ajax({
                        method: "GET",
                        url: "{{ url('/delPromo') }}",
                        data: {
                            id_promo: vl
                        },
                        success: function(res) {
                            loadData();
                        }
                    });
                }
            });
        });
    </script>
</body>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Master User</title>
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
                        <h4 class="page-title">Table User</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                            </ol>
                            <button data-toggle="modal" data-target="#exampleModalCenter"
                                class="btn btn-primary d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                Tambahkan Admin Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Table User</h3>
                            <div class="form-group pull-right">
                                <input type="text" class="search form-control" id="cari_dt"
                                    placeholder="Cari berdasarkan username">
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
                    <h3 class="text-center mb-3">Tambahkan Admin Baru </h3>
                    <form action="/cek_adminBaru" enctype="multipart/form-data" method="post" class="signup-form">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="nm_txt" placeholder="Nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="us_txt" placeholder="username">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="em_txt" placeholder="e-mail"
                                autocomplete="off">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="ps_txt" placeholder="Password">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="kf_txt"
                                placeholder="konfirmasi Password">
                        </div>
                        <div class="form-group mb-2">
                            <label>Foto Profile</label>
                            <input type="file" name="ft_txt" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit"
                                class="form-control btn btn-primary rounded submit px-3">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            alert('ada error');
        </script>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function loadData() {
            var key = $("#cari_dt").val();
            $.ajax({
                method: "GET",
                url: "{{ url('/dataUser') }}",
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
            $("#cari_dt").change(function() {
                loadData();
            });

            $("#isi").on('click', '.tombol_ban', function() {
                var vl = $(this).attr('value');
                $.ajax({
                    method: "GET",
                    url: "{{ url('/banUser') }}",
                    data: {
                        id_user: vl
                    },
                    success: function(res) {
                        loadData();
                        //alert('berhasil ubah status');
                    }
                });
            })
        });
    </script>

</body>

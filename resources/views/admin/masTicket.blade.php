<?php
$pro = \App\Models\Provinsi::all();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Master Ticket</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <link href="css/style.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        function loadData() {
            var srch = $('#in_cari_tik').val();
            var pro = $('#sel_pro').val();
            var kot = $('#sel_kot').val();
            console.log(srch);
            $.ajax({
                method: "GET",
                url: "{{ url('/dataTicket') }}",
                data: {
                    sch: srch,
                    pro: pro,
                    kot: kot
                },
                success: function(res) {
                    $("#isi").html('');
                    $("#isi").append(res);
                }
            });

        }

        function initKota() {
            $.ajax({
                method: "GET",
                url: "{{ url('/dataKota') }}",
                data: {
                    id_pro: 11
                },
                success: function(res) {
                    $("#sel_kot2").html('');
                    $("#sel_kot2").append(res);
                }
            });
        }


        $(document).ready(function() {
            loadData();
            initKota();
            $('.js-example-basic-single').select2();
            $('#sel_pro').change(function() {
                var val = $('#sel_pro').val();
                $.ajax({
                    method: "GET",
                    url: "{{ url('/dataKota') }}",
                    data: {
                        id_pro: val
                    },
                    success: function(res) {
                        $("#sel_kot").html('');
                        $("#sel_kot").append('<option value="no">All</option>');
                        $("#sel_kot").append(res);
                    }
                });
                $("#sel_kot").val("no");
                loadData();
            });

            $('#sel_pro2').change(function() {
                var val = $('#sel_pro2').val();
                $.ajax({
                    method: "GET",
                    url: "{{ url('/dataKota') }}",
                    data: {
                        id_pro: val
                    },
                    success: function(res) {
                        $("#sel_kot2").html('');
                        $("#sel_kot2").append(res);
                    }
                });
            });

            $('#sel_kot').change(function() {
                loadData();
            })

            $('#in_cari_tik').keyup(function() {
                loadData();
            })
        });
    </script>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        @include('./admin/must')

        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Ticket</h4>


                    </div>


                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        Provinsi
                        <select class="js-example-basic-single form-control" name="" id="sel_pro">
                            <option value="no">All</option>
                            @foreach ($pro as $item)
                                <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        Kabupaten/Kota
                        <select class="js-example-basic-single form-control" name="" id="sel_kot">
                            <option value="no">All</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">

                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">

                            </ol>
                            <button data-toggle="modal" data-target="#exampleModalCenter"
                                class="btn btn-primary d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                Tambahkan Ticket Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <section class="py-1">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
                            id="isi">
                        </div>
                    </div>
                </section>
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
                    <h3 class="text-center mb-3">Tambah Ticket Baru </h3>
                    <form action="/cek_ticketBaru" method="post" enctype="multipart/form-data" class="signup-form">
                        @csrf
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nm_txt" placeholder="Nama tempat wisata">
                        </div>
                        <div class="form-group mb-2">
                            <label>Deskripsi</label>
                            <textarea name="ds_txt" class="form-control" placeholder="deskripsi" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label>Harga</label>
                            <input type="text" name="hr_txt" class="form-control" placeholder="Harga Ticket"
                                onkeypress='validate(event)'>
                        </div>
                        <div class="form-group mb-2">
                            <label>Ticket Banner</label>
                            <input type="file" name="gb_txt" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Provinsi</label> <br>
                            <select class=" custom-select form-control selku" name="pr_txt" id="sel_pro2">
                                @foreach ($pro as $item)
                                    <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Kabupaten/kota</label> <br>
                            <select class="custom-select form-control selku" name="kt_txt" id="sel_kot2">
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>

    @if ($errors->any())
        <script>
            alert('validation error');
        </script>
    @endif
</body>

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
    <link href="{{ URL::asset('css/style.min.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>



    <script>
        function initKota() {
            $.ajax({
                method: "GET",
                url: "{{ url('/dataKota') }}",
                data: {
                    id_pro: {{ $tkt->provinsi_id }},
                    id_kot: {{ $tkt->kota_id }}
                },
                success: function(res) {
                    $("#sel_kot2").html('');
                    $("#sel_kot2").append(res);
                }
            });
        }

        function loadData() {
            $.ajax({
                method: "GET",
                data: {
                    id_tik: {{ $tkt->id }}
                },
                url: "{{ url('/dataJadwal') }}",
                success: function(res) {
                    $("#isi").html('');
                    $("#isi").append(res);
                }
            });
        }

        $(document).ready(function() {
            loadData();
            initKota();
            $('.js-example-basic-single').select2();
            $('.waktu').timepicker({
                use24hours: true,
                format: "HH:mm",
                showMeridian: false
            });

            $('.waktu').change(function() {
                console.log($(this).val());
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

            $("#isi").on('click', '.tombol_edit', function() {
                var vl = $(this).val();
                console.log(vl);

                $.ajax({
                    method: "GET",
                    url: "{{ url('/cariJadwal') }}",
                    data: {
                        id_jadwal: vl
                    },
                    success: function(res) {
                        $("#hr_txt").val(res["hari"]).change();
                        $("#mulai_txt").val(res["jam_awal"]);
                        $("#ahkir_txt").val(res["jam_akhir"]);
                        $("#kt_txt").val(res["kuota"]);
                        $("#action").val("edit");
                        $("#btn_id").val(vl);
                    }
                });
                $("#judul_modal").html("Edit Jadwal");
                $("#btn_id").html("Edit");
            });

            $("#btn_add_jwl").click(function() {
                $('#hr_txt').prop('selectedIndex', 0);
                $("#mulai_txt").val('');
                $("#ahkir_txt").val('');
                $("#kt_txt").val('');
                $("#action").val("add");
                $("#btn_id").val({{$tkt->id}});
                $("#judul_modal").html("Tambahkan Jadwal Baru");
                $("#btn_id").html("add jadwal");
            });

            $("#isi").on('click', '.tombol_delete', function() {
            var vl = $(this).val();

            if (confirm('konfirmasi delete jadwal')) {
                $.ajax({
                    method: "GET",
                    url: "{{ url('/delJadwal') }}",
                    data: {
                        id_jadwal: vl
                    },
                    success: function(res) {
                        loadData();
                    }
                });
            }
        });
        })
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
                        <h4 class="page-title">Detail Ticket</h4>
                    </div>
                </div>
            </div>


            <div class="container-fluid" id="conta" value="{{ $tkt->id }}">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ URL::asset($tkt->img_dir) }}" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder"><?= $tkt->nama ?></h5>
                                        <?= 'Rp ' . number_format($tkt->harga, 0, ',', '.') ?><br>
                                        Total Kuota :
                                        <?= \App\Models\Jadwal::where('ticket_id', '=', $tkt->id)->sum('kuota') ?>
                                        <br>
                                        <?php
                                        $avg = \App\Models\Review::where('ticket_id', '=', $tkt->id)->avg('rating');
                                        if ($avg == '') {
                                            echo 'belum ada ulasan';
                                            $avg = 0;
                                        } else {
                                            for ($i = 0; $i < 5; $i++) {
                                                if ($i < $avg) {
                                                    echo "<i class='fas fa-star text-warning'></i>";
                                                } else {
                                                    echo "<i class='fas fa-star text-secondary'></i>";
                                                }
                                            }
                                            echo '<br>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="/cek_updateTicket" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama Tempat Wisata</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="<?= $tkt->nama ?>"
                                                class="form-control p-0 border-0" name="nama_txt">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Deskripsi</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea name="des_txt" rows="3" class="form-control p-0 border-0"><?= $tkt->deskripsi ?>
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Provinsi</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select class=" custom-select form-control js-example-basic-single"
                                                name="pr_txt" id="sel_pro2">
                                                @foreach ($pro as $item)
                                                    <?php
                                                if($item->id == $tkt->provinsi_id){
                                                    ?>
                                                    <option selected value="<?= $item->id ?>"><?= $item->nama ?>
                                                    </option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                                                    <?php
                                                }
                                                ?>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Kabupaten/Kota</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select class=" custom-select form-control js-example-basic-single"
                                                name="kt_txt" id="sel_kot2">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Harga</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" value="{{ $tkt->harga }}"
                                                class="form-control p-0 border-0" name="hr_txt">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button name="btn_id" value="{{ $tkt->id }}" type="submit"
                                                class="btn btn-success">Update Ticket</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


                <!--SECTION 2 -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Jadwal Ticket</h3>


                            <button data-toggle="modal" data-target="#exampleModalCenter" id="btn_add_jwl"
                                class="btn btn-primary d-none d-md-block pull-right  hidden-xs hidden-sm waves-effect waves-light text-white">
                                Tambahkan Jadwal Baru
                            </button>

                            <div class="table-responsive" id="isi">

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!--POPUP-->


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
                    <h3 class="text-center mb-3" id="judul_modal">Tambahkan Jadwal Baru </h3>
                    <form action="/cek_changeJadwal" method="post" class="signup-form">
                        @csrf
                        <div class="form-group mb-2">
                            <label>Hari</label>
                            <select class="form-control" name="hr_txt" id="hr_txt">
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                                <option value="minggu">Minggu</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Jam Mulai</label>
                            <input type="time" name="mulai_txt" class="form-control waktu" id="mulai_txt">
                        </div>
                        <div class="form-group mb-2">
                            <label>Jam Berahkir</label>
                            <input type="time" name="ahkir_txt" class="form-control waktu" id="ahkir_txt">
                        </div>
                        <div class="form-group mb-2">
                            <label>Kuota</label>
                            <input type="number" min="0" name="kt_txt" class="form-control" placeholder="kuota"
                                id="kt_txt">
                        </div>
                        <input type="hidden" name="action" value="add" id="action">
                        <div class="form-group mb-2">
                            <button type="submit" name="btn_id" value="{{ $tkt->id }}" id="btn_id"
                                class="form-control btn btn-primary rounded submit px-3">add jadwal</button>
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
</body>

</html>

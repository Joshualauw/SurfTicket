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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
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
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                            <div class="col mb-5">
                                <div class="card h-100">
                                    <img class="card-img-top"
                                        src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Jogja_Bay_Logo.png"
                                        alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">Ticket Bali Zoo</h5>
                                            <!-- Product price-->
                                            Rp. 125.000 <br>
                                            Kuota : 32/50
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="/detailTicket/TK001">View
                                                Detail</a>
                                            <a class="btn btn-outline-danger mt-auto"
                                                href="/deleteTicket/TK001">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col mb-5">
                                <div class="card h-100">

                                    <img class="card-img-top"
                                        src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Jogja_Bay_Logo.png"
                                        alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">Jogja Bay</h5>
                                            Rp. 150.000
                                            <br>
                                            Kuota : 30/150
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="/detailTicket/TK002">View
                                                Detail</a>
                                            <a class="btn btn-outline-danger mt-auto"
                                                href="/deleteTicket/TK002">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                            <label>Kuota</label>
                            <input type="number" min="0" name="ku_txt" class="form-control"
                                placeholder="Kuota Ticket">
                        </div>
                        <div class="form-group mb-2">
                            <label>Tempat</label> <br>
                            <select class="custom-select form-control" name="tp_txt">
                                <optgroup label="Bali">
                                    <option value="vp1+vk1">Ginayar</option>
                                    <option value="vp1+vk2">Denpasar</option>
                                    <option value="vp1+vk3">Gilimanuk</option>
                                </optgroup>

                                <optgroup label="Jawa Timur">
                                  <option value="vp2+vk1">Surabaya</option>
                                  <option value="vp2+vk2">Malang</option>
                                  <option value="vp2+vk3">Blitar</option>
                                </optgroup>
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
</body>

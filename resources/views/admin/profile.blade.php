<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Profile Admin</title>
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
                        <h4 class="page-title">Profile</h4>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a><img src="{{Auth::user()->img_dir}}" class="thumb-lg img-circle"
                                                alt="img"></a>
                                        <h4 class="text-white mt-2">{{Auth::user()->nama}}</h4>
                                        <h5 class="text-white mt-2">{{Auth::user()->email}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="/cek_profileAdmin" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{Auth::user()->nama}}" class="form-control p-0 border-0"
                                                name="nama_txt">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{Auth::user()->username}}" class="form-control p-0 border-0"
                                                name="user_txt">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" value="{{Auth::user()->email}}"
                                                class="form-control p-0 border-0" name="email_txt" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">No telp</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{Auth::user()->no_telp}}" class="form-control p-0 border-0"
                                                onkeypress="return cekKeyPress(event)" name="tlp_txt">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Alamat</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{Auth::user()->alamat}}" class="form-control p-0 border-0"
                                                name="alt_txt">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Tanggal Lahir</label>

                                        <div class="col-sm-12 border-bottom">
                                            <input type="date" name="tgl_txt" value="{{Auth::user()->tgl_lahir}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                           <button type="submit" name="btn_id" class="btn btn-success" value="{{Auth::user()->id}}">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        function cekKeyPress(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if ((ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
</body>

</html>

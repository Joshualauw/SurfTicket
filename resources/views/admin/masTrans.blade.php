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

    <script src="js/jquery.min.js"></script>

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

                            <div class="table-responsive" id="isi">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function loadData() {
            $.ajax({
                method: "GET",
                url: "{{ url('/dataTrans') }}",
                success: function(res) {
                    $("#isi").html('');
                    $("#isi").append(res);
                }
            });
        }

        $(document).ready(function() {
            loadData();

            $("#isi").on('click', '.btn_tolak', function() {
                var vl = $(this).val();

                if (confirm('konfirmasi tolak transaksi')) {
                    $.ajax({
                        method: "GET",
                        url: "{{ url('/tolTrans') }}",
                        data: {
                            id_trans: vl
                        },
                        success: function(res) {
                            loadData();
                        }
                    });
                }
            });


            $("#isi").on('click', '.btn_terima', function() {
                var vl = $(this).val();

                if (confirm('konfirmasi terima transaksi')) {
                    $.ajax({
                        method: "GET",
                        url: "{{ url('/terTrans') }}",
                        data: {
                            id_trans: vl
                        },
                        success: function(res) {
                            console.log(res);
                            loadData();
                        }
                    });
                }
            });
        })


    </script>
</body>

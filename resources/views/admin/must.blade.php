<header class="topbar" data-navbarbg="skin5" style="background-color: #059669;">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <h1 style="color: ivory; padding-left: 1%">Surf<span style="color:#6ee7b7">Ticket</span></h1>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5"
            style="background-color: #059669;">

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">

                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class=" in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Cari Ticket" class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li>
                    <a class="profile-pic" href="/profileAdmin">
                        <img src="{{Auth::user()->img_dir}}" alt="user-img" width="36"
                            class="img-circle"><span class="text-white font-medium">{{Auth::user()->username}}</span></a>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin" aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/profileAdmin"
                        aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/masterUser"
                        aria-expanded="false">
                        <i class="far fa-address-book" aria-hidden="true"></i>
                        <span class="hide-menu">Master User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/masterTicket"
                        aria-expanded="false">
                        <i class="fas fa-ticket-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Master Ticket</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/masterPromo"
                        aria-expanded="false">
                        <i class="fas fa-percent" aria-hidden="true"></i>
                        <span class="hide-menu">Master Promo</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/masterTransaksi"
                        aria-expanded="false">
                        <i class="fas fa-exchange-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Transaksi Ticket</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Report</span>
                    </a>
                </li>
                <li class="text-center p-20 upgrade-btn">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn d-grid btn-danger text-white">Logout</button>
                    </form>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

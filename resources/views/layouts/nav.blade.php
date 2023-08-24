<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark"
         style="background: var(--bs-purple);">
        <div class="container-fluid d-flex flex-column p-0">
            <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark"
                 style="background: var(--bs-purple);">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#">
                        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-mail-bulk"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>Othma Maile</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar-1">
                        <li class="nav-item"><a class="nav-link active" href="/"><i
                                    class="fas fa-tachometer-alt"></i><span>&nbsp;Dashboard</span></a></li>
                        <hr class="sidebar-divider">
                        <div class="sidebar-heading">
                            <p class="mb-0">emails</p>
                        </div>
                        <li class="nav-item">
                            <div><a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapse-1" href="#collapse-1" role="button"><i
                                        class="fas fa-cog"></i>&nbsp;<span>Emails</span></a>
                                <div class="collapse" id="collapse-1">
                                    <div class="bg-white border rounded py-2 collapse-inner">
                                        <h6 class="collapse-header">Emails</h6>
                                        <a class="collapse-item" href="/emails">Emails</a>
                                        <a class="collapse-item" href="/filter">List Filter</a>
                                        <a class="collapse-item" href="/export_email">Export Emails</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div><a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapse-2" href="#collapse-2" role="button"><i
                                        class="fas fa-wrench"></i>&nbsp;<span>Domains</span></a>
                                <div class="collapse" id="collapse-2">
                                    <div class="bg-white border rounded py-2 collapse-inner">
                                        <h6 class="collapse-header">CUSTOM domains:</h6><a class="collapse-item"
                                                                                           href="/domains">Domains</a><a
                                            class="collapse-item" href="/domain_add">Add Domains</a>
                                        <a class="collapse-item" href="/invalid_domains">Invalid Domains</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr class="sidebar-divider">
                        <div class="sidebar-heading">
                            <p class="mb-0">Subscrebtion</p>
                        </div>
                        <li class="nav-item">
                            <div><a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="collapse-3" href="#collapse-3" role="button"><i
                                        class="fas fa-folder"></i>&nbsp;<span>Subscrebtion</span></a>
                                <div class="collapse" id="collapse-3">
                                    <div class="bg-white border rounded py-2 collapse-inner">
                                        <h6 class="collapse-header">Functions</h6><a class="collapse-item"
                                                                                     href="login.html">Messages</a><a
                                            class="collapse-item" href="login.html">Add Messages</a><a
                                            class="collapse-item" href="register.html">Uubscriber</a><a
                                            class="collapse-item" href="404.html">Messaging</a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapsePages" class="collapse" aria-labelledby="headingTwo"
                                 aria-controls="collapsePages" data-bs-parent="#accordionSidebar">
                                <div class="bg-white border rounded py-2 collapse-inner">
                                    <h6 class="collapse-header">LOGIN SCREENS:</h6><a class="collapse-item" href="#">Login</a><a
                                        class="collapse-item" href="#">Register</a><a class="collapse-item" href="#">Forgot
                                        Password</a>
                                    <h6 class="collapse-header">OTHER PAGES:</h6><a class="collapse-item" href="#">404
                                        Page</a><a class="collapse-item" href="#">Blank Page</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/profile"><i class="fas fa-user"></i><span>Profile</span></a>
                        </li>
                    </ul>
                    <div class="text-center d-none d-md-inline">
                        <button class="btn rounded-circle border-0" id="sidebarToggle-1" type="button"></button>
                    </div>
                </div>
            </nav>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                <div class="container-fluid">
                    <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i
                            class="fas fa-bars"></i></button>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                                                            aria-expanded="false"
                                                                            data-bs-toggle="dropdown" href="#"><i
                                    class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small"
                                                                    type="text" placeholder="Search for ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary py-0" type="button"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                                       aria-expanded="false" data-bs-toggle="dropdown"
                                                                       href="#"><span
                                        class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span><img
                                        class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                        class="dropdown-item" href="#"><i
                                            class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a
                                        class="dropdown-item" href="#"><i
                                            class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity
                                        log</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')

        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Othma Mailer 2023</span></div>
            </div>
        </footer>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Apps</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.svg')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('/assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('/assets/images/coffee_logo.jpg')}}" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item" id="dashboard">
                            <a href="index.html" class='sidebar-link' id="a-dashboard">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @if (Auth::user()->type == 'admin')
                        <li class="sidebar-item" id="users">
                            <a href="/user" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-item" id="suppliers">
                            <a href="{{route('supplier.index')}}" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Suppliers</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>

                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="">Change Password</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span>Logout</span></a>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                @yield('content')
                @include('sweetalert::alert')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>Copyright © Team IT</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('/assets/js/main.js')}}"></script>

    <script src="{{asset('/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{ asset('/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    @yield('addon-script')
</body>

</html>
<script>
    $(document).ready(function() {
        var url = window.location.href.split("/");
        console.log(url[3]);
        switch (url[3]) {
            case 'dashboard':
                $("#dashboard").addClass('active');
                break;
            case 'user':
                $("#users").addClass('active');
                break;
            case 'supplier':
                $("#suppliers").addClass('active');
                break;
            default:
                break;
        }
    });
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate(true) !!}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    @yield('head')
</head>
<body class="hold-transition sidebar-mini bg-dark">
<div class="wrapper" id="app">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-dark border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" method="POST" action="{{ url('search') }}">
            @csrf
            <div class="input-group">
                <input class="form-control form-control-navbar" style="border-radius: 15px;" type="search" name="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search text-white"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{ asset('img/logo.png')}}" alt="Filma24" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Filma24</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="{{ route('movies.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th green"></i>
                            <p class="teal">
                                <strong class="text-warning">
                                    All Movies
                                </strong>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('series.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th green"></i>
                            <p class="teal">
                                <strong class="text-warning">
                                    All Series
                                </strong>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                            <p> Genres<i class="right fa fa-angle-left"></i></p>
                        </a>
                        <ul class="nav-treeview">
                            @foreach(\App\Model\Genre::all() as $genre)
                                {{--<left-navbar-component :name="{{ json_encode($genre->name) }}"--}}
                                {{--:route="{{ json_encode(route('genres.show', $genre->slug)) }}"></left-navbar-component>--}}
                                <li class="nav-item">
                                    <a href="{{ route('genres.show', $genre->slug) }}" class="nav-link">
                                        <i class="nav-icon fas fa-circle text-warning"></i>
                                        <p class="text-warning">
                                            {{ $genre->name }}
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-secondary">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer bg-dark text-white">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="https://www.filma24.stream">Filma24.stream</a>.</strong> All rights reserved.
        <p>Disclaimer: This site does not store any files on its server! All contents are provided by non-affiliated third parties!</p>
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/privacy') }}" class="nav-link">Privacy Policy</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/dmca') }}" class="nav-link">Dmca</a>
            </li>
        </ul>
    </footer>
</div>
<!-- ./wrapper -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<script src="{{ asset('js/app.js')}}" type="module" async></script>
@yield('scripts')
</body>
</html>

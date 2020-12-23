<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Internal Course-Net</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Admin Internal Course-Net
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Auth::check())
            <div class="container mt-4">
                <div class="row mt-4">
                    <div class="col-md">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Profesi <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('profession.create') }}">Tambah Profesi Baru</a></li>
                                    <li class="m-2"><a href="{{ route('professions') }}">Tampilkan Semua Profesi</a></li>
                                </ul>
                            </li>      

                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Coach <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('coach.create') }}">Tambah Coach Baru</a></li>
                                    <li class="m-2"><a href="{{ route('coaches') }}">Tampilkan Semua Coach</a></li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Sales <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('salesperson.create') }}">Tambah Sales Baru</a></li>
                                    <li class="m-2"><a href="{{ route('salespersons') }}">Tampilkan Semua Sales</a></li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Kanal <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('knowcn.create') }}">Tambah Kanal Baru Course-Net</a></li>
                                    <li class="m-2"><a href="{{ route('knowcns') }}">Tampilkan Semua Kanal Course-Net</a></li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Perusahaan Rekanan <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('jobconnector.create') }}">Tambah Perusahaan Penerima Loker</a></li>
                                    <li class="m-2"><a href="{{ route('jobconnectors') }}">Tampilkan Semua Perusahaan Penerima Loker</a></li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Cabang <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('branch.create') }}">Tambah Cabang Baru Course-Net</a></li>
                                    <li class="m-2"><a href="{{ route('branches') }}">Tampilkan Semua Cabang Course-Net</a></li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Program <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('program.create') }}">Tambah Program Baru</a></li>
                                    <li class="m-2"><a href="{{ route('programs') }}">Tampilkan Program</a></li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="" data-toggle="dropdown">Jadwal Kelas<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="m-2"><a href="{{ route('programpivot.create') }}">Tambah Jadwal Kelas Baru</a></li>
                                    <li class="m-2"><a href="{{ route('programpivots') }}">Tampilkan Jadwal Kelas</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        @endif

        @if(!Auth::check())
            <div class="container">
                @yield('content')
            </div>
        @endif
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>

</body>
</html>

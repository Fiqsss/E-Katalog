

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-Katalog | {{ $title }}</title>

    <!-- css dasar -->
    <link rel="stylesheet" href="{{ ('../css/style.css') }}">
    <!-- awesom -->
    <link rel="stylesheet" href="{{ ('../fontawesome/css/all.min.css') }}">
    <!-- css botstrap & js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="head position-absolute w-100" style="background-color: {{ ($title === 'Home') ? '#606C5D' : (($title === 'transaksi') ? '#5A96E3' : (($title === 'User') ? '#F2A154' : '')) }}; min-height: 300px;"></div>
    <section id="sidebar">
        <div class="container shadow rounded ">
        <div class="button-close rounded">
            <a class="tombol ">
            <i id="cls" class="fa-solid fa-xl " style="margin-top: 25px; color:#1d2b44"></i>
            </a>
        </div>
        <div class="sidebar">
        <div class="header mb-3">
            <a id="linklogo" class="navbar-brand" href="#"><img src="{{ ('../img/798px-Smartfren_(2019).svg.png') }}" class="w-100" alt=""></a>
        </div>
        <br>
        <ul class="navbar-nav">
        <li class="nav-item  d-flex  mb-3">
            <a class="nav-link  d-flex"  href="/operator/home">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-house-chimney fa-xl {{ ($title === "Home") ? 'fa-bounce' : '' }}"  style="color:#213555"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link d-flex" href="/operator/transaksi">
            <div class="icon icon-shpe icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-repeat fa-xl {{ ($title === "transaksi") ? 'fa-bounce' : '' }}" style="color: #213555"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi </span>
            @include('partials.pagetransaksi')
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link d-flex" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-right-from-bracket fa-xl {{ ($title === "Logout") ? 'fa-bounce' : '' }}"></i>
                </div>
                <span class="nav-link-text ms-1" style="color: #213555">Log Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        </ul>
        </div>
        </div>
    </section>

    <div class="container" style="position: relative">
        @yield('container')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="{{ ('../js/main.js') }}"></script>

</body>
</html>


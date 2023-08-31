

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .wrap-full
        {
            display: flex;
            justify-content: center;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            position: relative;
            min-height: 30vh;
            width: 100%;
            border: 0;
            border-radius: 0;
        }
    .modal-content-fullscreen {
        display: flex;
        justify-content: center

    }

    .modal-body {
        overflow-y: auto;
    }

    </style>
</head>
<body>
    <div class="head position-absolute w-100" style="background-color: {{ ($title === 'Home') ? '#F21472' : (($title === 'Tambah') ? '#448EF6' : (($title === 'User') ? '#F2A154' : (($title === 'transaksi') ? '#22A699' : ''))) }}; min-height: 300px;"></div>
    <section id="sidebar" >
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
            <a class="nav-link  d-flex"  href="/admin/home">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-house-chimney fa-xl {{ ($title === "Home") ? 'fa-bounce' : '' }}"  style="color:#213555"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item mb-3">
        <a class="nav-link d-flex" href="/admin/tambahproduk">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-square-plus fa-xl  {{ ($title === "Tambah") ? 'fa-bounce' : '' }}"" style="color: #213555"></i>
            </div>
            <span class="nav-link-text ms-1">Tambah Barang</span>
            </a>
        </li> --}}
        <li class="nav-item mb-3">
            <a class="nav-link d-flex" href="/admin/user">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-user fa-xl  {{ ($title === "User") ? 'fa-bounce' : '' }}" style="color: #213555"></i>
            </div>
            <span class="nav-link-text ms-1">User</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link d-flex" href="/admin/transaksi">
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{ ('../js/main.js') }}"></script>
    <script>
    @if(session('success'))
        Swal.fire(
            'Berhasil!',
            '{{ session('success') }}',
            'success'
        );
    @endif

    @if($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
            });
        </script>

    @endif
    </script>
</body>

</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
         #lupapassword a{
            color: white;
        }
        #lupapassword:hover a{
            color: #35A29F;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('loginadmin') }}">
            @csrf
            <h3>Log In</h3>

            <div class="inputBox">
                <span>Username</span>
                <div class="box">
                    <div class="icon"> <ion-icon name="person"></ion-icon></div>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </div>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="inputBox">
                <span>Password </span>
                <div class="box">
                    <div class="icon"><ion-icon name="lock-closed"></ion-icon></div>
                    <input type="password" name="password" required>
                </div>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div id="lupapassword" style=" margin-bottom:20px;">
                <a href="{{ route('getlupapassword') }}">Lupa Password? </a>
            </div>

            <div class="inputBox">
                <div class="box">
                    <button id="button" class="btn" type="submit">LOGIN</button>
                </div>
            </div>

            <div class="inputBox">
                <div class="box">
                    <a href="/operator/login" id="button" class="btn" type="button" name="login">LOGIN SEBAGAI OPERATOR</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Tambahkan skrip berikut di bawah form -->
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

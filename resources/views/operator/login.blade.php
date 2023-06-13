
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body style="background-color: #D25380">
    <div style="background-color: #537188" class="container">
        <form method="POST" action="{{ route('loginoperator') }}">
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

            <div class="inputBox">
                <div class="box">
                    <button id="button" class="btn" type="submit">LOGIN</button>
                </div>
            </div>

            <div class="inputBox">
                <div class="box">
                    <a href="/admin/login" id="button" class="btn" type="button" name="login">LOGIN SEBAGAI ADMIN</a>
                </div>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Tambahkan skrip berikut di bawah form -->
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
</body>
</html>

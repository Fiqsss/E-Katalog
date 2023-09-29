<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="bg-white" >
    <div class="container d-flex align-items-center justify-content-center bg-white" style="min-height: 100vh">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-center">
                <img class="img-fluid w-25" src="{{ asset('img/798px-Smartfren_(2019).svg.png') }}" alt="">
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
                @endif
                <h5 class="bold">Lupa Password?</h5>
              <p class="card-text" >Masukan alamat emailmu yang terdaftar, Kami akan mengirimimu Link untuk mereset passwordmu.</p>
              <h6>Alamat Email</h6>
              <form action="{{ route('lupapassword') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control shadow-sm" name="email">
                    <button type="submit" class="btn btn-primary mt-2">Kirim Link</button>
              </form>
            </div>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
   <div class="container">
    <div class="row">

        <div class="col-md-4" style="padding-top:100px;"> </div>
        <div class="col-md-4" style="padding-top:100px;">
            <h3>Sign In</h3>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
            @foreach ($errors->all() as $err )
            <div class="alert alert-danger">
                {{ $err }}
            </div>
            @endforeach
            @endif
            <form action="{{ route('storeSignin') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>

                <button class="btn btn-primary">Signin</button> Jika belum punya akun ?
                <a href="{{ route('signup') }}" class="btn btn-outline-primary mx-2">Sign Up</a>
              </form>
        </div>


    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

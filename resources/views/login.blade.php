<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    
    <!-- MultiStep Form -->
<div class="container-fluid" >
    <div class="row justify-content-center mt-5">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-5 mb-2">
                <h2><strong>LOGIN</strong></h2>

                @if (session()->has('error'))
                    <div class="alert alert-danger  fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 my-4">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Masukan Username" required name="username">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" placeholder="Masukan Password" required name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/form/form.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
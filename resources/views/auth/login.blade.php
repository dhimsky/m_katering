<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet" />
    <style>
        .wa_btn {
            position: fixed;
            right: 60px;
            overflow: hidden;
            width: 57px;
            height: 57px;
            border-radius: 100px;
            border: 0;
            z-index: 9999;
            transition: 0.2s;
            box-shadow: 0 0 7px rgba(253, 253, 253, 0.2);
        }

        .wa_btn.wa {
            bottom: 20px;
            right: 15px;
            background-color: #25D366;
            color: white;
        }
    </style>
</head>
<body>
    <a href="https://wa.me/6285747928777?text=Halo%20admin,%20izin%20bertanya%20tentang%20KTM" target="_blank">
        <button class="bi bi-whatsapp wa_btn wa"></button>
    </a>
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <form class="md-float-material form-material" action="/login" method="post">
                        @csrf
                        <div class="auth-box card">
                            <div class="row m-b-10 mt-3">
                                <div class="col-md-12">
                                    <h3 class="text-center">Marketplace Katering</h3>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ Session::get('email') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">EMAIL</label>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">PASSWORD</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Masuk</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="{{ route('register') }}" class="btn btn-link">Belum punya akun? Daftar di sini</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

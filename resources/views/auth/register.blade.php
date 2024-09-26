<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="text-center">
                            <h3 class="text-center">Register</h3>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="form-group form-primary">
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="merchant" selected>Merchant</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Sebagai</label>
                                </div>

                                <div id="common-fields">
                                    <div class="form-group form-primary">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama</label>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Email</label>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div id="merchant-fields">
                                    <div class="form-group form-primary">
                                        <input type="text" name="company_name" class="form-control" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama Perusahaan</label>
                                    </div>

                                    <div class="form-group form-primary">
                                        <input type="text" name="address" class="form-control" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Alamat</label>
                                    </div>

                                    <div class="form-group form-primary">
                                        <input type="text" name="contact" class="form-control" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Kontak</label>
                                    </div>

                                    <div class="form-group form-primary">
                                        <textarea name="description" class="form-control" required></textarea>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Deskripsi</label>
                                    </div>
                                </div>

                                <div id="customer-fields" style="display: none;">
                                    <!-- Customer-specific fields could go here if needed -->
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#role').change(function() {
                if ($(this).val() === 'merchant') {
                    $('#merchant-fields').show();
                    $('#customer-fields').hide();
                } else {
                    $('#merchant-fields').hide();
                    $('#customer-fields').show();
                }
            });
        });
    </script>
</body>
</html>

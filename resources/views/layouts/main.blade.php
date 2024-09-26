<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Marketplace Katering | @yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}images/logo.png">
    <link href="{{ asset('/') }}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/vendor/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
    
    <style>
        ::placeholder {
            font-style: italic;
        }
    </style>

    <!-- SweetAlert CSS (optional for styling) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        @if (Auth::check())
            <div class="nav-header">
                <a href="{{ Auth::user()->role == 'merchant' ? route('merchant.dashboard') : route('customer.home') }}" class="brand-logo">
                    <img class="logo-abbr" src="{{ asset('/') }}images/logoPNC.png" alt="">
                    <img class="logo-compact" src="{{ asset('/') }}assets/images/eKTM.png" alt="">
                    <img class="brand-title" src="{{ asset('/') }}assets/images/eKTM.png" alt="">
                </a>
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
        @endif
        
        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="content-body">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed & Developed by <a href="#" target="_blank">Dhimas Afrisetiawan</a> 2023</p>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        document.querySelectorAll('.delete-confirm').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); 

                const url = this.getAttribute('href'); 

                swal({
                    title: "Apakah Anda yakin?",
                    text: "Data ini akan dihapus dan tidak dapat dipulihkan!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        const form = button.closest('form');
                        form.submit();
                    } else {
                        swal("Dibatalkan", "Data Anda aman :)", "error");
                    }
                });
            });
        });
    </script>
    <!-- Required vendors -->
    <script src="{{ asset('/') }}assets/vendor/global/global.min.js"></script>
    <script src="{{ asset('/') }}assets/js/quixnav-init.js"></script>
    <script src="{{ asset('/') }}assets/js/custom.min.js"></script>

    <!-- Datatable -->
    <script src="{{ asset('/') }}assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins-init/datatables.init.js"></script>
    
    <!-- Form validate init -->
    <script src="{{ asset('/') }}assets/js/plugins-init/jquery.validate-init.js"></script>
    
    <!-- Form step init -->
    <script src="{{ asset('/') }}assets/js/plugins-init/jquery-steps-init.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>
</html>

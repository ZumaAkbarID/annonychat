<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="https://rahmatwahyumaakbar.com/storage/assets/img/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('storage') }}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('storage') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('storage') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('storage') }}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('storage') }}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('storage') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage') }}/css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
</head>

<body>

    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="{{ asset('storage') }}/images/img-01.png" class="img-fluid" alt="IMG">
            </div>

            <form class="contact1-form validate-form" method="POST">
                @csrf

                <span class="contact1-form-title">
                    Kirim Zuma Pesan Rahasia
                </span>


                <div class="wrap-input1 validate-input" data-validate="Pesan tidak boleh kosong">
                    <textarea class="input1" name="message" placeholder="Pesan"></textarea>
                    <span class="shadow-input1"></span>
                </div>

                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                        <span>
                            Kirim Pesan
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('storage') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('storage') }}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ asset('storage') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('storage') }}/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('storage') }}/vendor/tilt/tilt.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Yah...',
                html: "{!! implode('', $errors->all('<div>:message</div>')) !!}"
            });
        @endif
        @if (session()->has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Yah...',
                html: "{!! session('error') !!}"
            });
        @endif
        @if (session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Yey...',
                html: "{!! session('success') !!}"
            });
        @endif
    </script>

    <!--===============================================================================================-->
    <script src="{{ asset('storage') }}/js/main.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"></noscript>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
</head>
<body>
    <div>
        @yield('content')
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')

    <footer class="footer" id="f-book">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Livraria 2024</div>
                <div class="col-lg-4 my-3 my-lg-0 text-center">
                    <a id="logo" class="btn btn-social mx-2" href="https://web.whatsapp.com/" aria-label="WhatsApp">
                        <img class="logo" src="{{ url('assets/img/logos/logo1.png') }}" alt="WhatsApp Logo"/>
                    </a>
                    <a id="logo" class="btn btn-social mx-2" href="https://www.instagram.com/" aria-label="Instagram">
                        <img class="logo" src="{{ url('assets/img/logos/logo2.png') }}" alt="Instagram Logo"/>
                    </a>
                    <a id="logo" class="btn btn-social mx-2" href="https://github.com/" aria-label="GitHub">
                        <img class="logo3" src="{{ url('assets/img/logos/logo3.png') }}" alt="GitHub Logo"/>
                    </a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="termo" id="policy" href="#">Política de Privacidade</a>
                    <a class="termo" href="#">Termos de Uso</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

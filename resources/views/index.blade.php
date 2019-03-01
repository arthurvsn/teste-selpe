<!doctype html>
<html lang="pt-br">

    @include('header')

    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <script type="text/javascript" src="{{ asset('js/product.js') }}"></script>

    <body id="" cz-shortcut-listen="true" class="body" >

        <div class="row">

            <div class="container">

                <a href="/"><h1>Casa de Ração do Manuel</h1></a>

                <div class="col-md-12">

                    @yield('content')

                </div>

            </div>

        </div>

    </body>

</html>

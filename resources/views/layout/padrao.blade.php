<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('src.cabecalho')
    <body data-bs-theme="dark">
        <div class="container-fluid">
            @yield('content')
        </div>
        @include('src.rodape')
    </body>
</html>

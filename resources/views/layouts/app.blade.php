<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts/head')

    @section('headerSection')
        @show

</head>
<body>
    <div id="app">
        @include('layouts/nav')
        <div class="container">
            
            @section('content')
                @show
        </div>

        <div>
            @include('layouts/footer')

            @section('footerSection')
                @show
        </div>
    </div>
    @include('footer')
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin/layouts/head')

    @section('headerSection')
        @show

</head>
<body>
    <div id="app">
        @include('admin/layouts/sidebar')
        @include('admin/layouts/nav')

        <div class="container-fluid" style="margin-top:10vh;">

            @include('admin/inc/message')
            @section('content')
                @show
        </div>

        <div>
            @include('admin/layouts/footer')

            @section('footerSection')
                @show
        </div>
    </div>
    @include('footer')
</body>
</html>

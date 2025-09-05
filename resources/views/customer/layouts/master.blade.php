<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.map">





    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'HRM Project')</title>
</head>

<style>
    .bg-of-body{
        background-color: rgb(26, 29, 56);
    }
    
</style>
@include('customer.layouts.head-tag')
@include('customer.layouts.header')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1 0 auto;
    }

    footer {
        flex-shrink: 0;
        background-color: #f8f9fa;
        padding: 20px 0;
        text-align: center;
    }
</style>

<body class="bg-of-body">
    <main>
        @yield('content')
    </main>

    @include('customer.layouts.footer')


</body>

</html>

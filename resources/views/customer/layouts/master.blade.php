<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <title>@yield('title', 'HRM Project')</title>

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" integrity="..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    @include('customer.layouts.head-tag')

    <style>
        .bg-of-body {
            background-color: rgb(26, 29, 56);
        }
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
</head>
<body class="bg-of-body">

    @include('customer.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('customer.layouts.footer')

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       
    </script>

</body>
</html>

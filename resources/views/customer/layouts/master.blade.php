<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>@yield('title', 'HRM Project')</title>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" integrity="..."
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    @include('customer.layouts.head-tag')

    <style>
        .bg-of-body {
            background-color: rgb(26, 29, 56);
            margin: 0;
        }

        html,
        body {
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

        .github-icon {
            color: #000;

        }

        .mt-of-login {
            margin-top: 35%;
        }

        .mt-of-reg {
            margin-top: 25%;
        }

        @media (min-width:992px) {


            .custom-margin-left {
                margin-left: 27%;
            }
        }

        .ml-mobile {
            margin-left: 95px !important;

        }

        .ml-mbobile-sign {
            margin-left: 160px;
        }


        .card-price {
            width: 18rem;
           
        }

        .card.middle {
            height: 13.75rem;
      
        }

        .text-height-desc {
            line-height: 1.5;
        }

        .form-control-home {
            box-shadow: 0 0 15px 4px rgba(0, 123, 255, 0.8);
            border-color: #007bff;
            outline: none;
            transition: box-shadow 0.3s ease;
        }

        .form-control-home:focus {
            box-shadow: 0 0 18px 5px rgba(0, 123, 255, 1);
            border-color: #0056b3;
        }

        #carouselExample img {
            height: 300px;
            /* ارتفاع ثابت */
            object-fit: cover;
         
            width: 100%;
            
        }

        .style-particles {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>

<body class="bg-of-body">

    <div id="particles-js" class="style-particles" style=""></div>

    @include('customer.layouts.header')


    <main class="hero-section">
        @yield('content')
    </main>

    @include('customer.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script></script>


    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 80
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle"
                },
                "size": {
                    "value": 3
                },
                "move": {
                    "enable": true,
                    "speed": 2
                }
            },
            "interactivity": {
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    }
                }
            }
        });
    </script>
</body>

</html>

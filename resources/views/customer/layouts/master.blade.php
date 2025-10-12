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
        
             .card-body {
                    text-align: right;
                }

                .card-img-top {
                    object-fit: cover;
                    height: 160px;
                }

                .carousel-control-prev-icon,
                .carousel-control-next-icon {
                    filter: none;
                    background-color: rgb(0, 0, 0);
                    width: 3rem;
                    height: 3rem;
                    border-radius: 50%;
                    box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
                }

            
                #desktopCarousel {
                    position: relative;
                    padding: 0 60px;
                   
                }

               
                #desktopCarousel .carousel-control-prev,
                #desktopCarousel .carousel-control-next {
                    width: 3rem;
                    height: 3rem;
                    top: 50%;
                    transform: translateY(-50%);
                    position: absolute;
                }

                #desktopCarousel .carousel-control-prev {
                    left: -60px;
                  
                }

                #desktopCarousel .carousel-control-next {
                    right: -60px;
                
                }


                 .card-slider-home {
  border-radius: 15px; /* گوشه‌های گرد */
  border: 1.5px solid #ddd; /* حاشیه ملایم */
  box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* سایه نرم */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.card-img-top {
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
  object-fit: cover;
  height: 200px; /* ارتفاع ثابت برای یکنواختی */
}

.card-body-slider {
  padding: 15px 20px;
  background-color: #fff;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
}
           .unique-carousel-container {
                    border-radius: 15px;
                    overflow: hidden;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                    max-width: 100%;
                    margin: 20px auto;
                }

                .unique-carousel-inner img {
                    border-radius: 15px;
                    object-fit: cover;
                    height: 300px;
                    transition: transform 0.5s ease;
                }

                .unique-carousel-inner .carousel-item.active img {
                    transform: scale(1.05);
                }

                .unique-carousel-control-prev,
                .unique-carousel-control-next {
                    top: 50% !important;
                    transform: translateY(-50%);
                    width: 40px;
                    height: 40px;
                    background-color: rgba(255, 255, 255, 0.6);
                    border-radius: 50%;
                    filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.3));
                    opacity: 1;
                }



                @media (min-width: 992px) {
                    .unique-carousel-container {
                        max-width: 1000px;
                        margin: 20px auto;
                        border-radius: 15px;
                        overflow: hidden;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                    }


                    .unique-carousel-inner img {
                        height: 450px;
                    }
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
        "opacity": {
            "value": 0.3,
            "random": false
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

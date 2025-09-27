@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <style>
        #carouselExample img {
            height: 300px;
            /* ارتفاع ثابت */
            object-fit: cover;
            /* تصاویر به خوبی توی باکس جا می‌گیرن بدون کشیدگی */
            width: 100%;
            /* تصویر عرض والد را بگیرد */
        }
    </style>

    <style>
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
    </style>
    <style>
        .card-price {
            width: 18rem;
            /* عرض ثابت برای همه کارت‌ها */
        }

        .card.middle {
            height: 13.75rem;
            /* ارتفاع بیشتر برای کارت وسطی */
        }

        .text-height-desc {
            line-height: 1.5;
        }
    </style>

    <section>
        <div class="container">
            <div id="carouselExample" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('customer/banner/images/1.webp') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('customer/banner/images/2.webp') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x300?text=3" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">قبلی</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">بعدی</span>
                </button>
            </div>

            <div class="container text-light">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-light text-cente mt-5">

                        <div class="input-group mb-5">
                            <input type="text" class="form-control form-control-home "
                                placeholder="Get updates & discounts" aria-label="Recipient's username"
                                aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary ms-3 bg-light text-dark"
                                    type="button">Submit</button>
                            </div>
                        </div>

                        <h4>AI-native platform for on-call and incident response with effortless monitoring, status pages,
                            tracing, infrastructure monitoring and log management.</h3>
                    </div>
                </div>
            </div>





            {{-- 3 cards --}}
            <div class="d-flex justify-content-center align-items-end gap-3 mt-5">

                <div class="card card-price text-white bg-dark mb-3">
                    <div class="card-header">Limited</div>
                    <div class="card-body">
                        <h5 class="card-title">200 requests / Day</h5>
                        <p class="card-text">Free</p>
                    </div>
                </div>


                <div class="card card-price text-white bg-secondary  middle">
                    <div class="card-header">Unlimited</div>
                    <div class="card-body">
                        <h5 class="card-title">+1000 requests / Day</h5>
                        <br>
                        <p class="card-text">100,000 IRT</p>
                    </div>
                </div>

                <div class="card card-price text-white bg-dark mb-3">
                    <div class="card-header">Limited</div>
                    <div class="card-body">
                        <h5 class="card-title">100 requests / Day</h5>
                        <p class="card-text">Free</p>
                    </div>
                </div>
            </div>

            {{-- to button --}}

            <div class="row mt-5 mb-5">
                <div class="col-6 d-flex justify-content-center">
                    <a class="btn btn-dark w-100" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
                        aria-expanded="false" aria-controls="multiCollapseExample1">
                        Uptime monitoring <span class="bi bi-arrow-down"></span>
                    </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <button class="btn btn-dark w-100" type="button" data-bs-toggle="collapse"
                        data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
                        Log management <span class="bi bi-arrow-down"></span>
                    </button>
                </div>
            </div>




            <div class="row">
                <div class="col mb-3">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            <h4>Uptime monitoring</h4> Our Uptime Monitoring service ensures your website is always online
                            and accessible. We continuously check your site’s status and immediately notify you if any
                            downtime occurs, helping you maintain a reliable online presence.
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                            <h4>Log Management</h4> Our Log Management system collects, stores, and analyzes your website’s
                            logs to help you track activities, troubleshoot issues, and improve security. Access detailed
                            reports anytime to stay informed about your site’s performance.
                        </div>
                    </div>
                </div>
            </div>


            {{-- text dont worry --}}
            <div class="container text-light">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-light text-cente mt-5">


                        <h4 class="text-center text-light fw-semibold px-4 text-height-desc">
                            Our system continuously monitors your website’s links in real-time to ensure they are always
                            active and accessible.
                            Should any link become inactive, you’ll receive instant alerts—allowing you to quickly address
                            issues before they affect your visitors.
                            With a user-friendly dashboard and customizable settings, managing your site’s link health has
                            never been easier.
                            Keep your website seamless, reliable, and professional with effortless link monitoring.
                        </h4>

                    </div>
                </div>
            </div>

            <style>
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

                /* تنظیم موقعیت اسلایدر */
                #desktopCarousel {
                    position: relative;
                    padding: 0 60px;
                    /* فاصله داخلی برای جا دادن دکمه‌ها */
                }

                /* موقعیت دکمه‌ها بیرون از اسلایدر */
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
                    /* فاصله دکمه قبلی از اسلایدر */
                }

                #desktopCarousel .carousel-control-next {
                    right: -60px;
                    /* فاصله دکمه بعدی از اسلایدر */
                }
            </style>

            </head>

            <body>

                <div class="container py-4">
                    <h3 class="mb-4 text-end">اسلایدر کارت‌ها</h3>

                    <!-- نسخه دسکتاپ: هر اسلاید شامل ۳ کارت -->
                    <div id="desktopCarousel" class="carousel slide d-none d-md-block m-5" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <!-- اسلاید ۱ -->
                            <div class="carousel-item active">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <img src="https://picsum.photos/seed/1/800/400" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">کارت ۱</h5>
                                                <p class="card-text small">توضیح مختصر.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <img src="https://picsum.photos/seed/2/800/400" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">کارت ۲</h5>
                                                <p class="card-text small">توضیح کارت دوم.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <img src="https://picsum.photos/seed/3/800/400" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">کارت ۳</h5>
                                                <p class="card-text small">توضیح کارت سوم.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- اسلاید ۲ -->
                            <div class="carousel-item">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <img src="https://picsum.photos/seed/4/800/400" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">کارت ۴</h5>
                                                <p class="card-text small">توضیح کارت چهارم.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <img src="https://picsum.photos/seed/5/800/400" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">کارت ۵</h5>
                                                <p class="card-text small">توضیح کارت پنجم.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <img src="https://picsum.photos/seed/6/800/400" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">کارت ۶</h5>
                                                <p class="card-text small">توضیح کارت ششم.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- کنترل‌ها -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#desktopCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">قبلی</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#desktopCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">بعدی</span>
                        </button>
                    </div>

                    <!-- نسخه موبایل: هر اسلاید فقط یک کارت -->
                    <div id="mobileCarousel" class="carousel slide d-block d-md-none mt-4" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <!-- کارت ۱ -->
                            <div class="carousel-item active">
                                <div class="card shadow-sm">
                                    <img src="https://picsum.photos/seed/1/800/400" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">کارت ۱</h5>
                                        <p class="card-text small">توضیح کارت.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- کارت ۲ -->
                            <div class="carousel-item">
                                <div class="card shadow-sm">
                                    <img src="https://picsum.photos/seed/2/800/400" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">کارت ۲</h5>
                                        <p class="card-text small">توضیح دوم.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- کارت ۳ -->
                            <div class="carousel-item">
                                <div class="card shadow-sm">
                                    <img src="https://picsum.photos/seed/3/800/400" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">کارت ۳</h5>
                                        <p class="card-text small">توضیح سوم.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- ادامه کارت‌ها در موبایل... -->
                        </div>

                        <!-- کنترل‌ها موبایل -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#mobileCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">قبلی</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#mobileCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">بعدی</span>
                        </button>
                    </div>
                </div>







                <div class="accordion mt-5 mb-5" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                🔔 How Monitoring Notifications Work
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-dark text-light">
                                <h5 class="mb-3 text-info">🔔 How Monitoring Notifications Work</h5>
                                <p>
                                    Once you register a link in our system, it will be monitored automatically at your
                                    selected time interval
                                    (e.g., every 5 minutes).
                                </p>
                                <p>
                                    If any issue is detected, such as:
                                <ul>
                                    <li>The link is down or unreachable</li>
                                    <li>Timeout or slow response</li>
                                    <li>Common errors like 404 or 500</li>
                                </ul>
                                you will receive an immediate <strong>email notification</strong> with all the relevant
                                details.
                                </p>
                                <p>
                                    When the issue is resolved and the link is back online, a recovery email will also be
                                    sent to inform you.
                                </p>
                                <p>
                                    <strong>📧 All alerts are sent via email.</strong><br>
                                    Please check your Spam folder and add our email address to your Safe List to ensure you
                                    don’t miss any important updates.
                                </p>
                                <p class="mb-0">
                                    💡 <em>You can customize how often each link is checked — every 5, 10, or 15 minutes —
                                        based on your preferences.</em>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                🆓 Our Subscription Model
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body  bg-dark text-light">
                                <p>
                                    At this time, all monitoring services we offer are <strong>completely free</strong> and
                                    come with
                                    <strong>no usage limits</strong>.
                                </p>
                                <p>
                                    You can add unlimited links, set your preferred check intervals, and receive real-time
                                    email alerts —
                                    all without any cost or subscription requirements.
                                </p>
                                <p>
                                    We believe that basic uptime monitoring should be accessible to everyone — whether
                                    you're a developer,
                                    a startup, or just running a personal project.
                                </p>
                                <p class="mb-0">
                                    🔒 <em>No hidden fees, no trial periods, and no credit card required.</em>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                📣 Notification Channels
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body  bg-dark text-light">
                                <p>
                                    Currently, all monitoring alerts are sent via <strong>email</strong> to the address you
                                    provide
                                    when registering your links.
                                </p>
                                <p>
                                    We're actively working on expanding our notification options. In the near future, you'll
                                    be able to
                                    choose to receive alerts through:
                                <ul>
                                    <li>📱 SMS (text messages)</li>
                                    <li>💬 Telegram</li>
                                    <li>🟢 WhatsApp</li>
                                </ul>
                                </p>
                                <p>
                                    These options will be fully customizable — so you'll be able to choose how and where you
                                    want to be notified.
                                </p>
                                <p class="mb-0">
                                    🔔 <em>Email notifications are active and reliable. More channels coming soon!</em>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>



    </section>
@endsection

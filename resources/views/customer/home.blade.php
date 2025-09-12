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
    <section class="hero-section">
        <div class="container">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
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


            <p class="d-inline-flex gap-1 mt-5 mb-5"> <a class="btn btn-dark" data-bs-toggle="collapse"
                    href="#multiCollapseExample1" role="button" aria-expanded="false"
                    aria-controls="multiCollapseExample1">Uptime monitoring <span class="bi bi-arrow-down"></span></a>
                <button class="btn btn-dark" type="button" data-bs-toggle="collapse"
                    data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Log
                    management <span class="bi bi-arrow-down"></span></button> </p>
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





            <style>
                .card-price {
                    width: 18rem;
                    /* عرض ثابت برای همه کارت‌ها */
                }

                .card.middle {
                    height: 13.75rem;
                    /* ارتفاع بیشتر برای کارت وسطی */
                }
            </style>

            <div class="d-flex justify-content-center align-items-end gap-3">

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
                        <h5 class="card-title">1000 requests / Day</h5>
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







            <div class="accordion mt-5 mb-5" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item’s accordion body.</strong> It is shown by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It’s also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It’s also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It’s also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

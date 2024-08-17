@extends('frontend.master')

@section('title')

@endsection

@section('content')

    <!-- hero area -->
    <section class="hero-section hero" data-background="" style="background-image: url(images/hero-area/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center zindex-1 HeroSection">
                    <div class="HeroHeadingDiv">
                        <h1 class="mb-3 mainHeroHeader">Empower Your Business with Innovative Software, Stunning Websites, and Reliable Maintenance!
                            </h1>
                        <p class="mb-4 mainHraderP"> At SoftDivz we automate your operations and fuel your growth, ensuring you stay ahead in the competitive market. Let us transform your business with innovative solutions designed for success!"</p>
                        <a href="#" class="btn btn-secondary w-50 mainHeaderbtn">Our Projects <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                    <div class="HeroImageDiv">
                        <img class="img-fluid w-100" src="{{ asset('frontend-assets') }}/images/hero-area/banner-img.png" alt="banner-img">
                    </div>
                </div>
            </div>
        </div>
        <!-- background shapes -->
        <div id="scene">
            <img class="img-fluid hero-bg-1 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/feature-bg-2.png" alt="">
            <img class="img-fluid hero-bg-2 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-1.png" alt="">
            <img class="img-fluid hero-bg-3 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-half-cycle.png" alt="">
            <img class="img-fluid hero-bg-4 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/green-dot.png" alt="">
            <img class="img-fluid hero-bg-5 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/blue-half-cycle.png" alt="">
            <img class="img-fluid hero-bg-6 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-1.png" alt="">
            <img class="img-fluid hero-bg-7 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/yellow-triangle.png" alt="">
            <img class="img-fluid hero-bg-8 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/service-half-cycle.png" alt="">
            <img class="img-fluid hero-bg-9 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/team-bg-triangle.png" alt="">
        </div>
    </section>
    <!-- /hero-area -->

    <!-- feature -->
    <section class="section feature mb-0" id="feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div class="w-70">
                        <h2 class="section-title">Our Services</h2>
                        <p class="mb-20">We provide a wide range of best-in-class services aimed at automating and enhancing user experiences for businesses.<br>We are here to support you 24/7</p>
                        <a class="btn btn-sm btn-primary mb-30" > View All <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                    <div class="w-30">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <!-- feature item -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($services as $service)
                        <div class="swiper-slide">
                            <div>
                                <div style="color:#42e0e1; font-size: 30px">{!! $service->icon !!}</div>
                                <h4 class="text-left">{{ $service->title }}</h4>
                                <p class="text-left">{{ $service->short_desc }}</p>
                                <a class="text-white"> Read More <i class="fa-solid fa-caret-right"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
        <img class="feature-bg-1 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/feature-bg-1.png" alt="bg-shape">
        <img class="feature-bg-2 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/feature-bg-2.png" alt="bg-shape">
    </section>
    <!-- /feature -->

    <!-- marketing -->
    <section class="section-lg seo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="seo-image">
                        <div class="team-slider">
                            @foreach ($softwares as $software)
                            <div class="team-member d-flex jusitfy-content-center align-items-center">
                                <div class="d-flex flex-column jusitfy-content-center align-items-center softwareProject">
                                    <div class="d-flex">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img class="rounded-circle img-fluid" src="{{ asset($software->image) }}" alt="team-member">
                                            <h6 class="text-center text-white">{{ $software->name }}</h6>
                                        </div>
                                    </div>
                                    <p class="text-center">{{ $software->desc }}</p>
                                    @if ($software->status == 1)
                                        <a href="{{ $software->site_link }}" target="_blank" class="text-white btn btn-sm projectBtn">Visit Demo <i class="fa-solid fa-angle-right"></i></a>
                                    @else
                                        <a href="{{ $software->site_link }}" class="text-white btn btn-sm projectBtn">Ongoing <i class="fa-solid fa-gears"></i></a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2 class="section-title">A Complete Range Of Our Software Projects!</h2>
                    <p>
                        Softdivz Software Projects delivers custom, innovative software solutions designed to meet your business needs. We specialize in creating robust and scalable software that drives success, ensuring every project is aligned with your goals. Trust Softdivz for top-tier software development.
                    </p>
                </div>
            </div>
        </div>
        <!-- background image -->
        <img class="img-fluid seo-bg" src="{{ asset('frontend-assets') }}/images/backgrounds/seo-bg.png" alt="seo-bg" width="50%">
        <!-- background-shape -->
        <img class="seo-bg-shape-1 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-1.png" alt="bg-shape">
        <img class="seo-bg-shape-2 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-half-cycle.png" alt="bg-shape">
        <img class="seo-bg-shape-3 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-2.png" alt="bg-shape">
    </section>
    <!-- /marketing -->

    <!-- service -->
    <section class="section-lg service">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5 order-2 order-md-1">
                    <h2 class="section-title">Our Latest Laravel Websites</h2>
                    <p class="mb-4">Softdivz Laravel Websites specializes in crafting dynamic, high-performance websites using Laravel. We build scalable, secure, and user-friendly sites tailored to your business needs, ensuring seamless functionality and a great user experience. Trust Softdivz for expert Laravel development.</p>
                    <ul class="pl-0 service-list">
                        <li class="text-white"><i class="ti-layout-tab-window text-purple"></i>Responsive on any device</li>
                        <li class="text-white"><i class="ti-layout-placeholder text-purple"></i>Secure and Fast</li>
                        <li class="text-white"><i class="ti-support text-purple"></i>Effective support</li>
                    </ul>
                </div>
                <div class="col-md-7 order-1 order-md-2">s
                    <div class="team-slider">
                        @foreach ($websites as $website)
                        <div class="team-member d-flex jusitfy-content-center align-items-center">
                            <div class="d-flex flex-column jusitfy-content-center align-items-center softwareProject">
                                <div class="d-flex">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img class="rounded-circle img-fluid" src="{{ asset($website->image) }}" alt="team-member">
                                        <h6 class="text-center text-white">{{ $website->name }}</h6>
                                    </div>
                                </div>
                                <p class="text-center">{{ $website->desc }}</p>
                                @if ($website->status == 1)
                                    <a href="{{ $website->site_link }}" target="_blank" class="text-white btn btn-sm projectBtn">Visit Site <i class="fa-solid fa-angle-right"></i></a>
                                @else
                                    <a href="{{ $website->site_link }}" class="text-white btn btn-sm projectBtn">Ongoing <i class="fa-solid fa-gears"></i></a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- background image -->
        <img class="img-fluid service-bg" src="{{ asset('frontend-assets') }}/images/backgrounds/service-bg.png" alt="service-bg" width="50%">
        <!-- background shapes -->
        <img class="service-bg-shape-1 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/service-half-cycle.png" alt="background-shape">
        <img class="service-bg-shape-2 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/feature-bg-2.png" alt="background-shape">
    </section>
    <!-- /service -->

    <!-- team -->
    <section class="section-lg team" id="team">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="team-slider">
                        @foreach ($wordpresss as $wordpress)
                        <div class="team-member d-flex jusitfy-content-center align-items-center">
                            <div class="d-flex flex-column jusitfy-content-center align-items-center softwareProject">
                                <div class="d-flex">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img class="rounded-circle img-fluid" src="{{ asset($wordpress->image) }}" alt="team-member">
                                        <h6 class="text-center text-white">{{ $wordpress->name }}</h6>
                                    </div>
                                </div>
                                <p class="text-center">{{ $wordpress->desc }}</p>
                                @if ($wordpress->status == 1)
                                    <a href="{{ $wordpress->site_link }}" target="_blank" class="text-white btn btn-sm projectBtn">Visit Site <i class="fa-solid fa-angle-right"></i></a>
                                @else
                                    <a href="{{ $wordpress->site_link }}" class="text-white btn btn-sm projectBtn">Ongoing <i class="fa-solid fa-gears"></i></a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5 wordpressDiv">
                    <h2 class="section-title">Our Latest Modern WordPress Projects</h2>
                    <p class="mb-30">Softdivz WordPress Websites offers expert WordPress development, creating fully customized, responsive, and feature-rich websites. We design user-friendly sites that are easy to manage and optimized for performance, tailored to your brand's needs. Trust Softdivz for professional WordPress solutions.</p>
                    <ul class="pl-0 service-list">
                        <li class="text-white"><i class="ti-layout-tab-window text-purple"></i>Bold and Modern Designed Websites</li>
                        <li class="text-white"><i class="ti-layout-placeholder text-purple"></i>Secure and Fast</li>
                        <li class="text-white"><i class="ti-support text-purple"></i>Using Only Elementor making the site Lighter</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- backgound image -->
        <img src="{{ asset('frontend-assets') }}/images/backgrounds/team-bg.png" alt="team-bg" class="img-fluid team-bg">
        <!-- background shapes -->
        <img class="team-bg-shape-1 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-1.png" alt="background-shape">
        <img class="team-bg-shape-2 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-1.png" alt="background-shape">
        <img class="team-bg-shape-3 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/team-bg-triangle.png" alt="background-shape">
        <img class="team-bg-shape-4 up-down-animation img-fluid" src="{{ asset('frontend-assets') }}/images/background-shape/team-bg-dots.png" alt="background-shape">
    </section>
    <!-- /team -->

    <!-- pricing -->
    <section class="section-lg pb-0 pricing" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-title">Our Pricing</h2>
                    <p class="mb-50">We Offer services for our clients to maintaning their site . We provide our Developer , Graphics Designer, SEO experts to help with our clients grow their online buisness. We also keep our pricings reasonalble to our clients so that our clients dont have to hire or go to agency for doing their work with double the amount.</p>
                    <div class="d-none d-md-block">
                    <div class="tab-pane d-flex justify-content-center w-100" >
                        @foreach ($pricings as $index => $pricing)
                            <div class="col-md-3 d-flex">
                                <div class="d-flex flex-column justify-content-between rounded text-left pricing-table table-1 h-100">
                                    <h5 class="mb-3"> <i class="fa-solid fa-circle mr-2" style="font-size: 10px"></i> {{ $pricing->title }}</h5>
                                    <h2 class="mb-3"><span>${{ $pricing->price }}</span></h2>
                                    <p class="mb-3">{{$pricing->desc}}
                                    </p>
                                    @foreach (explode(',', $pricing->services) as $Info)
                                        <p> <i class="fa-solid fa-circle mr-2" style="font-size: 10px"></i> {{ $Info }}</p>
                                    @endforeach

                                    <a href="#" class="btn pricing-btn mt-3 px-2">Get Started</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="col-lg-10 mx-auto d-block d-md-none">
                    <div class="row justify-content-center">
                        <div class="container">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs d-flex justify-content-center column-gap-3 row-gap-3" id="myTab" role="tablist">
                                @foreach ($pricings as $index => $pricing)
                                  <li class="nav-item" role="presentation">
                                    <a class="nav-link @if($index == 0) active @endif" id="pricing-tab{{ $pricing->id }}" data-bs-toggle="tab" href="#pricing{{ $pricing->id }}" role="tab" aria-controls="pricing{{ $pricing->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $pricing->title }}</a>
                                  </li>
                                @endforeach
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content mt-4" id="myTabContent">
                                @foreach ($pricings as $index => $pricing)
                                  <div class="tab-pane fade @if($index == 0) show active @endif" id="pricing{{ $pricing->id }}" role="tabpanel" aria-labelledby="pricing-tab{{ $pricing->id }}">
                                    <div class="d-flex justify-content-center">
                                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                                            <div class="rounded pricing-table table-1">
                                                <h5 class="mb-3"> <i class="fa-solid fa-circle mr-2" style="font-size: 10px"></i> {{ $pricing->title }}</h5>
                                                <h2 class="mb-3"><span>${{ $pricing->price }}</span></h2>
                                                <p class="mb-3">{{$pricing->desc}}
                                                </p>
                                                @foreach (explode(',', $pricing->services) as $Info)
                                                <p> <i class="fa-solid fa-circle mr-2" style="font-size: 10px"></i> {{ $Info }}</p>
                                                @endforeach

                                                <a href="#" class="btn pricing-btn text-center w-100 mt-3 px-2">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                @endforeach
                              </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- background shapes -->
        <img class="pricing-bg-shape-1 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-1.png" alt="background-shape">
        <img class="pricing-bg-shape-2 up-down-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-half-cycle.png" alt="background-shape">
        <img class="pricing-bg-shape-3 left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/team-bg-triangle.png" alt="background-shape">
    </section>
    <!-- /pricing -->

    <!-- client logo slider -->
    <section class="section">
        <div class="container">
            <h2 class="section-title text-center mb-0">Our Clients</h2>
            <div class="client-logo-slider align-self-center">
                @foreach ($clients as $client )
                <a href="" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{ asset( $client->image ) }}" alt="client-logo"></a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /client logo slider -->

    <!-- newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Hear What Our Clients Say About Us !</h2>
                    <p class="mb-5">We help our clients to meet their required requiremnts within their deadline. We also keep a good professional Reation with our client.</p>
                </div>
                <div class="col-md-8 mx-auto MobileMarLeft">
                    <div class="Testimonialwrapper">
                        <i id="testimonialleft" class="fa-solid fas fa-angle-left"></i>
                        <ul class="Testimonialcarousel">
                            @foreach ($testimonials as $testimonial)
                            <li class="Testimonialcard p-2 h-100">
                                <div class="TestimonialcardInner h-100">
                                    <div class="testimonial-item d-flex justify-content-start column-gap-3 w-100">
                                        <div class="w-30 img">
                                            <img src="{{ asset($testimonial->image) }}" class="d-block" alt="Testimonial Image">
                                        </div>
                                        <div class="w-70 text-left">
                                            <p class="mb-0">{{ $testimonial->name }}</p>
                                            <p class="textDesc"> {{ $testimonial->title }},{{ $testimonial->company }}</p>
                                        </div>
                                    </div>
                                    <p class="mt-3">{{ $testimonial->desc }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <i id="testimonialright" class="fa-solid fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- background shapes -->
        <img class="newsletter-bg-shape left-right-animation" src="{{ asset('frontend-assets') }}/images/background-shape/seo-ball-2.png" alt="background-shape">
    </section>
    <!-- /newsletter -->

@endsection


@section('customJs')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3.3,   // Show 3 full slides and part of the 4th on large screens
    spaceBetween: 0,      // No space between slides
    loop: true,           // Loop the slides
    slidesPerGroup: 1,    // Slide 1 item at a time
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 5000,      // Auto slide every 5 seconds
        disableOnInteraction: false, // Continue auto-sliding after interaction
    },
    breakpoints: {
        // Adjust the number of slides per view for different screen sizes
        768: {
            slidesPerView: 3.3,   // For tablets and above
            slidesPerGroup: 1,    // Slide 1 item at a time
        },
        320: {
            slidesPerView: 1.1,   // For mobile devices, show 1 full slide and part of the next
            slidesPerGroup: 1,    // Slide 1 item at a time
        },
    },
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector(".Testimonialcarousel");
    const leftBtn = document.getElementById("testimonialleft");
    const rightBtn = document.getElementById("testimonialright");
    const wrapper = document.querySelector(".Testimonialwrapper");

    const firstCard = carousel.querySelector(".Testimonialcard");
    const cardWidth = firstCard.offsetWidth;

    let isDragging = false,
        startX,
        startScrollLeft,
        timeoutId;

    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    };

    const dragging = (e) => {
        if (!isDragging) return;

        const newScrollLeft = startScrollLeft - (e.pageX - startX);
        carousel.scrollLeft = newScrollLeft;
    };

    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    };

    const autoPlay = () => {
        if (window.innerWidth < 800) return;

        timeoutId = setTimeout(() => {
            carousel.scrollLeft += cardWidth;

            if (carousel.scrollLeft >= carousel.scrollWidth - carousel.offsetWidth) {
                carousel.scrollLeft = 0;
            }
            autoPlay();  // Continue the autoplay loop
        }, 2500);
    };

    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);

    // Event listeners for the left and right buttons
    leftBtn.addEventListener("click", () => {
        carousel.scrollLeft -= cardWidth;
    });

    rightBtn.addEventListener("click", () => {
        carousel.scrollLeft += cardWidth;
    });

    // Start autoplay on load
    autoPlay();
});

</script>
@endsection

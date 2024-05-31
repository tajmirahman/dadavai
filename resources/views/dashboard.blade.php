<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/xton/default/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 May 2024 15:02:55 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/slick.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/rangeSlider.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/dark.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
    <title>User | Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/assets/img/favicon.png">
</head>

<body>

    @php
    $setting= App\Models\Admin\Setting::find(1);
    @endphp

    <div class="top-header">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-12">
                    <ul class="header-contact-info">
                        <li>Welcome to Xton</li>
                        <li>Call: <a href="tel:+01321654214">+01 321 654 214</a></li>
                        <li>
                            <div class="dropdown language-switcher d-inline-block">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('frontend') }}/assets/img/us-flag.jpg" alt="image">
                                    <span>Eng <i class="bx bx-chevron-down"></i></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="{{ asset('frontend') }}/assets/img/germany-flag.jpg" class="shadow-sm" alt="flag">
                                        <span>Ger</span>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="{{ asset('frontend') }}/assets/img/france-flag.jpg" class="shadow-sm" alt="flag">
                                        <span>Fre</span>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="{{ asset('frontend') }}/assets/img/spain-flag.jpg" class="shadow-sm" alt="flag">
                                        <span>Spa</span>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="{{ asset('frontend') }}/assets/img/russia-flag.jpg" class="shadow-sm" alt="flag">
                                        <span>Rus</span>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="{{ asset('frontend') }}/assets/img/italy-flag.jpg" class="shadow-sm" alt="flag">
                                        <span>Ita</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="header-top-menu">
                        <li><a href="login.html"><i class="bx bxs-user"></i> My Account</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal"><i
                                    class="bx bx-heart"></i> Wishlist</a></li>
                        <li><a href="compare.html"><i class="bx bx-shuffle"></i> Compare</a></li>
                        <li><a href="login.html"><i class="bx bx-log-in"></i> Login</a></li>
                    </ul>
                    <ul class="header-top-others-option">
                        <div class="option-item">
                            <div class="search-btn-box">
                                <i class="search-btn bx bx-search-alt"></i>
                            </div>
                        </div>
                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i
                                        class="bx bx-shopping-bag"></i><span>0</span></a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area">
        <div class="xton-responsive-nav">
            <div class="container">
                <div class="xton-responsive-menu">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{ asset('frontend') }}/assets/img/logo.png" class="main-logo" alt="logo">
                            <img src="{{ asset('frontend') }}/assets/img/white-logo.png" class="white-logo"
                                alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="xton-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('upload/logo_black/' . $setting->logo_black) }}" style="width:70px; height:30px" alt="logo">
                        <img src="{{ asset('upload/logo_white/' . $setting->logo_white) }}" class="white-logo" style="width:70px; height:30px"
                            alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link active">Home <i
                                        class="bx "></i></a>

                            </li>
                            <li class="nav-item megamenu"><a href="#" class="nav-link">Shop <i
                                        class="bx "></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <h6 class="submenu-title">Shop Styles</h6>
                                                    <ul class="megamenu-submenu">

                                                        <li><a href="products-left-sidebar-with-categories.html">Left
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-right-sidebar.html">Right Sidebar</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="submenu-title">Shop Styles 2</h6>
                                                    <ul class="megamenu-submenu">
                                                        <li><a href="products-left-sidebar-2.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="products-left-sidebar-with-categories-2.html">Left
                                                                Sidebar With Categories</a></li>

                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="brand-slides owl-carousel owl-theme">
                                                <div class="brand-item">
                                                    <a href="#"><img
                                                            src="{{ asset('frontend') }}/assets/img/brand/img1.png"
                                                            alt="image"></a>
                                                </div>
                                                <div class="brand-item">
                                                    <a href="#"><img
                                                            src="{{ asset('frontend') }}/assets/img/brand/img2.png"
                                                            alt="image"></a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item megamenu"><a href="#" class="nav-link">Women's <i
                                        class="bx "></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <h6 class="submenu-title">Shop Styles</h6>
                                                    <ul class="megamenu-submenu">
                                                        <li><a href="products-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="products-left-sidebar-with-categories.html">Left
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                        <li><a href="products-right-sidebar-with-categories.html">Right
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-one-row.html">1 Products Per Row</a></li>
                                                        <li><a href="products-without-sidebar.html">Without Sidebar</a>
                                                        </li>
                                                        <li><a href="products-sidebar-fullwidth.html">With Sidebar Full
                                                                Width</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="submenu-title">Shop Styles 2</h6>
                                                    <ul class="megamenu-submenu">
                                                        <li><a href="products-left-sidebar-2.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="products-left-sidebar-with-categories-2.html">Left
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-right-sidebar-2.html">Right Sidebar</a>
                                                        </li>
                                                        <li><a href="products-right-sidebar-with-categories-2.html">Right
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-one-row-2.html">1 Products Per Row</a>
                                                        </li>
                                                        <li><a href="products-without-sidebar-2.html">Without
                                                                Sidebar</a></li>
                                                        <li><a href="products-sidebar-fullwidth-2.html">With Sidebar
                                                                Full Width</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="submenu-title">Shop Styles 3</h6>
                                                    <ul class="megamenu-submenu">
                                                        <li><a href="products-left-sidebar-3.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="products-left-sidebar-with-categories-3.html">Left
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-right-sidebar-3.html">Right Sidebar</a>
                                                        </li>
                                                        <li><a href="products-right-sidebar-with-categories-3.html">Right
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-one-row-3.html">1 Products Per Row</a>
                                                        </li>
                                                        <li><a href="products-without-sidebar-3.html">Without
                                                                Sidebar</a></li>
                                                        <li><a href="products-sidebar-fullwidth-3.html">With Sidebar
                                                                Full Width</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="megamenu-submenu">
                                                        <li>
                                                            <div class="aside-trending-products">
                                                                <img src="{{ asset('frontend') }}/assets/img/categories/img1.jpg"
                                                                    alt="image">
                                                                <div class="category">
                                                                    <h4>Top Trending</h4>
                                                                </div>
                                                                <a href="products-right-sidebar.html"
                                                                    class="link-btn"></a>
                                                            </div>
                                                            <div class="aside-trending-products">
                                                                <img src="{{ asset('frontend') }}/assets/img/categories/img2.jpg"
                                                                    alt="image">
                                                                <div class="category">
                                                                    <h4>Popular Products</h4>
                                                                </div>
                                                                <a href="products-right-sidebar.html"
                                                                    class="link-btn"></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item megamenu"><a href="#" class="nav-link">Men's <i
                                        class="bx "></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <h6 class="submenu-title">Shop Styles</h6>
                                                    <ul class="megamenu-submenu">
                                                        <li><a href="products-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="products-left-sidebar-with-categories.html">Left
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                        <li><a href="products-right-sidebar-with-categories.html">Right
                                                                Sidebar With Categories</a></li>
                                                        <li><a href="products-one-row.html">1 Products Per Row</a></li>
                                                        <li><a href="products-without-sidebar.html">Without Sidebar</a>
                                                        </li>
                                                        <li><a href="products-sidebar-fullwidth.html">With Sidebar Full
                                                                Width</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col">
                                                    <ul class="megamenu-submenu">
                                                        <li>
                                                            <div class="aside-trending-products">
                                                                <img src="{{ asset('frontend') }}/assets/img/categories/img2.jpg"
                                                                    alt="image">
                                                                <div class="category">
                                                                    <h4>Popular Products</h4>
                                                                </div>
                                                                <a href="products-right-sidebar.html"
                                                                    class="link-btn"></a>
                                                            </div>
                                                            <div class="aside-trending-products">
                                                                <img src="{{ asset('frontend') }}/assets/img/categories/img1.jpg"
                                                                    alt="image">
                                                                <div class="category">
                                                                    <h4>Top Trending</h4>
                                                                </div>
                                                                <a href="products-right-sidebar.html"
                                                                    class="link-btn"></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <div class="others-option">
                            <div class="option-item">
                                <div class="search-btn-box">
                                    <i class="search-btn bx bx-search-alt"></i>
                                </div>
                            </div>
                            <div class="option-item">
                                <div class="cart-btn">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i
                                            class="bx bx-shopping-bag"></i><span id="cartQty">0</span></a>
                                </div>
                            </div>
                            <div class="option-item">
                                <div class="burger-menu" data-bs-toggle="modal" data-bs-target="#sidebarModal">
                                    <span class="top-bar"></span>
                                    <span class="middle-bar"></span>
                                    <span class="bottom-bar"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>My Account</h2>
                <ul>
                    <li><a href="{{ route('user.logout') }}">Sign Out</a></li>


                </ul>

            </div>
        </div>
    </div>











    @php
    $settings= App\Models\Admin\Setting::find(1);
    @endphp


<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{ $settings->company_name }}</h3>
                    <div class="about-the-store">
                        {{-- <p>{{ $settings->site_slogan }}</p> --}}
                        <ul class="footer-contact-info">
                            <li><i class="bx bx-map"></i> <a href="#" target="_blank">{{ $settings->address }}</a></li>
                            <li><i class="bx bx-phone-call"></i> <a href="tel:+01321654214">{{ $settings->phone_one }}</a>
                            </li>
                            <li><i class="bx bx-phone-call"></i><a href="">{{ $settings->whatsapp_number }}</a> <span> Hot line number</span>
                            </li>
                        </ul>
                    </div>
                    <ul class="social-link">
                        <li><a href="{{ $settings->facebook_url }}" class="d-block" target="_blank"><i
                                    class="bx bxl-facebook"></i></a></li>
                        <li><a href="{{ $settings->twitter_url }}" class="d-block" target="_blank"><i
                                    class="bx bxl-twitter"></i></a></li>
                        <li><a href="{{ $settings->instagram_url }}" class="d-block" target="_blank"><i
                                    class="bx bxl-instagram"></i></a></li>
                        <li><a href="{{ $settings->youtube_url }}" class="d-block" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-4">
                    <h3>Quick Links</h3>
                    <ul class="quick-links">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="products-left-sidebar.html">Shop Now!</a></li>
                        <li><a href="products-left-sidebar-2.html">Woman's</a></li>

                        <li><a href="contact.html">Contact Us</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Customer Support</h3>
                    <ul class="customer-support">
                        <li><a href="login.html">My Account</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="track-order.html">Order Tracking</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Newsletter</h3>
                    <div class="footer-newsletter-box">
                        <p>To get the latest news and latest updates from us.</p>
                        <form class="newsletter-form" data-bs-toggle="validator">
                            <label>Your E-mail Address:</label>
                            <input type="email" class="input-newsletter" placeholder="Enter your email"
                                name="EMAIL" required autocomplete="off">
                            <button type="submit">Subscribe</button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <p>© all copyRight reserved by <a href="{{ url('/') }}"
                            target="_blank">{{ $settings->site_name }}</a></p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="payment-types">
                        <li><a href="#" target="_blank"><img
                                    src="{{ asset('frontend') }}/assets/img/payment/visa.png"
                                    alt="image"></a></li>
                        <li><a href="#" target="_blank"><img
                                    src="{{ asset('frontend') }}/assets/img/payment/mastercard.png"
                                    alt="image"></a></li>
                        <li><a href="#" target="_blank"><img
                                    src="{{ asset('frontend') }}/assets/img/payment/mastercard2.png"
                                    alt="image"></a></li>
                        <li><a href="#" target="_blank"><img
                                    src="{{ asset('frontend') }}/assets/img/payment/visa2.png"
                                    alt="image"></a></li>
                        <li><a href="#" target="_blank"><img
                                    src="{{ asset('frontend') }}/assets/img/payment/expresscard.png"
                                    alt="image"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</footer>

    <div class="go-top"><i class="bx bx-up-arrow-alt"></i></div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/popper.min.html"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/magnific-popup.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/parallax.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/rangeSlider.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/nice-select.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/meanmenu.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/sticky-sidebar.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/form-validator.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/contact-form-script.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/ajaxchimp.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
</body>

<!-- Mirrored from templates.hibootstrap.com/xton/default/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 May 2024 15:02:55 GMT -->

</html>








{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

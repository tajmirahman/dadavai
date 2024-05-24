<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/ginza/ginza/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2024 05:41:09 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Furniture eCommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="{{ asset('frontend') }}/assets/images/favicon.ico" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/iconfont.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/helper.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">

</head>

<body>

    <div id="main-wrapper">

        {{-- header start here --}}
        @include('forntend.body.header')
        {{-- header end here --}}


        <!-- Offcanvas Menu Start -->
        <div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
            <a href="javascript:void(0)" class="offcanvas-menu-close" id="offcanvas-menu-close-trigger">
                <i class="ion-android-close"></i>
            </a>

            <div class="offcanvas-wrapper">

                <div class="offcanvas-inner-content">
                    <div class="offcanvas-mobile-search-area">
                        <form action="#">
                            <input type="search" placeholder="Search ...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <nav class="offcanvas-navigation">
                        <ul>
                            <li class="menu-item-has-children"><a href="#">Home</a>
                                <ul class="submenu2">
                                    <li><a href="index.html">Home 01</a></li>
                                    <li><a href="index-2.html">Home 02</a></li>
                                    <li><a href="index-3.html">Home 03</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Shop</a>
                                <ul class="submenu2">
                                    <li class="menu-item-has-children"><a href="#">Pages</a>
                                        <ul class="submenu2">
                                            <li><a href="compare.html">Compare</a></li>
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="login-register.html">Login Register</a></li>
                                            <li><a href="faq.html">Frequently Questions</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Shop Layout</a>
                                        <ul class="submenu2">
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-three-column.html">Shop Three Column</a></li>
                                            <li><a href="shop-four-column.html">Shop Four Column</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-list-nosidebar.html">Shop List No Sidebar</a></li>
                                            <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                            </li>
                                            <li><a href="shop-list-right-sidebar.html">Shop List Right
                                                    Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Product Details</a>
                                        <ul class="submenu2">
                                            <li><a href="single-product.html">Single Product</a></li>
                                            <li><a href="single-product-variable.html">Variable Product</a></li>
                                            <li><a href="single-product-affiliate.html">Affiliate Product</a>
                                            </li>
                                            <li><a href="single-product-group.html">Group Product</a></li>
                                            <li><a href="single-product-tabstyle-2.html">Product Left Tab</a>
                                            </li>
                                            <li><a href="single-product-tabstyle-3.html">Product Right Tab</a>
                                            </li>
                                            <li><a href="single-product-gallery-left.html">Product Gallery
                                                    Left</a></li>
                                            <li><a href="single-product-gallery-right.html">Product Gallery
                                                    Right</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Product Details</a>
                                        <ul class="submenu2">
                                            <li><a href="single-product-sticky-left.html">Product Sticky
                                                    Left</a></li>
                                            <li><a href="single-product-sticky-right.html">Product Sticky
                                                    Right</a></li>
                                            <li><a href="single-product-slider-box.html">Product Box Slider</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Blog</a>
                                <ul class="submenu2">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-large-image.html">Blog Large Image</a></li>
                                    <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                    <li><a href="blog-details-gallery.html">Blog Details Gallery</a></li>
                                    <li><a href="blog-details-audio.html">Blog Details Audio</a></li>
                                    <li><a href="blog-details-video.html">Blog Details Video</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="about.html">About Us</a>
                            </li>
                            <li class="menu-item-has-children"><a href="contact.html">Contact Us</a>
                            </li>

                        </ul>
                    </nav>

                    <div class="offcanvas-settings">
                        <nav class="offcanvas-navigation">
                            <ul>
                                <li class="menu-item-has-children"><a href="#">MY ACCOUNT </a>
                                    <ul class="submenu2">
                                        <li><a href="login-register.html">Register</a></li>
                                        <li><a href="login-register.html">Login</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">CURRENCY: USD </a>
                                    <ul class="submenu2">
                                        <li><a href="javascript:void(0)">€ Euro</a></li>
                                        <li><a href="javascript:void(0)">$ US Dollar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">LANGUAGE: EN-GB </a>
                                    <ul class="submenu2">
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('frontend') }}/assets/images/icons/en-gb.png"
                                                    alt=""> English</a></li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('frontend') }}/assets/images/icons/de-de.png"
                                                    alt=""> Germany</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="offcanvas-widget-area">
                        <div class="off-canvas-contact-widget">
                            <div class="header-contact-info">
                                <ul class="header-contact-info-list">
                                    <li><i class="ion-android-phone-portrait"></i> <a href="tel://12452456012">(1245)
                                            2456 012 </a></li>
                                    <li><i class="ion-android-mail"></i> <a
                                            href="mailto:info@yourdomain.com">info@yourdomain.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Off Canvas Widget Social Start-->
                        <div class="off-canvas-widget-social">
                            <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            <a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a>
                            <a href="#" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>
                        </div>
                        <!--Off Canvas Widget Social End-->
                    </div>
                </div>
            </div>

        </div>
        <!-- Offcanvas Menu End -->



        <!--slider section start-->
        @include('forntend.home.silde')
        <!--slider section end-->

        <!--Banner section start-->

        <!--Banner section end-->

        <!--Best Product section start-->
        @include('forntend.home.best_product')
        <!--Best Product section end-->

        <!--Product section start-->
        @include('forntend.home.feature_product')
        <!--Product section end-->

        <!--Banner section start-->
        @include('forntend.home.banner')
        <!--Banner section end-->

        <!--Product section start-->
        @include('forntend.home.latest_arrivel')
        <!--Product section end-->

        <!-- Testimonial Area Start -->
        @include('forntend.home.testimonial')
        <!-- Testimonial Area End -->

        <!--Blog section start-->
        {{-- <div class="blog-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container sb-border pb-80 pb-lg-60 pb-md-50 pb-sm-40 pb-xs-30">

                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col">
                        <div class="section-title st-border mb-20 pt-20">
                            <h2>Latest Blogs</h2>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="blog-slider tf-element-carousel"
                    data-slick-options='{
                    "slidesToShow": 3,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "arrows": true,
                    "dots": false,
                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                    }'
                    data-slick-responsive='[
                    {"breakpoint":1199, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":575, "settings": {
                    "slidesToShow": 1,
                    "arrows": false,
                    "autoplay": true
                    }}
                    ]'>
                    <!-- Single Blog Start -->
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img
                                        src="{{ asset('frontend') }}/assets/images/blog/blog-details-1.jpg"
                                        alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Cool boy with tattoo</a></h3>
                                <ul class="meta">
                                    <li>By <a href="#" tabindex="0">admin</a></li>
                                    <li>30 October 2018</li>
                                </ul>
                                <a class="btn" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                    <!-- Single Blog Start -->
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img
                                        src="{{ asset('frontend') }}/assets/images/blog/blog-details-2.jpg"
                                        alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Blog image post</a></h3>
                                <ul class="meta">
                                    <li>By <a href="#" tabindex="0">admin</a></li>
                                    <li>30 October 2018</li>
                                </ul>
                                <a class="btn" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                    <!-- Single Blog Start -->
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img
                                        src="{{ asset('frontend') }}/assets/images/blog/blog-details-3.jpg"
                                        alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Blog Audio post</a></h3>
                                <ul class="meta">
                                    <li>By <a href="#" tabindex="0">admin</a></li>
                                    <li>30 October 2018</li>
                                </ul>
                                <a class="btn" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                    <!-- Single Blog Start -->
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img
                                        src="{{ asset('frontend') }}/assets/images/blog/blog-details-4.jpg"
                                        alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Blog Video post</a></h3>
                                <ul class="meta">
                                    <li>By <a href="#" tabindex="0">admin</a></li>
                                    <li>30 October 2018</li>
                                </ul>
                                <a class="btn" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
            </div>
        </div> --}}
        <!--Blog section end-->







        <!--Footer section start-->
        @include('forntend.body.footer')
        <!--Footer section end-->

        <!-- Modal Area Strat -->
        <div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-lg-image-1 tf-element-carousel"
                                            data-slick-options='{
                                                "slidesToShow": 1,
                                                "slidesToScroll": 1,
                                                "infinite": true,
                                                "asNavFor": ".slider-thumbs-1",
                                                "arrows": false,
                                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                                }'>
                                            <div class="lg-image">
                                                <img src="{{ asset('frontend') }}/assets/images/product/large-product/l-product-1.jpg"
                                                    alt="">
                                                <a
                                                    href="{{ asset('frontend') }}/assets/images/product/large-product/l-product-1.jpg"></a>
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{ asset('frontend') }}/assets/images/product/large-product/l-product-2.jpg"
                                                    alt="">
                                                <a
                                                    href="{{ asset('frontend') }}/assets/images/product/large-product/l-product-2.jpg"></a>
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{ asset('frontend') }}/assets/images/product/large-product/l-product-3.jpg"
                                                    alt="">
                                                <a
                                                    href="{{ asset('frontend') }}/assets/images/product/large-product/l-product-3.jpg"></a>
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{ asset('frontend') }}/assets/images/product/large-product/l-product-4.jpg"
                                                    alt="">
                                                <a
                                                    href="{{ asset('frontend') }}/assets/images/product/large-product/l-product-4.jpg"></a>
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{ asset('frontend') }}/assets/images/product/large-product/l-product-5.jpg"
                                                    alt="">
                                                <a
                                                    href="{{ asset('frontend') }}/assets/images/product/large-product/l-product-5.jpg"></a>
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1 tf-element-carousel"
                                            data-slick-options='{
                                                "slidesToShow": 4,
                                                "slidesToScroll": 1,
                                                "infinite": true,
                                                "focusOnSelect": true,
                                                "asNavFor": ".slider-lg-image-1",
                                                "arrows": false,
                                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                                }'
                                            data-slick-responsive='[
                                                {"breakpoint":991, "settings": {
                                                    "slidesToShow": 3
                                                }},
                                                {"breakpoint":767, "settings": {
                                                    "slidesToShow": 4
                                                }},
                                                {"breakpoint":479, "settings": {
                                                    "slidesToShow": 2
                                                }}
                                            ]'>
                                            <div class="sm-image"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/small-product/s-product-1.jpg"
                                                    alt="product image thumb"></div>
                                            <div class="sm-image"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/small-product/s-product-2.jpg"
                                                    alt="product image thumb"></div>
                                            <div class="sm-image"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/small-product/s-product-3.jpg"
                                                    alt="product image thumb"></div>
                                            <div class="sm-image"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/small-product/s-product-4.jpg"
                                                    alt="product image thumb"></div>
                                            <div class="sm-image"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/small-product/s-product-5.jpg"
                                                    alt="product image thumb"></div>
                                        </div>
                                    </div>
                                    <!--Product Details Left -->
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <!--Product Details Content Start-->
                                    <div class="product-details-content">
                                        <!--Product Nav Start-->
                                        <div class="product-nav">
                                            <a href="#"><i class="fa fa-angle-left"></i></a>
                                            <a href="#"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                        <!--Product Nav End-->
                                        <h2>Aliquam lobortis est turpis mauris egestas eget</h2>
                                        <div class="single-product-reviews">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star-o"></i>
                                            <a class="review-link" href="#">(1 customer review)</a>
                                        </div>
                                        <div class="single-product-price">
                                            <span class="price new-price">$66.00</span>
                                            <span class="regular-price">$77.00</span>
                                        </div>
                                        <div class="product-description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et
                                                mattis vulputate, tristique ut lectus</p>
                                        </div>
                                        <div class="single-product-quantity">
                                            <form class="add-quantity" action="#">
                                                <div class="product-quantity">
                                                    <input value="1" type="number">
                                                </div>
                                                <div class="add-to-link">
                                                    <button class="btn"><i class="ion-bag"></i>add to
                                                        cart</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="wishlist-compare-btn">
                                            <a href="#" class="wishlist-btn">Add to Wishlist</a>
                                            <a href="#" class="add-compare">Compare</a>
                                        </div>
                                        <div class="product-meta">
                                            <span class="posted-in">
                                                Categories:
                                                <a href="#">Accessories</a>,
                                                <a href="#">Electronics</a>
                                            </span>
                                        </div>
                                        <div class="single-product-sharing">
                                            <h3>Share this product</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Product Details Content End-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal Area End -->


    </div>

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All jquery file included here -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

</body>


<!-- Mirrored from htmldemo.net/ginza/ginza/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2024 05:41:14 GMT -->

</html>

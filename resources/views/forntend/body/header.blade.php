<!--Header section start-->
<header class="header header-transparent position-absolute header-sticky d-none d-lg-block">
    <div class="header-top header-transparent">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top Social Start -->
                <div class="col-lg-3">
                    <div class="header-top-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </div>
                </div>
                <!-- Header Top Social End -->

                <!-- Header Logo Start -->
                <div class="col-lg-6">
                    <div class="header-logo text-center">
                        <a href="index.html"><img src="{{ asset('frontend') }}/assets/images/logo.png"
                                alt=""></a>
                    </div>
                </div>
                <!-- Header Logo Start -->

                <!-- Header Cart Start -->
                <div class="col-lg-3 d-flex justify-content-end">
                    <div class="header-search">
                        <button class="header-search-toggle"><i class="ion-ios-search-strong"></i></button>
                        <div class="header-search-form">
                            <form action="#">
                                <input type="text" placeholder="Type and hit enter">
                                <button><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="header-cart">
                        <a href="cart.html"><i class="ion-bag"></i><span>2</span></a>
                        <!--Mini Cart Dropdown Start-->
                        <div class="header-cart-dropdown">
                            <ul class="cart-items">
                                <li class="single-cart-item">
                                    <div class="cart-img">
                                        <a href="cart.html"><img
                                                src="{{ asset('frontend') }}/assets/images/cart/cart-1.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="cart-content">
                                        <h5 class="product-name"><a href="single-product.html">Dell Inspiron
                                                24</a></h5>
                                        <span class="product-quantity">1 ×</span>
                                        <span class="product-price">$278.00</span>
                                    </div>
                                    <div class="cart-item-remove">
                                        <a title="Remove" href="#"><i class="fa fa-trash"></i></a>
                                    </div>
                                </li>
                                <li class="single-cart-item">
                                    <div class="cart-img">
                                        <a href="cart.html"><img
                                                src="{{ asset('frontend') }}/assets/images/cart/cart-2.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="cart-content">
                                        <h5 class="product-name"><a href="single-product.html">Lenovo Ideacentre
                                                300</a></h5>
                                        <span class="product-quantity">1 ×</span>
                                        <span class="product-price">$23.39</span>
                                    </div>
                                    <div class="cart-item-remove">
                                        <a title="Remove" href="#"><i class="fa fa-trash"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="cart-total">
                                <h5>Subtotal :<span class="float-right">$39.79</span></h5>
                                <h5>Eco Tax (-2.00) :<span class="float-right">$7.00</span></h5>
                                <h5>VAT (20%) : <span class="float-right">$0.00</span></h5>
                                <h5>Total : <span class="float-right">$46.79</span></h5>
                            </div>
                            <div class="cart-btn">
                                <a href="cart.html">View Cart</a>
                                <a href="checkout.html">checkout</a>
                            </div>
                        </div>
                        <!--Mini Cart Dropdown End-->
                    </div>
                </div>
                <!-- Header Cart End -->

            </div>

        </div>
    </div>
    <div class="header-bottom menu-right">
        <div class="container">
            <div class="row align-items-center">

                <!--Menu start-->
                <div class="col-lg-12 d-flex justify-content-center">
                    <nav class="main-menu">
                        <ul>
                            <li><a href="index.html">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="index-2.html">Home Two</a></li>
                                    <li><a href="index-3.html">Home Three</a></li>
                                    <li><a href="index-4.html">Home Four</a></li>
                                </ul>
                            </li>
                            <li><a href="shop.html">Shop</a>
                                <ul class="mega-menu four-column">
                                    <li><a href="#" class="item-link">Pages</a>
                                        <ul>
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
                                    <li><a href="#" class="item-link">Shop Layout</a>
                                        <ul>
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-three-column.html">Shop Three Column</a></li>
                                            <li><a href="shop-four-column.html">Shop Four Column</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-list-nosidebar.html">Shop List No Sidebar</a>
                                            </li>
                                            <li><a href="shop-list-left-sidebar.html">Shop List Left
                                                    Sidebar</a>
                                            </li>
                                            <li><a href="shop-list-right-sidebar.html">Shop List Right
                                                    Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="item-link">Product Details</a>
                                        <ul>
                                            <li><a href="single-product.html">Single Product</a></li>
                                            <li><a href="single-product-variable.html">Variable Product</a>
                                            </li>
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
                                    <li><a href="#" class="item-link">Product Details</a>
                                        <ul>
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
                            <li><a href="blog.html">Blog</a>
                                <ul class="sub-menu">
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
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <!--Menu end-->


            </div>

        </div>
    </div>
</header>
<!--Header section end-->

<!--Header Mobile section start-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-bottom menu-right">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-mobile-navigation d-block d-lg-none">
                        <div class="row align-items-center">
                            <div class="col-6 col-md-6">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img src="{{ asset('frontend') }}/assets/images/logo.png"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="mobile-navigation text-end">
                                    <div class="header-icon-wrapper">
                                        <ul class="icon-list justify-content-end">
                                            <li>
                                                <div class="header-cart-icon">
                                                    <a href="cart.html"><i
                                                            class="ion-bag"></i><span>2</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="mobile-menu-icon"
                                                    id="mobile-menu-trigger"><i class="fa fa-bars"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Mobile Menu start-->
            <div class="row">
                <div class="col-12 d-flex d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
            <!--Mobile Menu end-->

        </div>
    </div>
</header>
<!--Header Mobile section end-->

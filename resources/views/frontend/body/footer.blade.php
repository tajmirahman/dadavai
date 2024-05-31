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

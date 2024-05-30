@extends('frontend.master_dashboard')
@section('frontend')

    {{-- start slider --}}

    @include('frontend.partial.slider')

    {{-- end slider --}}

    {{-- banner start here --}}

    @include('frontend.partial.banner')

    {{-- banner end here --}}

    {{-- start recent product --}}

    @include('frontend.partial.recent_product')

    {{-- end recent product --}}

    @include('frontend.partial.offer')

    {{-- start popular product --}}
    @include('frontend.partial.popular_product')

        {{-- end popular product --}}


    <section class="facility-area pb-70">
        <div class="container">
            <div class="facility-slides owl-carousel owl-theme">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-tracking"></i>
                    </div>
                    <h3>Free Shipping Worldwide</h3>
                </div>
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-return"></i>
                    </div>
                    <h3>Easy Return Policy</h3>
                </div>
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-shuffle"></i>
                    </div>
                    <h3>7 Day Exchange Policy</h3>
                </div>
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-sale"></i>
                    </div>
                    <h3>Weekend Discount Coupon</h3>
                </div>
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-credit-card"></i>
                    </div>
                    <h3>Secure Payment Methods</h3>
                </div>
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-location"></i>
                    </div>
                    <h3>Track Your Package</h3>
                </div>
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-customer-service"></i>
                    </div>
                    <h3>24/7 Customer Support</h3>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.partial.best_sell')


    @include('frontend.partial.partner')


@endsection

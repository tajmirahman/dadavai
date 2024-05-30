
<div class="home-slides owl-carousel owl-theme">

    @forelse ($sliders as $slider)
    <div class="main-banner" style="background-image: url('{{ asset('storage/slider/' . $slider->slider_image) }}')" >
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="text-center main-banner-content">

                        <h1>{{ $slider->slider_name }}</h1>
                        <p>{{ $slider->description }}</p>
                        <div class="btn-box">
                            <a href="products-left-sidebar.html" class="default-btn">Shop Women's</a>
                            <a href="products-right-sidebar-2.html" class="optional-btn">Shop Men's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <p>No Slider Found</p>
    @endforelse


    {{-- <div class="main-banner banner-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <span class="sub-title">Exclusive Offer!</span>
                        <h1>Spring-Show!</h1>
                        <p>Leap year offer ‘Sale Must-Haves'</p>
                        <div class="btn-box">
                            <a href="products-left-sidebar.html" class="default-btn">Shop Women's</a>
                            <a href="products-right-sidebar-2.html" class="optional-btn">Shop Men's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>

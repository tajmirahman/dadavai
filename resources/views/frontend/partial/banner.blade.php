@php
    $banners = App\Models\Admin\Banner::where('status', '1')->inRandomOrder()->limit(3)->get();
@endphp

<section class="categories-banner-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="row justify-content-center">


            @forelse ($banners as $banner)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-categories-box">
                        <img src="{{ asset('storage/banner/' . $banner->banner_image) }}"
                            style="width:800px; height:250px" alt="image">
                        <div class="text-dark content">
                            <span>{{ $banner->banner_name }}</span>
                            <span class="text-dark">{{ $banner->description }}</span>

                            <a href="products-right-sidebar.html" class="default-btn">Discover Now</a>
                        </div>
                        <a href="products-right-sidebar.html" class="link-btn"></a>
                    </div>
                </div>
            @empty
                <p>No Banner Avaiable</p>
            @endforelse



        </div>
    </div>
</section>


{{-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-categories-box">
                <img src="{{ asset('frontend') }}/assets/img/categories/img1.jpg" alt="image">
                <div class="text-white content">
                    <span>Don’t Miss Today</span>
                    <h3>50% OFF</h3>
                    <a href="products-right-sidebar.html" class="default-btn">Discover Now</a>
                </div>
                <a href="products-right-sidebar.html" class="link-btn"></a>
            </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-categories-box">
                <img src="{{ asset('frontend') }}/assets/img/categories/img2.jpg" alt="image">
                <div class="content">
                    <span>New Collection</span>
                    <h3>Need Now</h3>
                    <a href="products-right-sidebar.html" class="default-btn">Discover Now</a>
                </div>
                <a href="products-right-sidebar.html" class="link-btn"></a>
            </div>
        </div>

    </div>
</div> --}}

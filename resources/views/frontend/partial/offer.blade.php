@php
    $offers= App\Models\Admin\Offer::where('status', '1')->inRandomOrder()->limit(2)->get();
@endphp

<section class="offer-area  ptb-100 jarallax" data-jarallax="{&quot;speed&quot;: 0.3}">
    <div class="container-fluid">
        <div class="row justify-content-center " >


            @forelse ($offers as $offer)
            <div class="col-lg-5 col-md-6 m-2" style="background-image: url('{{ asset('frontend/assets/img/offer-bg2.jpg') }}')">
                <div class="offer-content ">
                    <span class="sub-title">{{ $offer->name }}</span>
                    <h2>-40% OFF</h2>
                    <p>Get The Best Deals Now</p>
                    <a href="products-one-row.html" class="default-btn">Discover Now</a>
                </div>
            </div>
            @empty
            <p>No Offer Found</p>
            @endforelse



        </div>
    </div>
</section>

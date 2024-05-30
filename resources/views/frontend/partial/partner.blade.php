<div class="partner-area ptb-70">
    <div class="container">
        <div class="section-title">
            <h2>Our Partners</h2>
        </div>
        <div class="partner-slides owl-carousel owl-theme">

            @forelse ($brands as $brand)
            <div class="partner-item">
                <a href="index.html"><img src="{{ asset('storage/brand/' . $brand->brand_image) }}"
                        alt="image"></a>
            </div>
            @empty
            <h2>No Brand Here</h2>
            @endforelse


        </div>
    </div>
</div>

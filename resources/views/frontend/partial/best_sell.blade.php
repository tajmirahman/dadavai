<section class="products-area pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">See Our Collection</span>
            <h2>Best Selling Products</h2>
        </div>
        <div class="row justify-content-center">

            @forelse ($bestSell as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-products-box">
                        <div class="products-image">
                            <a href="products-type-1.html">
                                <img src="{{ asset('storage/product/' . $product->product_image) }}" class="main-image"
                                    alt="image">
                                <img src="{{ asset('storage/product/' . $product->product_image) }}" class="hover-image"
                                    alt="image">
                            </a>
                            <div class="products-button">
                                <ul>
                                    <li>
                                        <div class="wishlist-btn">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#shoppingWishlistModal">
                                                <i class="bx bx-heart"></i>
                                                <span class="tooltip-label">Add to Wishlist</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="compare-btn">
                                            <a href="compare.html">
                                                <i class="bx bx-refresh"></i>
                                                <span class="tooltip-label">Compare</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quick-view-btn">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView">
                                                <i class="bx bx-search-alt"></i>
                                                <span class="tooltip-label">Quick View</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="products-content">

                            <h3><a href="products-type-1.html">{{ substr($product->product_name, 0, 16) }}</a></h3>

                            <div class="price">
                                @if ($product->discount_price == null)
                                    <span class="new-price">Tk {{ $product->selling_price }}</span>
                                @else
                                    <span class="old-price">Tk {{ $product->selling_price }}</span>
                                    <span class="new-price">Tk {{ $product->discount_price }}</span>
                                @endif
                            </div>

                            <div class="star-rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>

                            <a type="submit" data-product_id="{{ $product->id }}" class="add-to-cart add_to_cart_btn_product">Add to
                                Cart</a>
                        </div>
                    </div>
                </div>

            @empty
                <p>No product found</p>
            @endforelse




        </div>
    </div>
</section>

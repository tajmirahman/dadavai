<!DOCTYPE html>
<html lang="zxx">


@php
    $seo = App\Models\Admin\SeoSetting::find(1);
@endphp

<!-- Mirrored from templates.hibootstrap.com/xton/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 May 2024 15:02:41 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="title" content="{{ $seo->meta_title }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keyword" content="{{ $seo->meta_keyword }}">
    <meta name="description" content="{{ $seo->meta_description }}">


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
    <title>Ginja - shop</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/assets/img/favicon.png">

    {{-- font awsome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    @include('frontend.body.header')


    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="submit"><i class="bx bx-search-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <main>
        @yield('frontend')
    </main>




    @include('frontend.body.footer')

    {{-- add mini cart --}}

    @include('frontend.modal.add_mini_cart')

    {{-- add mini cart --}}

    {{-- wishlist --}}

    @include('frontend.modal.wishlist')

    {{-- wishlist --}}

    <div class="go-top"><i class="bx bx-up-arrow-alt"></i></div>



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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $('.add_to_cart_btn_product').click(function() {


            var product_id = $(this).data('product_id');


            $.ajax({

                type: "POST",
                dataType: 'json',
                url: '/product-store-cart',

                data: {
                    // price: price,
                    product_id: product_id,
                    // color: color,
                },

                success: function(data) {

                    miniCart();


                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message
                }

            })

        })
    </script>

    {{-- // add minicart --}}

    <script>
        function miniCart() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '/add/mini/cart',

                success: function(response) {
                    // console.log(response);

                    $('#cartTotal').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);

                    var miniCart = ""

                    $.each(response.Cart, function(key, value) {

                        miniCart += `<div class="products-cart">
                            <div class="products-image">
                                <a href="#"><img src="/${value.options.image}" style="width:50px; height:50px"></a>
                            </div>
                            <div class="products-content">
                                <h3><a href="#">${value.name}</a></h3>
                                <span>Blue / XS</span>
                                <div class="products-price">
                                    <span>${value.qty}</span>
                                    <span>x</span>
                                    <span class="price">${value.price} Tk</span>
                                </div>
                                <a type="submit" id="${value.rowId}" class="remove-btn" onclick="minicartRemove(this.id)"><i class="bx bx-trash"></i></a>
                            </div>
                        </div>
                        <hr></br>
                        `


                    });
                    $('#miniCart').html(miniCart);


                }

            });
        }

        miniCart();
    </script>


    {{-- // mini cart remove --}}

    <script>
        function minicartRemove(rowId) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '/mini/cart/remove/' + rowId,
                success: function(data) {

                    miniCart();

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message

                }
            })
        }
    </script>


    {{-- add to Wish list  --}}

    <script>
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '/add-to-wishlist/' + product_id,
                success: function(data) {


                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message

                }
            })

        }
    </script>

    {{-- add to Wish list end  --}}

    {{-- Wish list mini cart start here --}}

    <script>
        function wishlist() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'get-wishlist',
                success: function(response) {

                    var row = "";

                    $.each(response.wishlist, function(key, value) {

                        row += ` <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="/${value.product.product_image}" alt="image"></a>
                        </div>
                        <div class="products-content">
                            <h3><a href="#">${value.product.product_name}</a></h3>
                            <span>Blue / XS</span>
                            <div class="products-price">
                                <span>1</span>
                                <span>x</span>
                                ${value.product.discount_price == null
                                    ? `<span class="price">${value.product.selling_price} Tk</span>`
                                    : `<span class="price">${value.product.discount_price} Tk</span>`

                                }

                            </div>
                            <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>
                        </div>
                    </div> `


                    });
                    $('#wishlist').html(row);
                }
            });
        }
        wishlist();
    </script>


    {{-- Wish list mini cart ends here --}}

</body>

<!-- Mirrored from templates.hibootstrap.com/xton/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 May 2024 15:02:41 GMT -->

</html>

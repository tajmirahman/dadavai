<div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="bx bx-x"></i></span>
            </button>
            <div class="modal-body">
                <h3>My Cart</h3>
                <div class="products-cart-content">

                    {{-- add minicart --}}

                    <div id="miniCart">

                    </div>

                    {{-- add minicart --}}




                </div>
                <div class="products-cart-subtotal">
                    <span>Subtotal</span>
                    <span class="subtotal" id="cartTotal"></span>
                </div>
                <div class="products-cart-btn">
                    <a href="#" class="default-btn">Proceed to Checkout</a>
                    <a href="#" class="optional-btn">View Shopping Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>

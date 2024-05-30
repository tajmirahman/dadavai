<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Client\ResponseSequence;

class CartController extends Controller
{
    public function AddToCartProductHome(Request $request)
    {
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$cartItem->isEmpty()) {
            return response()->json(['error' => 'This Product Has Already Been Added']);
        }

        if ($product->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_image],
            ]);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_image],
            ]);
        }

        return response()->json(['success' => 'Product added to cart successfully!!!']);
    } // end

    public function AddMiniCart()
    {

        $Cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'Cart' => $Cart,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    } // end

    public function MiniCartRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Cart Remove Successfuly']);
    }
}

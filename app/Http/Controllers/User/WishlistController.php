<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $product_id){

        if(Auth::check()){
            $exits= WishList::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if(!$exits){

                WishList::insert([
                    'user_id'=> Auth::id(),
                    'product_id'=> $product_id,
                ]);

                return response()->json(['success'=> 'Product successfully add your wish list']);

            }else{
                return response()->json(['error'=> 'Product already add your wishlist']);
            }


        }else{
            return response()->json(['error'=> 'please login first']);
        }

    }// end
}

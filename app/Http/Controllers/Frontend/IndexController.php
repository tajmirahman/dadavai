<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $recentProduct = Product::where('status','1')->limit(8)->latest()->get();
        $popularProduct = Product::where('status','1')->where('bestsell','1')->limit(8)->latest()->get();
        $bestSell = Product::where('status','1')->where('feature','1')->limit(4)->latest()->get();

        $sliders= Slider::where('status','1')->latest()->get();

        $brands= Brand::where('status','1')->latest()->get();

        return view('frontend.index',compact('recentProduct','popularProduct','sliders','bestSell','brands'));
    }

    public function UserLogOut(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function AllBanner(){

        $banners= Banner::latest()->get();

        return view('admin.pages.banner.banner_all',compact('banners'));

    }// end methods

    //Store Banner
    public function StoreBanner(Request $request)
    {
        $validator = $request->validate(

            [
                'banner_name' => 'required|max:255',
                'banner_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'banner_name.required' => 'The Banner Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('banner_image');

            $imgPath = storage_path('app/public/banner');

            if (empty($mainFile)) {

                Banner::create([

                    'banner_name' => $request->banner_name,
                    'banner_slug' => Str::slug($request->banner_name, "-"),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {
                    Banner::create([

                        'banner_name' => $request->banner_name,
                        'banner_slug' => Str::slug($request->banner_name, "-"),
                        'description' => $request->description,

                        'banner_image' => $globalFunImg['file_name'],

                    ]);
                } else {


                    return redirect()->back()->with('error','Image upload failed! plz try again');
                }
            }

        }

        return redirect()->route('all.banner')->with('success','Banner Created Successfully');

    }

    // update banner

    public function UpdateBanner(Request $request)
    {

        $banner = Banner::findOrFail($request->id);
        $validator = $request->validate(

            [
                'banner_name' => 'required|max:255',
                'banner_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'banner_name.required' => 'The Banner Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('banner_image');

            $uploadPath = storage_path('app/public/banner');

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($banner)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/banner/requestImg/') . $banner->banner_image)) {
                        File::delete(public_path('storage/banner/requestImg/') . $banner->banner_image);
                    }
                    if (File::exists(public_path('storage/banner/') . $banner->banner_image)) {
                        File::delete(public_path('storage/banner/') . $banner->banner_image);
                    }
                }

                $banner->update([

                    'banner_name' => $request->banner_name,
                    'banner_slug' => Str::slug($request->banner_name, "-"),
                    'description' => $request->description,
                    'banner_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $banner->banner_image,

                ]);
            }

            // toastr()->success('Brand Update Successfully');
        }
        return redirect()->route('all.banner')->with('success','Banner Update Successfully');

    }// end method

    //delete banner
    public function DeleteBanner($id){
        $banner = Banner::find($id);

        if (File::exists(public_path('storage/banner/requestImg/') . $banner->banner_image)) {
            File::delete(public_path('storage/banner/requestImg/') . $banner->banner_image);
        }

        if (File::exists(public_path('storage/banner/') . $banner->banner_image)) {
            File::delete(public_path('storage/banner/') . $banner->banner_image);
        }

        $banner->delete();



        return redirect()->route('all.banner')->with('success','Banner Delete Successfully');
    }

    // INactive
    public function InactiveBanner($id)
    {
        Banner::find($id)->update([
            'status' => '0',
        ]);

        return redirect()->back()->with('success','Banner Inactive Successfully');

    }// end methods

    // Active
    public function ActiveBanner($id)
    {

        Banner::find($id)->update([
            'status' => '1',
        ]);

        return redirect()->back()->with('success','Banner Active Successfully');
    }// end methods


}

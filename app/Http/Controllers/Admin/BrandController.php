<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function AllBrand(){

        $brands= Brand::latest()->get();
        return view('admin.pages.brand.brand_all',compact('brands'));
    }// end methods

    public function StoreBrand(BrandRequest $request){

        $validator = $request->validate(

            [
                'brand_name' => 'required|max:255',
                'brand_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'brand_name.required' => 'The Brand Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('brand_image');

            $imgPath = storage_path('app/public/brand');

            if (empty($mainFile)) {

                Brand::create([

                    'brand_name' => $request->brand_name,
                    'brand_slug' => Str::slug($request->brand_name, "-"),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {
                    Brand::create([

                        'brand_name' => $request->brand_name,
                        'brand_slug' => Str::slug($request->brand_name, "-"),
                        'description' => $request->description,

                        'brand_image' => $globalFunImg['file_name'],

                    ]);
                } else {


                    return redirect()->back()->with('error','Image upload failed! plz try again');
                }
            }
            // toastr()->success('Brand Created Successfully');
        }

        return redirect()->route('all.brand')->with('success','Brand Created Successfully');

    }// End methods

    public function UpdateBrand(BrandRequest $request)
    {

        $brand = Brand::findOrFail($request->id);
        $validator = $request->validate(

            [
                'brand_name' => 'required|max:255',
                'brand_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'brand_name.required' => 'The Brand Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('brand_image');

            $uploadPath = storage_path('app/public/brand');

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath, 200, 200);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($brand)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/brand/requestImg/') . $brand->brand_image)) {
                        File::delete(public_path('storage/brand/requestImg/') . $brand->brand_image);
                    }
                    if (File::exists(public_path('storage/brand/') . $brand->brand_image)) {
                        File::delete(public_path('storage/brand/') . $brand->brand_image);
                    }
                }

                $brand->update([

                    'brand_name' => $request->brand_name,
                    'brand_slug' => Str::slug($request->brand_name, "-"),
                    'description' => $request->description,
                    'brand_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $brand->brand_image,

                ]);
            }

            // toastr()->success('Brand Update Successfully');
        }
        return redirect()->route('all.brand')->with('success','Brand Update Successfully');

    }// end methods

    public function DeleteBrand($id){

        $brand = Brand::find($id);

        if (File::exists(public_path('storage/brand/requestImg/') . $brand->brand_image)) {
            File::delete(public_path('storage/brand/requestImg/') . $brand->brand_image);
        }

        if (File::exists(public_path('storage/brand/') . $brand->brand_image)) {
            File::delete(public_path('storage/brand/') . $brand->brand_image);
        }

        $brand->delete();



        return redirect()->route('all.brand')->with('success','Brand Delete Successfully');

    }// end methods


    public function InactiveBrand($id)
    {
        Brand::find($id)->update([
            'status' => '0',
        ]);

        return redirect()->back()->with('success','Brand Inactive Successfully');

    }// end methods


    public function ActiveBrand($id)
    {

        Brand::find($id)->update([
            'status' => '1',
        ]);

        return redirect()->back()->with('success','Brand Active Successfully');
    }// end methods

}

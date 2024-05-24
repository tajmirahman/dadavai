<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function AllSlider(){

        $sliders= Slider::latest()->get();
        return view('admin.pages.slider.slider_all',compact('sliders'));
    }// end

    //store methods
    public function StoreSlider(Request $request){

        $validator = $request->validate(

            [
                'slider_name' => 'required|max:255',
                'banner_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'slider_name.required' => 'The Slider Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('slider_image');

            $imgPath = storage_path('app/public/slider');

            if (empty($mainFile)) {

                Slider::create([

                    'slider_name' => $request->slider_name,
                    'slider_slug' => Str::slug($request->slider_name, "-"),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {
                    Slider::create([

                        'slider_name' => $request->slider_name,
                        'slider_slug' => Str::slug($request->slider_name, "-"),
                        'description' => $request->description,

                        'slider_image' => $globalFunImg['file_name'],

                    ]);
                } else {


                    return redirect()->back()->with('error','Image upload failed! plz try again');
                }
            }

        }

        return redirect()->route('all.slider')->with('success','Slider Created Successfully');


    }// end

    //update methods
    public function UpdateSlider(Request $request){

        $slider = Slider::findOrFail($request->id);
        $validator = $request->validate(

            [
                'slider_name' => 'required|max:255',
                'banner_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'slider_name.required' => 'The Slider Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('slider_image');

            $uploadPath = storage_path('app/public/slider');

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($slider)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/slider/requestImg/') . $slider->slider_image)) {
                        File::delete(public_path('storage/slider/requestImg/') . $slider->slider_image);
                    }
                    if (File::exists(public_path('storage/slider/') . $slider->slider_image)) {
                        File::delete(public_path('storage/slider/') . $slider->slider_image);
                    }
                }

                $slider->update([

                    'slider_name' => $request->slider_name,
                    'slider_slug' => Str::slug($request->slider_name, "-"),
                    'description' => $request->description,
                    'slider_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $slider->slider_image,

                ]);
            }

            // toastr()->success('Brand Update Successfully');
        }
        return redirect()->route('all.slider')->with('success','Slider Update Successfully');
    }// end

    //delete methods
    public function DeleteSlider($id){

        $slider = Slider::find($id);

        if (File::exists(public_path('storage/slider/requestImg/') . $slider->slider_image)) {
            File::delete(public_path('storage/slider/requestImg/') . $slider->slider_image);
        }

        if (File::exists(public_path('storage/slider/') . $slider->slider_image)) {
            File::delete(public_path('storage/slider/') . $slider->slider_image);
        }

        $slider->delete();



        return redirect()->route('all.slider')->with('success','Slider Delete Successfully');

    }// end

    // INactive
    public function InactiveSlider($id)
    {
        Slider::find($id)->update([
            'status' => '0',
        ]);

        return redirect()->back()->with('success','SLider Inactive Successfully');

    }// end methods

    // Active
    public function ActiveSlider($id)
    {

        Slider::find($id)->update([
            'status' => '1',
        ]);

        return redirect()->back()->with('success','Slider Active Successfully');
    }// end methods


}

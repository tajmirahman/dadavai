<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function AllSubCategory(){

        $categorys= Category::orderBy('category_name','ASC')->latest()->get();
        $subcategorys= SubCategory::latest()->get();
        return view('admin.pages.subcategory.subcategory_all',compact('categorys','subcategorys'));

    }// end

    // store
    public function StoreSubCategory(Request $request){

        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_name' => 'required|max:255',
                'subcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_name.required' => 'SubCategory Name is required',
                'subcategory_image.required' => 'SubCategory Image is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('subcategory_image');
            $imgPath = storage_path('app/public/subcategory');

            if (empty($mainFile)) {
                SubCategory::insert([

                    'category_id' => $request->category_id,
                    'subcategory_name' => $request->subcategory_name,
                    'subcategory_slug' => Str::slug($request->subcategory_name , "-"),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {

                    SubCategory::insert([

                        'category_id' => $request->category_id,
                        'subcategory_name' => $request->subcategory_name,
                        'subcategory_slug' => Str::slug($request->subcategory_name , "-"),
                        'description' => $request->description,

                        'subcategory_image' => $globalFunImg['file_name'],

                    ]);

                } else {

                    return redirect()->route('all.subcategory')->with('error','Image upload failed! plz try again');
                }

            }

            return redirect()->route('all.subcategory')->with('success','SubCategory Created Successfully');

        }

    }// end methods

    //update
    public function UpdateSubCategory(Request $request){

        $subcat = SubCategory::findOrFail($request->id);

        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_name' => 'required|max:255',
                'subcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_name.required' => 'SubCategory Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('subcategory_image');

            $uploadPath = storage_path('app/public/subcategory');

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($subcat)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image)) {
                        File::delete(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image);
                    }
                    if (File::exists(public_path('storage/subcategory/') . $subcat->subcategory_image)) {
                        File::delete(public_path('storage/subcategory/') . $subcat->subcategory_image);
                    }
                }

                $subcat->update([

                    'category_id' => $request->category_id,
                    'subcategory_name' => $request->subcategory_name,
                    'subcategory_slug' => Str::slug($request->subcategory_name , "-"),
                    'description' => $request->description,

                    'subcategory_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $subcat->subcategory_image,

                ]);
            }


            return redirect()->route('all.subcategory')->with('success','SubCategory Update Successfully');
        }

    }// end


    //delete
    public function DeleteSubCategory($id){

        $subcat = SubCategory::find($id);

        if (File::exists(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image)) {
            File::delete(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image);
        }

        if (File::exists(public_path('storage/subcategory/') . $subcat->subcategory_image)) {
            File::delete(public_path('storage/subcategory/') . $subcat->subcategory_image);
        }

        $subcat->delete();


        return redirect()->route('all.subcategory')->with('success','SubCategory Delete Successfully');

    }// end

    //Inactive SubCategory
    public function InactiveSubCategory($id)
    {
        SubCategory::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('SubCategory Inactive Successfully');

        return redirect()->back();
    }// end

    //Active SubCategory
    public function ActiveSubCategory($id)
    {

        SubCategory::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('SubCategory Active Successfully');

        return redirect()->back();
    }// end

}

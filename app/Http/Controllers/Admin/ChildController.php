<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ChildController extends Controller
{
    public function AllChild(){

        $categorys= Category::orderBy('category_name','ASC')->get();
        $subcategorys= SubCategory::orderBy('subcategory_name','ASC')->get();
        $childcategorys= ChildCategory::latest()->get();
        return view('admin.pages.child.all_child', compact('categorys','subcategorys','childcategorys'));

    }// end

    //Store
    public function StoreChildCategory(Request $request){

        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'childcategory_name' => 'required',
                'childcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_id.required' => 'SubCategory Name is required',
                'childcategory_name.required' => 'ChildCategory Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('childcategory_image');
            $imgPath = storage_path('app/public/childcategory');

            if (empty($mainFile)) {

                ChildCategory::insert([

                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'childcategory_name' => $request->childcategory_name,
                    'childcategory_slug' => Str::slug($request->childcategory_name , "-"),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {

                    ChildCategory::insert([

                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'childcategory_name' => $request->childcategory_name,
                        'childcategory_slug' => Str::slug($request->childcategory_name , "-"),
                        'description' => $request->description,

                        'childcategory_image' => $globalFunImg['file_name'],

                    ]);

                } else {
                    toastr()->warning('Image upload failed! plz try again.');
                }

            }


            return redirect()->route('all.child')->with('success','ChildCategory Created Successfully');

        }

    }// End

    //update
    public function UpdateChildCategory(Request $request){

        $childcat = ChildCategory::findOrFail($request->id);

        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'childcategory_name' => 'required',
                'childcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_id.required' => 'SubCategory Name is required',
                'childcategory_name.required' => 'ChildCategory Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('childcategory_image');

            $uploadPath = storage_path('app/public/childcategory');

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($childcat)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image)) {
                        File::delete(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image);
                    }
                    if (File::exists(public_path('storage/childcategory/') . $childcat->childcategory_image)) {
                        File::delete(public_path('storage/childcategory/') . $childcat->childcategory_image);
                    }
                }

                $childcat->update([

                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'childcategory_name' => $request->childcategory_name,
                    'childcategory_slug' => Str::slug($request->childcategory_name , "-"),
                    'description' => $request->description,

                    'childcategory_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $childcat->childcategory_image,

                ]);
            }


            return redirect()->route('all.child')->with('success','ChildCategory Update Successfully');
        }

    }// end

    public function DeleteChildCategory($id){

        $childcat = ChildCategory::find($id);

        if (File::exists(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image)) {
            File::delete(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image);
        }

        if (File::exists(public_path('storage/childcategory/') . $childcat->childcategory_image)) {
            File::delete(public_path('storage/childcategory/') . $childcat->childcategory_image);
        }

        $childcat->delete();



        return redirect()->route('all.child')->with('success','ChildCategory Delete Successfully');

    }// end

    //Inactive
    public function InactiveChildCategory($id)
    {
        ChildCategory::find($id)->update([
            'status' => '0',
        ]);

        
        return redirect()->back()->with('success','ChildCategory Inactive Successfully');

        return redirect()->back();
    }

    //Active
    public function ActiveChildCategory($id)
    {

        ChildCategory::find($id)->update([
            'status' => '1',
        ]);

        return redirect()->back()->with('success','ChildCategory Active Successfully');
    }




}

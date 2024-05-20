<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function AllCategory(){

        $categorys = Category::latest()->get();
        return view('admin.pages.category.category_all', compact('categorys'));

    }// end methods

    // Store Category
    public function StoreCategory(Request $request){
        $validator = $request->validate(

            [
                'category_name' => 'required|max:255',
                'category_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_name.required' => 'The Category Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('category_image');
            $imgPath = storage_path('app/public/category');

            $iconmainFile = $request->file('icon'); ///////
            $iconimgPath = storage_path('app/public/category'); //////

            ////////
            if (empty($iconmainFile)) {

                $globalFunIconImg['file_name'] = '';

            } else {
                $globalFunIconImg = customUpload($iconmainFile, $iconimgPath);
                $globalFunIconImg['file_name'] = $globalFunIconImg['file_name'];
            }
            /////////////////////



            if (empty($mainFile)) {

                Category::create([

                    'category_name' => $request->category_name,
                    'category_slug' => Str::slug($request->category_name, "-"),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath, 20, 20);

                if ($globalFunImg['status'] == 1) {
                    Category::create([

                        'category_name' => $request->category_name,
                        'category_slug' => Str::slug($request->category_name, "-"),
                        'description' => $request->description,

                        'category_image' => $globalFunImg['file_name'],

                        'icon' => $globalFunIconImg['file_name'], ////////

                    ]);
                } else {


                    return redirect()->back()->with('error','Image upload failed! plz try again');
                }
            }

        }

        return redirect()->route('all.category')->with('success','Category Created Successfully');

    }// end methods


    // update
    public function UpdateCategory(Request $request){

        $category = Category::findOrFail($request->id);

        $validator = $request->validate(

            [
                'category_name' => 'required|max:255',
                'category_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_name.required' => 'Category Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('category_image');
            $uploadPath = storage_path('app/public/category');

            $iconmainFile = $request->file('icon'); ///////
            $iconimgPath = storage_path('app/public/category'); //////

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            ////////////
            if (isset($iconmainFile)) {
                $globalFunIconImg = customUpload($iconmainFile, $iconimgPath);
            } else {
                $globalFunIconImg['status'] = 0;
            }
            /////////////

            if (!empty($category)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/category/requestImg/') . $category->category_image)) {
                        File::delete(public_path('storage/category/requestImg/') . $category->category_image);
                    }
                    if (File::exists(public_path('storage/category/') . $category->category_image)) {
                        File::delete(public_path('storage/category/') . $category->category_image);
                    }
                }

                ///////////

                if ($globalFunIconImg['status'] == 1) {
                    if (File::exists(public_path('storage/category/requestImg/') . $category->icon)) {
                        File::delete(public_path('storage/category/requestImg/') . $category->icon);
                    }
                    if (File::exists(public_path('storage/category/') . $category->icon)) {
                        File::delete(public_path('storage/category/') . $category->icon);
                    }
                }

                ////////

                $category->update([

                    'category_name' => $request->category_name,
                    'category_slug' => Str::slug($request->category_name , "-"),
                    'description' => $request->description,
                    'category_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $category->category_image,

                    'icon' => $globalFunIconImg['status'] == 1 ? $globalFunIconImg['file_name'] : $category->icon, ////

                ]);
            }
        }


        return redirect()->route('all.category')->with('success','Category Update Successfully');

    }// End methods


    //delete
    public function DeleteCategory($id){

        $category = Category::find($id);

        if (File::exists(public_path('storage/category/requestImg/') . $category->category_image)) {
            File::delete(public_path('storage/category/requestImg/') . $category->category_image);
        }

        if (File::exists(public_path('storage/category/') . $category->category_image)) {
            File::delete(public_path('storage/category/') . $category->category_image);
        }

        $category->delete();


        return redirect()->route('all.category')->with('success','Category Delete Successfully');

    }// end methods


    //Inactive
    public function InactiveCategory($id)
    {
        Category::find($id)->update([
            'status' => '0',
        ]);


        return redirect()->back()->with('success','Category Inactive Successfully');
    }// end

    //Active
    public function ActiveCategory($id)
    {

        Category::find($id)->update([
            'status' => '1',
        ]);



        return redirect()->back()->with('success','Category Active Successfully');
    }// end



}

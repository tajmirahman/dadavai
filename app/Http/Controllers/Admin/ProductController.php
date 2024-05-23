<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\MultiImages;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function AllProduct(){

        $products= Product::latest()->get();
        return view('admin.pages.product.product_all',compact('products'));

    }// end methods

    public function AddProduct(){

        $brands= Brand::orderBy('brand_name','ASC')->get();
        $Categorys= Category::orderBy('category_name','ASC')->get();
        return view('admin.pages.product.add_product',compact('brands','Categorys'));
    }// end methods

    //store
    public function StoreProduct(Request $request){

        $validator = $request->validate(

            [
                'product_name' => 'required|max:255',

            ],

            [
                'product_name.required' => 'The Product Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('product_image');

            $imgPath = storage_path('app/public/product');

            if (empty($mainFile)) {

                $product_id = Product::insertGetId([

                    'product_name' => $request->product_name,
                    'sku_code' => $request->sku_code,
                    'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                    'stock' => $request->stock,

                    'brand_id' => $request->brand_id,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'childcategory_id' => $request->childcategory_id,


                    'discount_price' => $request->discount_price,
                    'selling_price' => $request->selling_price,
                    'tags' => $request->tags,

                    'short_desc' => $request->short_desc,
                    'overview' => $request->overview,

                    'feature' => $request->feature,
                    'bestsell' => $request->bestsell,

                    'created_at' => now(),

                ]);
            } else {

                $globalFunImg = customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {
                    $product_id = Product::insertGetId([

                        'product_name' => $request->product_name,
                        'sku_code' => $request->sku_code,
                        'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                        'stock' => $request->stock,

                        'brand_id' => $request->brand_id,
                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'childcategory_id' => $request->childcategory_id,


                        'discount_price' => $request->discount_price,
                        'selling_price' => $request->selling_price,
                        'tags' => $request->tags,

                        'short_desc' => $request->short_desc,
                        'overview' => $request->overview,

                        'feature' => $request->feature,
                        'bestsell' => $request->bestsell,
                        'product_image' => $globalFunImg['file_name'],

                        'created_at' => now(),



                    ]);


                    if ($request->hasFile('multi_image')) {
                        $imgPath = storage_path('app/public/product/multi_image');
                        foreach ($request->file('multi_image') as $image) {
                            // Process each image
                            $globalFunImg = customUpload($image, $imgPath);
                            if ($globalFunImg['status'] == 1) {
                                // Store the brand with image
                                MultiImages::create([
                                    'product_id' => $product_id,
                                    'multi_image' => $globalFunImg['file_name'],
                                ]);
                            }
                        }
                }
            } else {


                    return redirect()->back()->with('error','Image upload failed! plz try again');
                }
            }//end




        }

        return redirect()->route('all.product')->with('success','Product Created Successfully');

    }//end

    //edit
    public function EditProduct($id){

        $editProduct = Product::findOrFail($id);

        $products = Product::where('status', '1')->latest()->get();
        $brands = Brand::where('status', '1')->latest()->get();
        $categorys = Category::where('status', '1')->latest()->get();


        $cats = $editProduct->category_id;
        $subcategorys = SubCategory::where('category_id', $cats)->latest()->get();

        //$childcats = $editProduct->category_id;
        $subcats = $editProduct->subategory_id;
        $childcategorys = ChildCategory::where('subcategory_id', $subcats)->latest()->get();

        $multiImages = MultiImages::where('product_id', $id)->latest()->get();

        return view('admin.pages.product.edit_product', compact('brands', 'categorys', 'products', 'editProduct', 'subcategorys', 'childcategorys','multiImages'));
    }// end

    //update
    public function UpdateProduct(Request $request){

        $product = Product::findOrFail($request->id);
        $validator = $request->validate(

            [
                'product_name' => 'required|max:255',

            ],

            [
                'product_name.required' => 'The Product Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('product_image');

            $uploadPath = storage_path('app/public/product');

            if (isset($mainFile)) {
                $globalFunImg = customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($product)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/product/requestImg/') . $product->product_image)) {
                        File::delete(public_path('storage/product/requestImg/') . $product->product_image);
                    }
                    if (File::exists(public_path('storage/product/') . $product->product_image)) {
                        File::delete(public_path('storage/product/') . $product->product_image);
                    }
                }

                $product->update([

                    'product_name' => $request->product_name,
                    'sku_code' => $request->sku_code,
                    'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                    'stock' => $request->stock,

                    'brand_id' => $request->brand_id,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'childcategory_id' => $request->childcategory_id,


                    'discount_price' => $request->discount_price,
                    'selling_price' => $request->selling_price,
                    'tags' => $request->tags,

                    'short_desc' => $request->short_desc,
                    'overview' => $request->overview,

                    'feature' => $request->feature,
                    'bestsell' => $request->bestsell,



                    'product_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $product->product_image,

                    'updated_at' => now(),
                ]);
            }

            // toastr()->success('Brand Update Successfully');
        }
        return redirect()->route('all.product')->with('success','Product Update Successfully');


    }// end

    // delete
    public function DeleteProduct($id){

        $product = Product::find($id);

        if (File::exists(public_path('storage/product/requestImg/') . $product->product_image)) {
            File::delete(public_path('storage/product/requestImg/') . $product->product_image);
        }

        if (File::exists(public_path('storage/product/') . $product->product_image)) {
            File::delete(public_path('storage/product/') . $product->product_image);
        }

        $product->delete();



        return redirect()->route('all.product')->with('success','Product Delete Successfully');

    }// end


    //Add new multi image
    public function AddNewMultiimage(Request $request){

        $new_multi = $request->imageid;

        $request->validate([
            'multi_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Adjust validation rules as needed
        ]);

        foreach ($request->file('multi_img') as $image) {
            $path = $image->storage_path('app/public/product/multi_image'); // Store image in the storage/app/public directory
            $globalFunImg = customUpload($image, $path);

            MultiImages::create([
                'product_id' => $new_multi,
                'multi_image' => $globalFunImg['file_name'],
            ]);
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');

    }// end


    //delete multi image
    public function DeleteMultiimage($id){

        $multiImage = MultiImages::find($id);

        if (File::exists(public_path('storage/product/multi_image/requestImg/') . $multiImage->multi_image)) {
            File::delete(public_path('storage/product/multi_image/requestImg/') . $multiImage->multi_image);
        }

        if (File::exists(public_path('storage/product/multi_image/') . $multiImage->multi_image)) {
            File::delete(public_path('storage/product/multi_image/') . $multiImage->multi_image);
        }

        $multiImage->delete();



        return redirect()->back()->with('success','Multi Image Delete Successfully');
    }//end




    //inactive product
    public function InactiveProduct($id){

        Product::find($id)->update([
            'status' => '0',
        ]);


        return redirect()->back()->with('success','Product Inactive Successfully');

    }//end

    //inactive product
    public function ActiveProduct($id){

        Product::find($id)->update([
            'status' => '1',
        ]);


        return redirect()->back()->with('success','Product Active Successfully');

    }//end



    // subcategory ajax
    public function SubCategoryAjax($category_id){
        $subCategorys= SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();

        return json_encode($subCategorys);
    }//end

    public function GetChildCategories($subcategory_id){

        $childcat= ChildCategory::where('subcategory_id',$subcategory_id)->orderBy('childcategory_name','ASC')->get();
        return json_encode($childcat);

    }//end





}

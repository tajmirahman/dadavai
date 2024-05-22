<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;

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
